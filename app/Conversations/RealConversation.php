<?php

namespace App\Conversations;

use App\Models\Action;
use App\Models\Region;
use App\Models\Routes;
use App\Models\User;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\Drivers\Web\WebDriver;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Services\SmsService\SmsService;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Appeal;
use App\Models\QuestionText;
use Illuminate\Support\Facades\Storage;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Incoming\IncomingMessage;

const LANGUAGE = [['key' => "O`zbek", 'value' => 'uz'], ['key' => "Pусский", 'value' => 'ru']];

const QUESTIONS = [

    'YES' => ['name' => ['uz' => 'Fayl biriktirish', 'ru' => 'Прикрепить файл'], 'value' => 'Yes'],
    'NO' => ['name' => ['uz' => 'O\'tkazib yuborish', 'ru' => 'Пропустить'], 'value' => 'No'],


    'Ha' => ['name' => ['uz' => 'Ha', 'ru' => 'Да'], 'value' => 'Yes'],
    'Yoq' => ['name' => ['uz' => 'Yo`q', 'ru' => 'Нет'], 'value' => 'No'],
    'ASK_USER_A' => [['uz' => 'Место работы полностью UZ', 'ru' => ' Место работы полностью '], ['uz' => "Название организации UZ", 'ru' => ' Название организации  ']],
    'ASK_USER_B' => [['uz' => 'Nothing UZ', 'ru' => ' Nothing '], ['uz' => 'Направление деятельности UZ', 'ru' => ' Направление деятельности ']],
];
class RealConversation extends Conversation
{
    public $memory = [];
    public $language;
    public $usertype;
    public $user_memory;
    protected $verify;

    public $key_indevidual;
    public $questions;
    public $user_question_data;


    public function __construct()
    {
        $this->questions = QuestionText::select('name', 'uz', 'ru')->get()->keyBy('name')->toArray();

        $this->key_indevidual["ru"][0]["name"] = $this->questions["ASK_YURIDIK"]["ru"];
        $this->key_indevidual["ru"][1]["name"] = $this->questions["ASK_JISMONIY"]["ru"];
        $this->key_indevidual["uz"][0]["name"] = $this->questions["ASK_YURIDIK"]["uz"];
        $this->key_indevidual["uz"][1]["name"] = $this->questions["ASK_JISMONIY"]["uz"];
        $this->key_indevidual["uz"][0]["val"] = 0;
        $this->key_indevidual["ru"][0]["val"] = 0;
        $this->key_indevidual["uz"][1]["val"] = 1;
        $this->key_indevidual["ru"][1]["val"] = 1;

        $this->user_question_data["ASK_USER_A"][1]["uz"] = $this->questions["ASK_JOB"]["uz"];
        $this->user_question_data["ASK_USER_A"][1]["ru"] = $this->questions["ASK_JOB"]["ru"];

        $this->user_question_data["ASK_USER_A"][0]["uz"] = $this->questions["ASK_COMPANY_NAME"]["uz"];
        $this->user_question_data["ASK_USER_A"][0]["ru"] = $this->questions["ASK_COMPANY_NAME"]["ru"];

        $this->user_question_data["ASK_USER_B"][1]["uz"] = $this->questions["ASK_COMPANY_NAME"]["uz"];
        $this->user_question_data["ASK_USER_B"][1]["ru"] = $this->questions["ASK_COMPANY_NAME"]["ru"];

        $this->user_question_data["ASK_USER_B"][0]["uz"] = $this->questions["ASK_FIELD"]["uz"];
        $this->user_question_data["ASK_USER_B"][0]["ru"] = $this->questions["ASK_FIELD"]["ru"];
    }


    public function keyLanguages()
    {
        $ar = [];
        foreach (LANGUAGE as $key) {
            $ar[] = Button::create($key['key'])->value($key['value']);
        }
        return Question::create($this->questions["ASK_LANGUAGE"]["uz"])
            ->addButtons($ar);
    }

    public function keyUserType()
    {
        $ar = [];
        foreach ($this->key_indevidual[$this->language] as $key) {
            array_push($ar, Button::create($key["name"])->value($key["val"]));
        }
        return Question::create($this->questions["ASK_USER_TYPE"][$this->language])
            ->addButtons($ar);
    }

    public function keyActions()
    {
        $ar = [];
        $actions = Action::all()->toArray();
        foreach ($actions as $key) {
            array_push($ar, Button::create($key[$this->language])->value($key["id"]));
        }
        return Question::create($this->questions["ASK_ACTION"][$this->language])
            ->addButtons($ar);
    }

    public function keyRegions()
    {
        $ar = [];
        $regions = Region::all()->toArray();
        foreach ($regions as $key) {
            $ar[] = Button::create($key[$this->language])->value($key["id"]);
        }
        return Question::create($this->questions["ASK_REGION"][$this->language])
            ->addButtons($ar);
    }


    public function keyRoutes()
    {
        $ar = [];
        $routes = Routes::all()->toArray();
        foreach ($routes as $key) {
            $ar[] = Button::create($key[$this->language])->value($key["id"]);
        }
        return Question::create($this->questions["ASK_ROUTE"][$this->language])
            ->addButtons($ar);
    }

    public function mediaRoutes()
    {
        return Question::create($this->questions["ASK_FILE_UPLOAD"][$this->language])
            ->addButtons([
                Button::create(QUESTIONS["YES"]["name"][$this->language])->value(QUESTIONS["YES"]["value"]),
                Button::create(QUESTIONS["NO"]["name"][$this->language])->value(QUESTIONS["NO"]["value"])
            ]);
    }
    public function getUploadedImages()
    {
        if ($this->language == 'ru')
            $text = 'Загруженные файлы: <br>';
        else
            $text = 'Yuklangan fayllar: <br>';
        $path = 'uploads/' . $this->user_memory["email"];

        $files = Storage::allFiles($path);
        foreach ($files as $file) {;
            $text = $text . str_replace($path, '', $file) . '<br>';
        }
        return $text;
    }

    public function askUploadedFile()
    {
        return Question::create($this->questions["ASK_UPLOAD"][$this->language])
            ->addButtons([
                Button::create($this->questions["ASK_UPLOAD_FINISH"][$this->language])->value('Next'),
            ]);
    }

    public function run()
    {
        $this->askLanguage();
    }



    public function msgHide($text)
    {
        return '<div class="myApp msgHide" style="display: none">' . $text . '</div>';
    }

    public function msgRight($text)
    {
        return '<div class="myApp msgRight" style="display: none">' . $text . '</div>';
    }

    public function askLanguage()
    {
        $this->ask(
            $this->keyLanguages(),
            function ($language) {
                if ($language->isInteractiveMessageReply()) {
                    $this->language = $language->getValue();

                    // $this->say($this->language . $this->msgRight('Tilni tanlang | Выберите язык'));
                    $this->askEmail();
                } else {
                    return $this->repeat();
                }
            },
        );
    }

    public function askWebFile()
    {

        $email = Arr::get($this->user_memory, 'email');

        $code = <<<HTML
<div class="files" data-email="{$email}"></div>
<div style="display: none">sadfdsa<div>
HTML;

        $this->say($code);

        $this->ask(Question::create($this->questions["ASK_UPLOAD"][$this->language])
            ->addButtons([
                Button::create($this->questions["ASK_UPLOAD_FINISH"][$this->language])->value('Next'),
            ]), function ($apps) {
            if ($apps->isInteractiveMessageReply()) {
                $this->say("Fefefe" . $this->msgHide("okokd"));
                if ($apps->getValue() === 'Next')
                    $this->sayFileName();
            } else
                $this->repeat();
        });
    }
    public function sayFileName()
    {
        $this->say($this->getUploadedImages());
        $this->askRoute();
    }
    public function isTG()
    {
        $driver = $this->bot->getDriver();
        if ($driver instanceof WebDriver)
            return false;

        return true;
    }


    public function askImageFile()
    {

        $this->askForFiles('Please upload an file.', function ($files) {

            $dirname = 'uploads/' . $this->user_memory["email"];
            foreach ($files as $image) {
                $url = $image->getUrl(); // The direct url
                $payload = $image->getPayload(); // The original payload

                $this->user_memory["filename"] = $payload['file_name'];
                // Storage::makeDirectory($dirname);
                Storage::put($dirname . '/' . $payload['file_name'], file_get_contents($url));
            }
            $this->askRoute();
        });
    }


    public function askEmail()
    {
        $this->ask($this->questions["ASK_EMAIL"][$this->language], function ($email) {
            $x = preg_match('/^([a-zA-Z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/  ', $email->getText()) == 1 ? true : false;
            if ($x == true) {
                $this->user_memory["email"] = $email->getText();
                $dirname = $this->user_memory["email"];

                $dir = Storage::makeDirectory('uploads/' . $dirname);
                $files =   Storage::allFiles($dir);
                Storage::delete($files);
                // $this->say($email->getText() . $this->msgHide('Asosiy elektron pochta manzilingizni kiriting'));

                $this->askAction();
            } elseif ($x == false) {
                $this->say($this->questions["SAY_INCORRECT_FORMAT"][$this->language]);
                $this->repeat();
            }
        });
    }

    public function askAction()
    {
        $this->ask($this->keyActions(), function ($actions) {
            if ($actions->isInteractiveMessageReply()) {
                $this->memory["action"] = $actions->getValue();

                //   $this->isTG()


                $action = Action::where('id', $this->memory["action"])->first();

                if ($this->language === "ru")
                    $actionApp = $action->ru;
                else
                    $actionApp = $action->uz;

                $delimiter = ($this->isTG()) ? '**' : "<strong>";

                $this->say($actionApp . $this->msgRight($actionApp), ["parse_mode" => "HTML"]);


                $this->askAppeal();
            } else $this->repeat();
        });
    }

    // public function askTitle()
    // {
    //     $this->ask($this->questions["ASK_THEME"][$this->language], function ($answer) {
    //         $this->user_memory["title"] = $answer->getText();
    //         $this->askAppeal();
    //     });
    // }

    public function askAppeal()
    {
        $this->ask($this->questions["ASK_QUESTION"][$this->language], function ($conversation) {
            if ($conversation->getText() !== "tugat") {
                $this->memory["answer"] = $conversation->getText();
            } else $this->repeat();
            $this->askMedia();
        });
    }

    public function askMedia()
    {

        $this->ask($this->mediaRoutes(), function ($answer) {
            if ($answer->isInteractiveMessageReply()) {

                if ($answer->getValue() == QUESTIONS["YES"]["value"]) {


                    if ($this->isTG())
                        $this->askImageFile();
                    else
                        $this->say("Fefefe" . $this->msgHide("okokd"));
                    $this->askWebFile();
                } else {
                    $this->say("Fefefe" . $this->msgHide("okokd"));
                    $this->askRoute();
                }
            } else $this->repeat();
        });
    }


    public function askRegion()
    {
        $this->ask($this->keyRegions(), function ($regions) {
            if ($regions->isInteractiveMessageReply()) {
                $this->memory["region"] = $regions->getValue();

                $region = Region::where('id', $this->memory["region"])->first();
                if ($this->language === "ru") {
                    $regionApp = $region->ru;
                } else {
                    $regionApp = $region->uz;
                }
                $delimiter = ($this->isTG()) ? '**' : "<strong>";

                $this->say($regionApp . $this->msgRight("right"));

                $this->askUserType();
            } else $this->repeat();
        });
    }

    public function askRoute()
    {
        $this->ask($this->keyRoutes(), function ($routes) {
            if ($routes->isInteractiveMessageReply()) {
                $this->memory["route"] = $routes->getValue();

                $route = Routes::where('id', $this->memory["route"])->first();
                if ($this->language === "ru") {
                    $route = $route->ru;
                } else {
                    $route = $route->uz;
                }
                $delimiter = ($this->isTG()) ? '**' : "<strong>";
                $this->say($route . $this->msgRight("right"),);

                $this->askRegion();
            } else $this->repeat();
        });
    }

    public function UserLogin()
    {
        $user = User::where('email', $this->user_memory["email"])->first();
        $this->memory["pass"] = "nopass";

        if (!$user) {
            $this->memory["pass"] = $this->generatePass();
            $text = 'Your username ' . $this->user_memory["email"] . '  and password ' . $this->memory["pass"] . ' for Cabinet';
            if ($this->user_memory["usertype"] == 1) {
                $user = User::create([
                    'name' => $this->user_memory["name"],
                    'role_id' => 2,
                    'phone' => $this->user_memory["phone"],
                    'individual' => $this->user_memory["usertype"],
                    'remember_token' => $this->generatePass(32),
                    "email" => $this->user_memory["email"],
                    "password" => Hash::make($this->memory["pass"]),
                    "individual" => $this->user_memory["usertype"],
                    "place_of_work" => $this->memory["data"]["a"],
                    'settings' => json_encode(['locale' => $this->language])
                ]);
            } else {
                $user = User::create([
                    'name' => $this->user_memory["name"],
                    'role_id' => 2,
                    'phone' => $this->user_memory["phone"],
                    'individual' => $this->user_memory["usertype"],
                    'remember_token' => $this->generatePass(32),
                    "email" => $this->user_memory["email"],
                    "password" => Hash::make($this->memory["pass"]),
                    "organization" => $this->memory["data"]["a"],
                    "activity" => $this->memory["data"]["b"]
                ]);
            }

            // after registeration

            $email = $this->user_memory["email"];
            $password = $this->memory["pass"];

            // $text = $this->language == "uz" ? setting('sms.AccountUz') . ' <br/><strong>Adress: </strong> https://my.agro.uz/admin' . '<br/><strong>Email:</strong> ' . $email . ' ' . '<br/><strong>Password:</strong>' . $password . "<br/>Bizning xizmatimizdan foydalanganingiz uchun tashakkur." : setting('sms.AccountRu') . ' <br/><strong>Adress: </strong> https://my.agro.uz/admin ' . '<br/><strong>Email:</strong> ' . $email . ' ' . '<br/><strong>Password:</strong>' . $password . "<br/>Спасибо за пользование нашим сервисом.";
            if ($this->language === "uz") {
                $text = "My.Agro.Uz portalidagi shaxsiy kabinetingizga kirish ma'lumotlari";
            } else {
                $text = "Ваш доступ к персональному кабинету в портале My.Agro.Uz";
            }
            // text title
            if ($this->language === "uz") {
                $texttitle = " My.Agro.Uz portalidagi shaxsiy kabinetingizga kirish ma'lumotlari. ";
            } else {
                $texttitle = " Ваш доступ к персональному кабинету в портале My.Agro.Uz. ";
            }
            // $address = $this->language == "uz" ? " Shaxsiy kabinet: " : " Личный кабинет: ";
            if ($this->language === "uz") {
                $address = " Shaxsiy kabinet: ";
            } else {
                $address = " Личный кабинет: ";
            }

            // $emailtext = $this->language == "uz" ? " Pochtangiz: " : " Ваш адрес электронной почты: ";
            if ($this->language === "uz") {
                $emailtext = " Pochtangiz: ";
            } else {
                $emailtext = " Ваш адрес электронной почты: ";
            }
            // $passwordtext = $this->language == "uz" ? " Parolingiz: " : " Ваш пароль: ";
            if ($this->language === "uz") {
                $passwordtext = " Parolingiz: ";
            } else {
                $passwordtext = " Ваш пароль: ";
            }
            // textthnks
            if ($this->language === "uz") {
                $textthnks = " Bizning xizmatimizdan foydalanganingiz uchun tashakkur. ";
            } else {
                $textthnks = " Спасибо за пользование нашим сервисом. ";
            }

            $email = $this->user_memory["email"];
            $password = $this->memory["pass"];

            //for phones
            $textsms = $texttitle . $address . "https://my.agro.uz/admin" . $emailtext . $email . $passwordtext . $password . $textthnks;
            $smsSender = new SmsService();
            $smsSender->send('998' . $this->user_memory["phone"], $textsms);

            // for emails
            $texttoemail = "<br>" . $texttitle . "<br>" . "<b>" . $address . "</b>" . ": http://my.agro.uz/admin" . "<br>" . "<b>" . $emailtext . "</b>: " . $email . "<br>" . "<b>" . $passwordtext . "</b>: " . $password . "<br>";
            $details = [
                'title' => $text,
                'body' => $texttoemail . "<br>" . $textthnks
            ];
            Mail::to($this->user_memory["email"])->send(new SendMail($details));
        } else {
            $this->user_memory["usertype"] = $user->individual;
            $this->user_memory["phone"] = $user->phone;
            $this->user_memory["name"] = $user->name;
        }

        $this->user_memory["id"] = $user->id;
        $this->askEnd();
    }


    public function askPhone()
    {
        $this->ask($this->questions["ASK_PHONE"][$this->language], function ($phone) {
            $x = preg_match('/^9[012345789][0-9]{7}$/', $phone->getText()) == 1 ? true : false;
            if ($x == true) {
                $this->user_memory["phone"] = $phone->getText();
                $this->verifyPhone($this->user_memory["phone"]);
            } elseif ($x == false) {
                $this->say($this->questions["SAY_INCORRECT_FORMAT"][$this->language]);
                $this->repeat();
            }
        });
    }

    public function verifyPhone($phone)
    {
        if ($this->language === "uz") {
            $textverify = "My.Agro.Uz portali uchun tasdiqlash kodi: ";
        } else {
            $textverify = "Код подтверждения для портала My.Agro.Uz: ";
        };

        $this->verify = $this->generatePass(4);
        $smsSender = new SmsService();
        $smsSender->send('998' . $phone, $textverify  . $this->verify);
        $this->ask($this->questions["ASK_VERIFY_PHONE"][$this->language], function ($verifycode) {

            if ($verifycode == $this->verify) {
                $this->UserLogin();
            } else {
                $this->say($this->questions["SAY_INCORRECT_CODE"][$this->language]);
                $this->repeat();
            }
        });
    }

    public function askName()
    {
        $this->ask(
            $this->questions["ASK_NAME"][$this->language],
            function ($name) {
                $this->user_memory["name"] = $name->getText();
                $user = User::where('email', $this->user_memory["email"])->first();
                if ($user) {
                    Log::info($user->phone);
                    $this->verifyPhone($user->phone);
                } else {
                    $this->askPhone();
                }
            }
        );
    }

    public function askUser()
    {
        if ($this->user_memory["usertype"] == 0) {
            $this->ask($this->user_question_data["ASK_USER_A"][$this->user_memory["usertype"]][$this->language], function ($ask1) {
                $this->memory["data"]["a"] = $ask1->getText();
                $this->ask(
                    $this->user_question_data["ASK_USER_B"][$this->user_memory["usertype"]][$this->language],
                    function ($ask2) {
                        $this->memory["data"]['b'] = $ask2->getText();
                        $this->askName();
                    }
                );
            });
        } else {
            $this->ask($this->user_question_data["ASK_USER_A"][$this->user_memory["usertype"]][$this->language], function ($ask1) {
                $this->memory["data"]["a"] = $ask1->getText();
                $this->askName();
            });
        }
    }

    public function askUserType()
    {
        $this->ask($this->keyUserType(), function ($usertype) {
            if ($usertype->isInteractiveMessageReply()) {
                $this->user_memory["usertype"] = $usertype->getValue();

                $this->say("Fefefe" . $this->msgHide("okokd"));
                $this->askUser();
            } else $this->repeat();
        });
    }


    public function askEnd()
    {

        // $action = $this->language == "ru" ? Action::where('id', $this->memory["action"])->first()->ru : Action::where('id', $this->memory["action"])->first()->uz;

        $action = Action::where('id', $this->memory["action"])->first();

        if ($this->language === "ru") {
            $actionApp = $action->ru;
        } else {
            $actionApp = $action->uz;
        }
        // $region = $this->language == "ru" ? Region::where('id', $this->memory["region"])->first()->ru : Region::where('id', $this->memory["region"])->first()->uz;
        $region = Region::where('id', $this->memory["region"])->first();

        if ($this->language === "ru") {
            $regionApp = $region->ru;
        } else {
            $regionApp = $region->uz;
        }

        // $route = $this->language == "ru" ? Routes::where('id', $this->memory["route"])->first()->ru : Routes::where('id', $this->memory["route"])->first()->uz;

        $route = Routes::where('id', $this->memory["route"])->first();

        if ($this->language === "ru") {
            $routeApp = $route->ru;
        } else {
            $routeApp = $route->uz;
        }

        $this->say($this->questions["ASK_NAME"][$this->language] . ': ' . $this->user_memory["name"] . '<br> ' . $this->questions["SAY_ACTION"][$this->language] . ': ' . $actionApp . '<br>  ' . $this->questions["ASK_REGION_TEXT"][$this->language] . ': ' . $regionApp . '<br>' . $this->questions["ASK_ROUTE_TEXT"][$this->language] . ': ' . $routeApp . '<br> E-mail: ' . $this->user_memory["email"] . '<br> Tel: ' . $this->user_memory["phone"] . '<br> ');


        $dirname = '/uploads/' . $this->user_memory["email"];
        $files = Storage::files($dirname . '/');
        Log::info(json_encode($files));
        $appeal = new Appeal();
        $appeal->text = $this->memory["answer"];
        $appeal->user_id = $this->user_memory["id"];
        $appeal->region = $this->memory["region"];
        $appeal->route = $this->memory["route"];
        $appeal->type = $this->memory["action"];
        $appeal->fullname = $this->user_memory["name"];
        $appeal->status = 1;
        if ($this->user_memory["usertype"] === 1) {
            $appeal->company = $this->memory["data"]["a"];
            // $appeal->branch = $this->memory["data"]["b"];
        } else {
            $appeal->workplace = $this->memory["data"]["a"];
        }
        $appeal->save();

        //
        if ($this->user_memory["email"]) {
            $dirname = '/files/' . $this->user_memory["email"] . '/' . $appeal->id . '/';

            foreach ($files as $file) {
                // Storage::makeDirectory('/files//' . $this->user_memory["email"] . '/' . $appeal->id);

                Log::info($file);
                Storage::move($file, $dirname . '/' . pathinfo($file, PATHINFO_BASENAME));
            }

            $files = Storage::allFiles('files/' . $this->user_memory["email"] . '/' . $appeal->id . '/');
        }
        Appeal::where('id', $appeal->id)->update(['images' => json_encode($files)]);

        $this->say($this->questions["FINISH"][$this->language]);


        //question email & phone sms

        // $text = $this->language = "uz" ? " Ваше обращение зарегистрировано в портале My.Agro.Uz номером " . $appeal->id : " ";
        if ($this->language === "uz") {
            $text = " Sizning murojaatingiz My.Agro.Uz portalida " . $appeal->id . " raqam bilan ro'yxatga olingan. ";
        } else {
            $text = " Ваше обращение зарегистрировано в портале My.Agro.Uz номером. " . $appeal->id;
        }
        // text title
        if ($this->language === "uz") {
            $texttitle = " Shaxsiy hisobingizda tegishli javoblarni olishingiz mumkin: ";
        } else {
            $texttitle = " Вы можете получать соответствующие ответы в персональном кабинете: ";
        }
        // $add = $this->language = "uz" ? " Adress: " : "";
        if ($this->language === "uz") {
            $add = " Kabinet manzili: ";
        } else {
            $add = " Адрес кабинета: ";
        }
        // $email = $this->language = "uz" ? " E-Mail: " : "";
        if ($this->language === "uz") {
            $email = " Sizning login: ";
        } else {
            $email = " Ваш логин: ";
        }
        // password
        if ($this->language === "uz") {
            $password = " Parolingiz: ";
        } else {
            $password = " Ваш пароль: ";
        }
        // password text
        if ($this->language === "uz") {
            $passwordtext = " Parol ro'yxatdan o'tish paytida sizga yuborilgan. ";
        } else {
            $passwordtext = " Пароль был Вам отправлен при регистрации. ";
        }
        // thanks text
        if ($this->language === "uz") {
            $textthnks = " Bizning xizmatimizdan foydalanganingiz uchun tashakkur. ";
        } else {
            $textthnks = " Спасибо за пользование нашим сервисом. ";
        }

        //for phone
        $texttosms = $text . $texttitle . $add . "https://my.agro.uz/admin" . $email  . $this->user_memory["email"];
        $smsSender = new SmsService();
        $smsSender->send('998' . $this->user_memory["phone"], $texttosms);

        //for email
        $texttoemail = $text . "<br>" . $texttitle . "<br>" . "<b>" . $add . "</b>" . "https://my.agro.uz/admin" . "<br>" . "<b>" . $email  . "</b>" . $this->user_memory["email"] . "<br>" . "<b>" . $password . "</b>" . $passwordtext . "<br>" . $textthnks;
        $details = [
            'title' => $text,
            'body' => $texttoemail
        ];
        Mail::to($this->user_memory["email"])->send(new SendMail($details));
    }

    public function generatePass($length = 4)
    {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
