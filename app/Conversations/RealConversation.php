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

    'HA' => ['name' => ['uz' => 'Fayl biriktirish', 'ru' => 'Прикрепить файл'], 'value' => 'Yes'],
    'YOQ' => ['name' => ['uz' => 'O\'tkazib yuborish', 'ru' => 'Пропустить'], 'value' => 'No'],
    'YES' => ['name' => ['uz' => 'Ha', 'ru' => 'Да'], 'value' => 'Yes'],
    'NO' => ['name' => ['uz' => 'Yo\'q', 'ru' => 'Нет'], 'value' => 'No'],
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
            array_push($ar, Button::create($key["name"])->value($key["name"]));
        }
        return Question::create("")
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
        return Question::create(" ")
            ->addButtons([
                Button::create(QUESTIONS["HA"]["name"][$this->language])->value(QUESTIONS["HA"]["value"]),
                Button::create(QUESTIONS["YOQ"]["name"][$this->language])->value(QUESTIONS["YOQ"]["value"])
            ]);
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
        // $arr= QuestionText::select('name', 'uz', 'ru')->get()->keyBy('name');
        // $this->say(json_encode($arr, JSON_UNESCAPED_UNICODE));
        // $this->askImageFile();
        // $this->say(Storage::allFiles('fayzulloev'));
        $this->askLanguage();
        // $this->ask($this->keyLanguages(), [
        //     [
        //         'pattern' => 'yes|yep',
        //         'callback' => function ($bot) {
        //             $this->say();
        //         }
        //     ],
        //     [
        //         'pattern' => 'nah|no|nope',
        //         'callback' => function () {
        //             $this->say('PANIC!! Stop the engines NOW!');
        //         }
        //     ]
        // ]);
        // $this->say("Hello");
        // $apiParameters = [
        //     'chat_id' => 'mceiov',
        //     'message_id' => '1'
        //     ];
        //     $this->bot->sendRequest('deleteMessage', $apiParameters);
        //     $this->say("OK");

    }
    public function askLanguage()
    {
        $this->ask($this->keyLanguages(), function ($language) {
            if ($language->isInteractiveMessageReply()) {
                $this->language = $language->getValue();
                if($language->getValue() == 'uz'){
                    $this->say("<strong> O`zbek </strong>");
                } else {
                    $this->say("<strong> Pусский </strong>");
                }
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
HTML;

        $this->say($code);

        $this->ask(Question::create($this->questions["ASK_UPLOAD"][$this->language])
            ->addButtons([
                Button::create($this->questions["ASK_UPLOAD_FINISH"][$this->language])->value('Next'),
            ]), function ($apps) {
            if ($apps->isInteractiveMessageReply()) {
                if ($apps->getValue() === 'Next')
                    $this->askRoute();
            } else
                $this->repeat();
        });
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

                $this->say(json_encode($payload));
                $this->user_memory["filename"] = $payload['file_name'];
                // Storage::makeDirectory($dirname);
                Storage::put($dirname . '/' . $payload['file_name'], file_get_contents($url));
                $this->say(json_encode(Storage::allFiles($dirname)));
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
                Storage::makeDirectory('uploads/' . $dirname);
                $this->say("<strong>".$this->user_memory["email"]."</strong>");
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
                $this->say("<strong>".$action = $this->language=="ru" ? Action::where('id', $this->memory["action"])->first()->ru : Action::where('id', $this->memory["action"])->first()->uz."</strong>");
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
            if ($conversation->getText() != "tugat") {
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
                        $this->askWebFile();
                } else {
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
                $this->say("<strong>".$region = $this->language=="ru" ? Region::where('id', $this->memory["region"])->first()->ru : Region::where('id', $this->memory["region"])->first()->uz."</strong>");
                $this->askUserType();
            } else $this->repeat();
        });
    }

    public function askRoute()
    {
        $this->ask($this->keyRoutes(), function ($routes) {
            if ($routes->isInteractiveMessageReply()) {
                $this->memory["route"] = $routes->getValue();
                $this->say("<strong>".$route = $this->language=="ru"? Routes::where('id', $this->memory["route"])->first()->ru : Routes::where('id', $this->memory["route"])->first()->uz."</strong>");
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
                    "place_of_work" => $this->memory["data"]["a"]
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
                    "individual" => $this->user_memory["usertype"],
                    "organization" => $this->memory["data"]["a"],
                    "activity" => $this->memory["data"]["b"]
                ]);
            }
            $email = $this->user_memory["email"];
            $password = $this->memory["pass"];
            $text = $this->language == "uz" ? setting('sms.AccountUz') . ' ' . 'Email: ' . $email . ' ' . 'Password:' . $password : setting('sms.AccountRu') . ' ' . ' Email: ' . $email . ' ' . 'Password:' . $password;

            $smsSender = new SmsService();
            $smsSender->send('998' . $this->user_memory["phone"], ",l,mfmgmgbmg");
            $smsSender = new SmsService();


            $details = [
                'title' => 'AGRO.UZ ',
                'body' => $text
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
        $this->verify = $this->generatePass(4);
        $smsSender = new SmsService();
        $smsSender->send('998' . $phone, "My.Agro.Uz portali uchun tasdiqlash kodi: " . $this->verify);
        $this->ask($this->questions["ASK_VERIFY_PHONE"][$this->language], function ($verifycode) {
            Log::info($this->verify);
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
                $this->askUser();
            } else $this->repeat();
        });
    }


    public function askEnd()
    {
        $action = $this->language == "ru" ? Action::where('id', $this->memory["action"])->first()->ru : Action::where('id', $this->memory["action"])->first()->uz;
        $region = $this->language == "ru" ? Region::where('id', $this->memory["region"])->first()->ru : Region::where('id', $this->memory["region"])->first()->uz;
        $route = $this->language == "ru" ? Routes::where('id', $this->memory["route"])->first()->ru : Routes::where('id', $this->memory["route"])->first()->uz;

        $this->say($this->questions["ASK_NAME"][$this->language] . ': ' . $this->user_memory["name"] . '<br> ' . $this->questions["SAY_ACTION"][$this->language] . ': ' . $action . '<br>  ' . $this->questions["ASK_REGION_TEXT"][$this->language] . ': ' . $region . '<br>' . $this->questions["ASK_ROUTE_TEXT"][$this->language] . ': ' . $route . '<br> E-mail: ' . $this->user_memory["email"] . '<br> Tel: ' . $this->user_memory["phone"] . '<br> ');
        $question =
            Question::create($this->questions["ASK_VERIFY"][$this->language])
            ->addButtons([
                Button::create(QUESTIONS["YES"]["name"][$this->language])->value(QUESTIONS["YES"]["value"]),
                Button::create(QUESTIONS["NO"]["name"][$this->language])->value(QUESTIONS["NO"]["value"])
            ]);

        $this->ask($question, function ($answer) {

            if ($answer->isInteractiveMessageReply()) {

                $dirname = '/uploads/' . $this->user_memory["email"];
                $files = Storage::files($dirname . '/');
                Log::info(json_encode($files));
                if ($answer->getValue() == QUESTIONS["YES"]["value"]) {
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

                    if ($this->user_memory["email"]) {
                        $dirname =  '/files/' . $this->user_memory["email"] . '/' . $appeal->id . '/';

                        foreach ($files as $file) {
                            // Storage::makeDirectory('/files//' . $this->user_memory["email"] . '/' . $appeal->id);

                            Log::info($file);
                            Storage::move($file, $dirname . '/' . pathinfo($file, PATHINFO_BASENAME));
                        }

                        $files = Storage::allFiles('files/' . $this->user_memory["email"] . '/' . $appeal->id . '/');
                    }
                    Appeal::where('id', $appeal->id)->update(['images' => json_encode($files)]);

                    $this->say($this->questions["FINISH"][$this->language]);
                } else {
                    Storage::delete($files);
                    $this->askAppeal();
                }
            } else {
                $this->repeat();
            }
        });
    }

    static function generatePass($length = 4)
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
