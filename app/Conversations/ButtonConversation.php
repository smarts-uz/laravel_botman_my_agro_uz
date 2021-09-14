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
const LANGUAGE = ["uz", "ru"];
const QUESTIONS = [
    'ASK_LANGUAGE' => ['uz' => 'Tilni tanlang', 'ru'=>'Выберите язык '],
    'ASK_LANGUAGE1' => ['uz' => 'Ro\'yxatdan o\'tish', 'ru'=>'Зарегистрироваться '],
    'ASK_INDIVIDUAL' => ['uz' => 'Выберите тип субъекта', 'ru'=>'Выберите тип субъекта! '],
    'ASK_NAME' => ['uz' => 'F.I.O','ru' => 'Ф.И.О '],
    'ASK_PHONE' => ['uz' => 'Telefon raqamingiz (901234567 formatda)', 'ru'=>'Номер телефона(на формате 901234567)'],
    'ASK_EMAIL' => ['uz' => 'Asosiy elektron pochtangiz', 'ru'=>'Отправьте оснавную электронную почту '],
    'ASK_ACTION' => ['uz' => 'Murojaat turini tanlang!', 'ru'=>'Выберите вид обращения'],
    'ASK_REGION' => ['uz' => 'Kerakli viloyatni tanlang!', 'ru'=>'Выберите регион! '],
    'ASK_ROUTE' => ['uz' => 'Kerakli yo\'nalishni tanlang!', 'ru'=>'Выберите необходимое направление или сферу! '],
    'ASK_1' => ['uz' => 'Ish joyi\tashkilot', 'ru'=>' Место работы и организация '],
    'ASK_11' => ['uz' => 'Tashkilot nomi', 'ru'=>' Название организации '],
    'ASK_2' =>  ['uz' => 'Lavozim', 'ru'=>' Должность и род занятия '],
    'ASK_22' => ['uz' => 'Tashkilot yo\'nalishi', 'ru'=>' Направление деятельности '],
    // 'TELL_PHONE_SEND' => ['uz' => 'Отправить свой номер', 'ru'=>'Отправить свой номер '],
];
const KEY_INDIVIDUALS = [
    'ru' => [['name'=>'Физическое лицо', 'val' => 0], ['name'=>'Юридическое лицо', 'val' => 1]],
    'uz' => [['name'=>'Jismoniy shaxs', 'val' => 0], ['name'=>'Yuridik shaxs', 'val' => 1]],

];
const MESSAGES = [
    'TELL_ME_APPEAL' => ['uz' => 'Сизда ушбу йўналишга оид қандайдир маълумот (видео/аудио/фото/в.х.) бўлса, илова қилган ҳолда бизга юборишингиз мумкин!', 'ru' => 'Вы можете отправить все ваши сообщения в необходимом Вам формате (видео / аудио / фото / текст), Также вы можете прикреплять файлы!'],
];
const msgUz = '🗣 Хурматли фуқоролар Қишлоқ хўжалиги вазирлиги тизимида коррупцияга дуч келсангиз, бизга хабар беринг.
        🤳Қишлоқ хўжалиги вазирлиги тизимидаги, жумладан, қишлоқ хўжалиги бошқармалари ва бўлимлари,вазирлик тизимидаги корхоналар, ташкилотлар ва таълим муассасаларидаги коррупция ҳолатлари ҳақида маълумотларни телеграмдаги @UzAgroAnticorruptionBot ботига ва  +998 71 206-70-65 вазирликнинг ишонч телефонига хабар қилиш орқали юборишингиз мумкин.
        ‼️Юборилган хабарлар белгиланган тартибда кўриб чиқилади ҳамда мурожаат қилувчининг шахси сир сақланиши кафолатланади.';
const msgRu = '🗣 Уважаемые граждане! Если вы столкнетесь с коррупцией в системе Минсельхоза, сообщите нам об этом.
        🤳 Информацию о коррупции в системе Минсельхоза, в том числе сельскохозяйственных ведомствах и отделах, предприятиях, организациях и образовательных учреждениях в системе министерства, можно отправить боту @UzAgroAnticorruptionBot в телеграмме и на горячую линию министерства +998 71 206-70-65.
        ‼ ️Отправленные сообщения будут рассмотрены в установленном порядке, и конфиденциальность заявителя будет гарантирована.';
class ButtonConversation extends Conversation
{
    public $memory=[];
    public $user_mamory;
    public $language;
    public $usertype;
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
            array_push($ar,Button::create($key)->value($key));
        }
        return Question::create(QUESTIONS["ASK_LANGUAGE"]["uz"])
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
            array_push($ar,Button::create($key["uz"])->value($key["id"]));
        }
        return Question::create(QUESTIONS["ASK_ACTION"][$this->language])
        ->addButtons($ar);
    }
    public function keyRegions(){
        $ar = [];
        $regions = Region::all()->toArray();
        foreach ($regions as $key) {
            array_push($ar,Button::create($key[$this->language])->value($key["id"]));
        }
        return Question::create(QUESTIONS["ASK_REGION"][$this->language])
        ->addButtons($ar);
    }
    public function keyRoutes(){
        $ar = [];
        $routes = Routes::all()->toArray();
        foreach ($routes as $key) {
            array_push($ar,Button::create($key[$this->language])->value($key["id"]));
        }
        return Question::create(QUESTIONS["ASK_ROUTE"][$this->language])
        ->addButtons($ar);
    }

    public function run()
    {

        // $this->askLanguage();
    }
    public function askLanguage(){
        $this->ask($this->keyLanguages(), function($language){
            if ($language->isInteractiveMessageReply()) {
                $this->language = $language->getValue();
                $this->askUserType();
            } else {
                return $this->repeat();
            }
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
    public function askUser(){
        if($this->user_mamory["usertype"]==0){
            $this->ask(QUESTIONS["ASK_1"][$this->language], function($ask1){
                $this->memory["data"]["a"] = $ask1->getText();
                $this->ask(QUESTIONS["ASK_11"][$this->language], function($ask2) {
                    $this->memory["data"]['b'] = $ask2->getText();
                    $this->ask(
                        QUESTIONS["ASK_NAME"][$this->language],
                        function ($name) {
                        $this->user_mamory["name"] = $name->getText();
                        $this->ask(QUESTIONS["ASK_PHONE"][$this->language], function ($phone) {
                            $x = preg_match('/^9[012345789][0-9]{7}$/', $phone->getText()) == 1 ? true : false;
                            if($x == true) {
                                $this->user_mamory["phone"] = $phone->getText();
                                $this->ask(QUESTIONS["ASK_EMAIL"][$this->language], function ($email) {
                                    $x = preg_match('/^([a-zA-Z0-9_\.-]+)@([\da-zA-Z\.-]+)\.([a-z\.]{2,6})$/  ', $email->getText()) == 1 ? true : false;
                                    if($x == true) {
                                        $this->user_mamory["email"] = $email->getText();
                                        $this->askAction();
                                    }elseif ($x == false) {
                                        $this->say("incorrect format");
                                        $this->repeat();
                                    }
                                });
                            }elseif ($x == false) {
                                $this->say("incorrect format");
                                $this->repeat();
                            }

                        });
                    }
                    );
                });
            });
        } else{
            Log::info('      '.$this->language);
            $this->ask(QUESTIONS["ASK_2"][$this->language], function($ask1){
                $this->memory["data"]["a"] = $ask1->getText();
                $this->ask(QUESTIONS["ASK_22"][$this->language], function($ask2) {
                    $this->memory["data"]['b'] = $ask2->getText();
                    $this->ask(
                        QUESTIONS["ASK_NAME"][$this->language],
                        function ($name) {
                        $this->user_mamory["name"] = $name->getText();
                        $this->ask(QUESTIONS["ASK_PHONE"][$this->language], function ($phone) {
                            $this->user_mamory["phone"] = $phone->getText();
                            $this->ask(QUESTIONS["ASK_EMAIL"][$this->language], function ($email) {
                                $this->user_mamory["email"] = $email->getText();
                                //

                                $this->askAction();
                            });
                        });
                    }
                    );
                });
            });
        }
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
                    $this->userLogin();

                } else $this->repeat();
        });
    }


    public function UserLogin(){
        $user = User::where('email', $this->user_mamory["email"])->first();
        $this->memory["pass"] = "nopass";

        if(!$user){
            $this->memory["pass"] = $this->generatePass();
            $text = 'Your username '.$this->user_mamory["email"].'  and password '.$this->memory["pass"]. ' for Cabinet';
            $user = User::create([
                'name' => $this->user_mamory["name"],
                'role_id' => 2,
                'phone' => $this->user_mamory["phone"],
                'individual' => $this->user_mamory["usertype"],
                'remember_token' => $this->generatePass(32),
                "email" => $this->user_mamory["email"],
                "password" => Hash::make($this->memory["pass"])
            ]);
            $info = `Adress: http://my.agro.uz/admin`."<br/>" .'Login: ' . $this->user_mamory["email"]. "<br/>".' Parol: '. $this->memory["pass"]."<br/>"."<br/>"."Bizning xizmatimizdan foydalanganingiz uchun tashakkur.";
            $text = "<br>My.Agro.Uz portalidagi shaxsiy kabinetingizga kirish ma'lumotlari.</br> Ваш доступ к персональному кабинету в портале My.Agro.Uz.<br/>".$info;
            $smsSender = new SmsService();
            $smsSender->send($this->user_mamory["phone"], $text);
            $details = [
                'title' => 'My.Agro.Uz portalidagi shaxsiy kabinetingizga kirish ma`lumotlari',
                'body' => $info
            ];
            Mail::to($this->user_mamory["email"])->send(new SendMail($details));
        }
//        else {
//        }

        $this->user_mamory["id"] = $user->id;
        // Auth::login($user);

        $this->askAppeal();
    }
    public function askAppeal(){
        $this->ask("Savol yuboring", function($conversation){
            if ($conversation->getText() != "tugat") {
                $this->memory["answer"] = $conversation->getText();


            } else $this->repeat();
            $this->askEnd();
        });

    }
    public function askEnd() {
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
                    $this->say("✅Sizning murojaatingiz belgilangan tartibda ko'rib chiqiladi va 1-3 kun ichida Qishloq xo'jaligi vazirligining My.Agro.Uz shaxsiy kabinetiga javob olasiz.");
                }else {
                    $this->askUserType();
                }
            }else {
                $this->repeat();
            }


        });
    }
    static function generatePass($length = 8) {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
