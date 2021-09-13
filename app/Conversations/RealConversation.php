<?php

namespace App\Conversations;

use App\Models\Action;
use App\Models\Region;
use App\Models\Routes;
use App\Models\User;
use App\Services\Mailer\MailService;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Attachments\Contact;
use BotMan\Drivers\Telegram\Extensions\Keyboard;
use BotMan\Drivers\Telegram\Extensions\KeyboardButton;
use BotMan\BotMan\Messages\Incoming\Answer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\services\SmsService\SmsService;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Appeal;
use App\Models\QuestionText;
const LANGUAGE = [['key' => "Uzbek", 'value' => 'uz'], ['key' => "Pусский", 'value' => 'ru']];
const QUESTIONS = [
    'ASK_LANGUAGE' => ['uz' => 'Tilni tanlang', 'ru'=>'Выберите язык '],
    'ASK_LANGUAGE1' => ['uz' => 'Ro\'yxatdan o\'tish', 'ru'=>'Зарегистрироваться '],
    'ASK_INDIVIDUAL' => ['uz' => 'Выберите тип субъекта', 'ru'=>'Выберите тип субъекта! '],
    'ASK_NAME' => ['uz' => 'F.I.O','ru' => 'Ф.И.О '],
    'ASK_PHONE' => ['uz' => 'Telefon raqamingiz', 'ru'=>'Номер телефона'],
    'ASK_EMAIL' => ['uz' => 'Asosiy elektron poshtangiz', 'ru'=>'Отправьте оснавную электронную почту '],
    'ASK_ACTION' => ['uz' => 'Bo\'limni tanlang!', 'ru'=>'Выберите действие! '],
    'ASK_REGION' => ['uz' => 'Kerakli viloyatni tanlang!', 'ru'=>'Выберите регион! '],
    'ASK_ROUTE' => ['uz' => 'Kerakli yo\'nalishni tanlang!', 'ru'=>'Выберите необходимое направление или сферу! '],
    'ASK_USER_A' => [['uz' => 'Lavozim', 'ru'=>' Должность и род занятия '],['uz' => 'Ish joyi\tashkilot', 'ru'=>' Место работы и организация ']],
    'ASK_USER_B' => [['uz' => 'Tashkilot nomi', 'ru'=>' Название организации '],['uz' => 'Tashkilot yo\'nalishi', 'ru'=>' Направление деятельности ']],

    // 'TELL_PHONE_SEND' => ['uz' => 'Отправить свой номер', 'ru'=>'Отправить свой номер '],
];
const KEY_INDIVIDUALS = [
    'ru' => [['name'=>'Физическое лицо', 'val' => 0], ['name'=>'Юридическое лицо', 'val' => 1]],
    'uz' => [['name'=>'Jismoniy shaxs', 'val' => 0], ['name'=>'Yuridik shaxs', 'val' => 1]],

];
class RealConversation extends Conversation
{
    public $memory=[];
    public $user_mamory;
    public $language;
    public $usertype;
    protected $verify;
    public $questions = [
        'ASK_LANGUAGE' => ['uz' => 'Tilni tanlang', 'ru'=>'Выберите язык '],
        'ASK_LANGUAGE1' => ['uz' => 'Ro\'yxatdan o\'tish', 'ru'=>'Зарегистрироваться '],
        'ASK_INDIVIDUAL' => ['uz' => 'Выберите тип субъекта', 'ru'=>'Выберите тип субъекта! '],
        'ASK_NAME' => ['uz' => 'F.I.O','ru' => 'Ф.И.О '],
        'ASK_PHONE' => ['uz' => 'Telefon raqamingiz', 'ru'=>'Номер телефона'],
        'ASK_EMAIL' => ['uz' => 'Asosiy elektron poshtangiz', 'ru'=>'Отправьте оснавную электронную почту '],
        'ASK_ACTION' => ['uz' => 'Bo\'limni tanlang!', 'ru'=>'Выберите действие! '],
        'ASK_REGION' => ['uz' => 'Kerakli viloyatni tanlang!', 'ru'=>'Выберите регион! '],
        'ASK_ROUTE' => ['uz' => 'Kerakli yo\'nalishni tanlang!', 'ru'=>'Выберите необходимое направление или сферу! '],
        'ASK_USER_A' => [['uz' => 'Lavozim', 'ru'=>' Должность и род занятия '],['uz' => 'Ish joyi\tashkilot', 'ru'=>' Место работы и организация ']],
        'ASK_USER_B' => [['uz' => 'Tashkilot nomi', 'ru'=>' Название организации '],['uz' => 'Tashkilot yo\'nalishi', 'ru'=>' Направление деятельности ']],
    ];
    public function __construct()
    {
        $this->questions["ASK_LANGUAGE"] = QuestionText::where('name', 'ASK_LANGUAGE')->first()->uz;

        // $this->questions["ASK_LANGUAGE"]["uz"] = QuestionText::where('name', 'ASK_LANGUAGE')->first()->uz;


        $this->questions["ASK_QUESTION"]["uz"] = QuestionText::where('name', 'ASK_QUESTION')->first()->uz;
        $this->questions["ASK_QUESTION"]["ru"] = QuestionText::where('name', 'ASK_QUESTION')->first()->ru;

        $this->questions["ASK_INDIVIDUAL"]["uz"] = QuestionText::where('name', 'ASK_INDIVIDUAL')->first()->uz;
        $this->questions["ASK_INDIVIDUAL"]["ru"] = QuestionText::where('name', 'ASK_INDIVIDUAL')->first()->ru;

        $this->questions["ASK_ACTION"]["uz"] = QuestionText::where('name', 'ASK_ACTION')->first()->uz;
        $this->questions["ASK_ACTION"]["ru"] = QuestionText::where('name', 'ASK_ACTION')->first()->ru;

        $this->questions["ASK_NAME"]["uz"] = QuestionText::where('name', 'ASK_NAME')->first()->uz;
        $this->questions["ASK_NAME"]["ru"] = QuestionText::where('name', 'ASK_NAME')->first()->ru;

        $this->questions["ASK_PHONE"]["uz"] = QuestionText::where('name', 'ASK_PHONE')->first()->uz;
        $this->questions["ASK_PHONE"]["ru"] = QuestionText::where('name', 'ASK_PHONE')->first()->ru;

        $this->questions["ASK_EMAIL"]["uz"] = QuestionText::where('name', 'ASK_EMAIL')->first()->uz;
        $this->questions["ASK_EMAIL"]["ru"] = QuestionText::where('name', 'ASK_EMAIL')->first()->ru;

        $this->questions["ASK_REGION"]["uz"] = QuestionText::where('name', 'ASK_REGION')->first()->uz;
        $this->questions["ASK_REGION"]["ru"] = QuestionText::where('name', 'ASK_REGION')->first()->ru;

        $this->questions["ASK_ROUTE"]["uz"] = QuestionText::where('name', 'ASK_ROUTE')->first()->uz;
        $this->questions["ASK_ROUTE"]["ru"] = QuestionText::where('name', 'ASK_ROUTE')->first()->ru;

        $this->questions["SAY_INCORRECT_FORMAT"]["uz"] = QuestionText::where('name', 'SAY_INCORRECT_FORMAT')->first()->uz;
        $this->questions["SAY_INCORRECT_FORMAT"]["ru"] = QuestionText::where('name', 'SAY_INCORRECT_FORMAT')->first()->ru;

        $this->questions["SAY_INCORRECT_CODE"]["uz"] = QuestionText::where('name', 'SAY_INCORRECT_CODE')->first()->uz;
        $this->questions["SAY_INCORRECT_CODE"]["ru"] = QuestionText::where('name', 'SAY_INCORRECT_CODE')->first()->ru;
        
        $this->questions["ASK_VERIFY_PHONE"]["uz"] = QuestionText::where('name', 'ASK_VERIFY_PHONE')->first()->uz;
        $this->questions["ASK_VERIFY_PHONE"]["ru"] = QuestionText::where('name', 'ASK_VERIFY_PHONE')->first()->ru;

    }
    public function ContactKeyboard()
    {
        return Keyboard::create()
            ->addRow(KeyboardButton::create(QUESTIONS["TELL_PHONE_SEND"][$this->language])->requestContact())
            ->type(Keyboard::TYPE_KEYBOARD)
            ->oneTimeKeyboard()
            ->resizeKeyboard()
            ->toArray();
    }
    public function keyLanguages(){
        $ar = [];
        foreach (LANGUAGE as $key) {
            array_push($ar,Button::create($key['key'])->value($key['value']));
        }
        return Question::create($this->questions["ASK_LANGUAGE"])
        ->addButtons($ar);
    }
    public function keyUserType(){
        $ar = [];
        foreach (KEY_INDIVIDUALS[$this->language] as $key) {
            array_push($ar,Button::create($key["name"])->value($key["val"]));
        }
        return Question::create(QUESTIONS["ASK_LANGUAGE1"][$this->language])
        ->addButtons($ar);
    }
    public function keyActions(){
        $ar = [];
        $actions = Action::all()->toArray();
        foreach ($actions as $key) {
            array_push($ar,Button::create($key[$this->language])->value($key["id"]));
        }
        return Question::create($this->questions["ASK_ACTION"][$this->language])
        ->addButtons($ar);
    }
    public function keyRegions(){
        $ar = [];
        $regions = Region::all()->toArray();
        foreach ($regions as $key) {
            array_push($ar,Button::create($key[$this->language])->value($key["id"]));
        }
        return Question::create($this->questions["ASK_REGION"][$this->language])
        ->addButtons($ar);
    }
    public function keyRoutes(){
        $ar = [];
        $routes = Routes::all()->toArray();
        foreach ($routes as $key) {
            array_push($ar,Button::create($key[$this->language])->value($key["id"]));
        }
        return Question::create($this->questions["ASK_ROUTE"][$this->language])
        ->addButtons($ar);
    }

    public function run()
    {

        $this->askLanguage();
    }
    public function askLanguage(){
        $this->ask($this->keyLanguages(), function($language){
            if ($language->isInteractiveMessageReply()) {
                $this->language = $language->getValue();
                $this->askAppeal();
            } else {
                return $this->repeat();
            }
        });
    }
    public function askAppeal(){
        $this->ask($this->questions["ASK_QUESTION"][$this->language], function($conversation){
            if ($conversation->getText() != "tugat") {
                $this->memory["answer"] = $conversation->getText();


            } else $this->repeat();
            $this->askAction();
        });

    }
    public function askAction(){
        $this->ask($this->keyActions(), function($actions){
            if ($actions->isInteractiveMessageReply()) {
                $this->memory["action"] = $actions->getValue();

                $this->askRegion();

            } else $this->repeat();
        });
    }
    public function askRegion(){
        $this->ask($this->keyRegions(), function($regions){
            if ($regions->isInteractiveMessageReply()) {
                $this->memory["region"] = $regions->getValue();

                $this->askRoute();

            } else $this->repeat();
        });
    }
    public function askRoute(){
        $this->ask($this->keyRoutes(), function($routes){
            if ($routes->isInteractiveMessageReply()) {
                    $this->memory["route"] = $routes->getValue();
                    $this->askEmail();

                } else $this->repeat();
        });
    }
    public function UserLogin(){
        $user = User::where('email', $this->user_mamory["email"])->first();
        $this->memory["pass"] = "nopass";

        if(!$user){
            $this->memory["pass"] = $this->generatePass();
            $text = 'Your username '.$this->user_mamory["email"].'  and password '.$this->memory["pass"]. ' for Cabinet';
            
            Log::info($this->user_mamory["phone"]);
            if($this->user_mamory["usertype"] == 0){
                $user = User::create([
                    'name' => $this->user_mamory["name"],
                    'role_id' => 2,
                    'phone' => $this->user_mamory["phone"],
                    'individual' => $this->user_mamory["usertype"],
                    'remember_token' => $this->generatePass(32),
                    "email" => $this->user_mamory["email"],
                    "password" => Hash::make($this->memory["pass"]),
                    "individual" => $this->user_mamory["usertype"],
                    "place_of_work" =>  $this->memory["data"]["a"],
                    "position" =>  $this->memory["data"]["b"]
                ]);
            } else {
                $user = User::create([
                    'name' => $this->user_mamory["name"],
                    'role_id' => 2,
                    'phone' => $this->user_mamory["phone"],
                    'individual' => $this->user_mamory["usertype"],
                    'remember_token' => $this->generatePass(32),
                    "email" => $this->user_mamory["email"],
                    "password" => Hash::make($this->memory["pass"]),
                    "individual" => $this->user_mamory["usertype"],
                    "organization" =>  $this->memory["data"]["a"],
                    "activity" =>  $this->memory["data"]["b"]
                ]);
            }
            $text = 'Login: ' . $this->user_mamory["email"].' Parol:'. $this->memory["pass"];
            $smsSender = new SmsService();
            $smsSender->send($this->user_mamory["phone"], $text);
            $details = [
                'title' => 'your cabinate login and password',
                'body' => $text
            ];
            Mail::to($this->user_mamory["email"])->send(new SendMail($details));


        } else {
            $this->user_mamory["usertype"] = $user->individeual;
            $this->user_mamory["phone"] = $user->phone;
            $this->user_mamory["name"] = $user->name;

            // $this->fillUserData($user);
        }
        $this->user_mamory["id"] = $user->id;
        // Auth::login($user);

        $this->askEnd();
    }
    public function fillUserData(User $user){

    }

    public function askEmail(){
        $this->ask($this->questions["ASK_EMAIL"][$this->language], function ($email) {
            $x = preg_match('/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/  ', $email->getText()) == 1 ? true : false;
            if($x == true) {
                $this->user_mamory["email"] = $email->getText();
                $user = User::where('email', $this->user_mamory["email"])->first();
                if($user) $this->UserLogin(); else $this->askUserType();
            }elseif ($x == false) {
                $this->say($this->questions["SAY_INCORRECT_FORMAT"][$this->language]);
                $this->repeat();

            }
        });
    }
    public function askPhone(){
        $this->ask($this->questions["ASK_PHONE"][$this->language], function ($phone) {
            $x = preg_match('/^9[012345789][0-9]{7}$/', $phone->getText()) == 1 ? true : false;
            if($x == true) {
                $this->user_mamory["phone"] = $phone->getText();
                $this->verifyPhone();
            }elseif ($x == false) {
                $this->say($this->questions["SAY_INCORRECT_FORMAT"][$this->language]);
                $this->repeat();
            }

        });
    }
    public function verifyPhone(){
        $this->verify = $this->generatePass(4);
        $smsSender = new SmsService();
        $smsSender->send('998'.$this->user_mamory["phone"], $this->verify);
        $this->ask($this->questions["ASK_VERIFY_PHONE"][$this->language], function($verifycode){
            Log::info($this->verify);
            if($verifycode == $this->verify){
                $this->UserLogin();

            } else {
                $this->say($this->questions["SAY_INCORRECT_CODE"][$this->language]);
                $this->repeat();
            }
        });

    }
    public function askName(){
        $this->ask(
            $this->questions["ASK_NAME"][$this->language],
            function ($name) {
            $this->user_mamory["name"] = $name->getText();
            $this->askPhone();
        }
        );
    }
    public function askUser(){

            $this->ask(QUESTIONS["ASK_USER_A"][$this->user_mamory["usertype"]][$this->language], function($ask1){
                $this->memory["data"]["a"] = $ask1->getText();
                $this->ask(QUESTIONS["ASK_USER_B"][$this->user_mamory["usertype"]][$this->language], function($ask2) {
                    $this->memory["data"]['b'] = $ask2->getText();
                    $this->askName();
                });
            });

    }
    public function askUserType(){
        $this->ask($this->keyUserType(), function($usertype){
            if ($usertype->isInteractiveMessageReply()) {
                $this->user_mamory["usertype"] = $usertype->getValue();
                $this->askUser();
            } else $this->repeat();
        });
    }










    public function askEnd() {
        $this->say('F.I.O: '.$this->user_mamory["name"].'<br>Murojaat turi: '.$this->memory["action"].'<br> Viloyat: '.$this->memory["region"].'<br> Yo`nalish: '.$this->memory["route"].'<br> E-mail: '.$this->user_mamory["email"].'<br> Tel: '.$this->user_mamory["phone"].'<br> ');
        $question = Question::create("Murojaatingizni to'g'ri yubordingizmi?")->addButtons([Button::create("Ha")->value("ha"),Button::create("Yo'q")->value("yoq")]);
        
        $this->ask($question, function ($answer) {
            if($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() == "ha") {
                    $appeal = new Appeal();
                    $appeal->text = $this->memory["answer"];
                    $appeal->user_id = $this->user_mamory["id"];
                    $appeal->region = $this->memory["region"];
                    $appeal->route = $this->memory["route"];
                    $appeal->type = $this->memory["action"];
                    $appeal->save();
                    $this->say("✅Sizning murojaatingiz belgilangan tartibda ko\'rib chiqiladi va 1-3 kun ichida Qishloq xo\'jaligi vazirligining My.Agro.Uz shaxsiy kabinetiga javob olasiz.");
                }else {
                    $this->askAppeal();
                }
            }else {
                $this->repeat();
            }


        });
    }
    static function generatePass($length = 8) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
