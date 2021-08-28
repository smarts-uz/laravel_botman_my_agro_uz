<?php

namespace App\Conversations;

use App\Models\Action;
use App\Models\Appeal;
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

const LANGUAGE = ["uz", "ru"];
const QUESTIONS = [
    'ASK_LANGUAGE' => ['uz' => 'Tilni belgilang', 'ru'=>'Tilni belgilang! Ru'],
    'ASK_INDIVIDUAL' => ['uz' => 'Выберите тип субъекта', 'ru'=>'Выберите тип субъекта! Ru'],
    'ASK_NAME' => ['uz' => 'Ismingizni ?','ru' => 'Ismingizni ? Ru'],
    'ASK_PHONE' => ['uz' => 'Telefon raqamingiz? (998)', 'ru'=>'Telefon raqamingiz? (998)'],
    'ASK_EMAIL' => ['uz' => 'Email?', 'ru'=>'Email Ru?'],
    'ASK_ACTION' => ['uz' => 'Выберите действие!', 'ru'=>'Выберите действие! Ru'],
    'ASK_REGION' => ['uz' => 'Выберите регион!', 'ru'=>'Выберите регион! Ru'],
    'ASK_ROUTE' => ['uz' => 'Выберите необходимое направление или сферу!', 'ru'=>'Выберите необходимое направление или сферу! Ru'],
    'ASK_1' => ['uz' => 'Просим предоставить необходимую информацию! Место работы и организация ', 'ru'=>'Просим предоставить необходимую информацию! Место работы и организация '],
    'ASK_11' => ['uz' => 'Просим предоставить необходимую информацию! Название организации ', 'ru'=>'Просим предоставить необходимую информацию! Название организации '],
    'ASK_2' =>  ['uz' => 'Просим предоставить необходимую информацию! Должность и род занятия ', 'ru'=>'Просим предоставить необходимую информацию! Должность и род занятия '],
    'ASK_22' => ['uz' => 'Просим предоставить необходимую информацию! Направление деятельности ', 'ru'=>'Просим предоставить необходимую информацию! Направление деятельности '],

    'TELL_PHONE_SEND' => ['uz' => 'Отправить свой номер', 'ru'=>'Отправить свой номер Ru'],
];
const KEY_INDIVIDUALS = [
    'ru' => [['name'=>'Физическое лицо', 'val' => 0], ['name'=>'Юридическое лицо', 'val' => 1]],
    'uz' => [['name'=>'Физическое лицо', 'val' => 0], ['name'=>'Юридическое лицо', 'val' => 1]],

];
const MESSAGES = [
    'TELL_ME_APPEAL' => ['uz' => 'Вы можете отправить все ваши сообщения в необходимом Вам формате (видео / аудио / фото / текст), Также вы можете прикреплять файлы.', 'ru' => 'Вы можете отправить все ваши сообщения в необходимом Вам формате (видео / аудио / фото / текст), Также вы можете прикреплять файлы.'],
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
    private $language;
    private $usertype;
    public function ContactKeyboard()
    {
        return Keyboard::create()
            ->addRow(KeyboardButton::create(QUESTIONS["TELL_PHONE_SEND"]["uz"])->requestContact())
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
        foreach (KEY_INDIVIDUALS["uz"] as $key) {
            array_push($ar,Button::create($key["name"])->value($key["val"]));
        }
        return Question::create(QUESTIONS["ASK_LANGUAGE"]["uz"])
        ->addButtons($ar);
    }
    public function keyActions(){
        $ar = [];
        $actions = Action::all();
        foreach ($actions as $key) {
            array_push($ar,Button::create($key->uz)->value($key->id));
        }
        return Question::create(QUESTIONS["ASK_ACTION"]["uz"])
        ->addButtons($ar);
    }
    public function keyRegions(){
        $ar = [];
        $regions = Region::all();
        foreach ($regions as $key) {
            array_push($ar,Button::create($key->uz)->value($key->id));
        }
        return Question::create(QUESTIONS["ASK_REGION"]["uz"])
        ->addButtons($ar);
    }
    public function keyRoutes(){
        $ar = [];
        $routes = Routes::all();
        foreach ($routes as $key) {
            array_push($ar,Button::create($key->uz)->value($key->id));
        }
        return Question::create(QUESTIONS["ASK_ROUTE"]["uz"])
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
            $this->ask(QUESTIONS["ASK_1"]["uz"], function($ask1){
                $this->memory["data"]["a"] = $ask1->getText();
                $this->ask(QUESTIONS["ASK_11"]["uz"], function($ask2) {
                    $this->memory["data"]['b'] = $ask2->getText();
                    $this->ask(
                        QUESTIONS["ASK_NAME"]["uz"],
                        function ($name) {
                        $this->user_mamory["name"] = $name->getText();
                        $this->ask(QUESTIONS["ASK_PHONE"]["uz"], function ($phone) {
                            $x = preg_match('/^9989[012345789][0-9]{7}$/', $phone->getText()) == 1 ? true : false;
                            if($x == true) {
                                $this->user_mamory["phone"] = $phone->getText();
                                $this->ask(QUESTIONS["ASK_EMAIL"]["uz"], function ($email) {
                                    $x = preg_match('/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/  ', $email->getText()) == 1 ? true : false;
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

            $this->ask(QUESTIONS["ASK_2"]["uz"], function($ask1){
                $this->memory["data"]["a"] = $ask1->getText();
                $this->ask(QUESTIONS["ASK_22"]["uz"], function($ask2) {
                    $this->memory["data"]['b'] = $ask2->getText();
                    $this->ask(
                        QUESTIONS["ASK_NAME"]["uz"],
                        function ($name) {
                        $this->user_mamory["name"] = $name->getText();
                        $this->ask(QUESTIONS["ASK_PHONE"]["uz"], function ($phone) {
                            $this->user_mamory["phone"] = $phone->getText();
                            $this->ask(QUESTIONS["ASK_EMAIL"]["uz"], function ($email) {
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
        Log::info(json_encode($this->user_mamory));
        $user = User::where('email', $this->user_mamory["email"])->first();
        if(!$user){
            $mailer = new MailService();
            $text = 'Your username '.$this->user_mamory["email"].'  and password '.$this->generatePass(). ' for Cabinet';
            $mailer->sendMail($this->user_mamory["email"], 'Asadbek', $text);
            User::create([
                'name' => $this->user_mamory["name"],
                'role_id' => 2,
                'phone' => $this->user_mamory["phone"],
                'individual' => $this->user_mamory["usertype"],
                "email" => $this->user_mamory["email"],
                "password" => Hash::make($this->generatePass())
            ]);
            Auth::login($user);

        }
        $this->askAppeal();

    }
    public function askAppeal(){
        $this->ask("Savol yuboring", function($conversation){
            if ($conversation->getText() != "tugat") {
                $appeal = new Appeal();
                $appeal->text = $conversation->getText();
                $appeal->user_id = Auth::user()->id;
                $appeal->region = $this->memory["region"];
                $appeal->route = $this->memory["route"];
                $appeal->type = $this->memory["action"];
                $appeal->save();

            } else $this->askAppeal();
            $this->say("Murojaat uchun rahmat");
        });

    }
    function generatePass($length = 8) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
