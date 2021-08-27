<?php

namespace App\Conversations;

use App\Models\Region;
use App\Models\Routes;
use App\Services\Mailer\MailService;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Attachments\Contact;
use BotMan\Drivers\Telegram\Extensions\Keyboard;
use BotMan\Drivers\Telegram\Extensions\KeyboardButton;
use BotMan\BotMan\Messages\Incoming\Answer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

const keyboard = [
    'Ўзбекистон Республикаси қишлоқ хўжалиги вазирлиги',
    'Қорақалпоғистон Республикаси қишлоқ хўжалиги вазирлиги',
    'Андижон вилояти қишлоқ хўжалиги бошқармаси',
    'Фарғона вилояти қишлоқ хўжалиги бошқармаси',
    'Жиззах вилояти қишлоқ хўжалиги бошқармаси',
    'Хоразм вилояти қишлоқ хўжалиги бошқармаси',
    'Наманган вилояти қишлоқ хўжалиги бошқармаси',
    'Навоий вилояти қишлоқ хўжалиги бошқармаси',
    'Қашқадарё вилояти қишлоқ хўжалиги бошқармаси',
    'Самарқанд вилояти қишлоқ хўжалиги бошқармаси',
    'Сирдарё вилояти қишлоқ хўжалиги бошқармаси',
    'Сурхондарё вилояти қишлоқ хўжалиги бошқармаси',
    'Тошкент вилояти қишлоқ хўжалиги бошқармаси',
    '"Ўздаверлойиҳа" илмий-лойиҳалаш институти',
    '"Академик М.Мирзаев номидаги боғдорчилик, узумчилик
            ва виночилик илмий-тадқиқот институти"',
    'Боғдорчилик ва иссиқхона хўжалигини ривожлантириш агентлиги',
    'Қишлоқ хўжалигида билим ва инновациялар миллий маркази',
    'Уруғчиликни ривожлантириш маркази',
    'Қишлоқ хўжалиги экинлари навларини синаш маркази',
    'Тупроқ таркиби ва репозиторийси, сифати таҳлил маркази',
    'Қишлоқ хўжалиги техникаси ва технологияларини сертификатлаш ва синаш давлат маркази',
    'Қишлоқ хўжалигини стандартлаштириш маркази',
    'Кимёлаштириш ва ўсимликларни ҳимоя қилиш воситаларини синовдан ўтказиш ва рўйхатга олиш бўйича давлат комиссияси Ишчи органи',
    'Тошкент давлат аграр университети',
    'Андижон қишлоқ хўжалиги ва агротехнологиялар институти',
    'Маъмурий-хўжалик хизмати муассасаси',
    'Агросаноатни рақамлаштириш маркази',
];
const QUESTIONS = [
    'ASK_NAME' => ['uz' => 'Ismingizni ?','ru' => 'Ismingizni ? Ru'],
    'ASK_PHONE' => ['uz' => 'Telefon raqamingiz?', 'ru'=>'Telefon raqamingiz?'],
    'ASK_EMAIL' => ['uz' => 'Email?', 'ru'=>'Email Ru?'],
    'ASK_ACTION' => ['uz' => 'Выберите действие!', 'ru'=>'Выберите действие! Ru'],
    'ASK_REGION' => ['uz' => 'Выберите регион!', 'ru'=>'Выберите регион! Ru'],
    'ASK_ROUTE' => ['uz' => 'Выберите необходимое направление или сферу!', 'ru'=>'Выберите необходимое направление или сферу! Ru'],

    'TELL_PHONE_SEND' => ['uz' => 'Отправить свой номер', 'ru'=>'Отправить свой номер Ru'],
];
const KEY_ACTIONS = [
    'Задать вопрос',
    'Оставить обращение',
    'Консультация',
];
const Messages = [
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
    private $memory;
    public function ContactKeyboard()
    {
        return Keyboard::create()
            ->addRow(KeyboardButton::create(QUESTIONS["TELL_PHONE_SEND"]["uz"])->requestContact())
            ->type(Keyboard::TYPE_KEYBOARD)
            ->oneTimeKeyboard()
            ->resizeKeyboard()
            ->toArray();
    }
    public function keyActions(){
        $ar = [];
        foreach (KEY_ACTIONS as $key) {
            array_push($ar,Button::create($key)->value($key));
        }
        return Question::create(QUESTIONS["ASK_ACTION"]["uz"])
        ->addButtons($ar);
    }
    public function keyRegions(){
        $ar = [];
        $regions = Region::select('uz')->get();
        foreach ($regions as $key) {
            array_push($ar,Button::create($key->uz)->value($key->uz));
        }
        return Question::create(QUESTIONS["ASK_REGION"]["uz"])
        ->addButtons($ar);
    }
    public function keyRoutes(){
        $ar = [];
        $routes = Routes::select('uz')->get();
        foreach ($routes as $key) {
            array_push($ar,Button::create($key->uz)->value($key->uz));
        }
        return Question::create(QUESTIONS["ASK_ROUTE"]["uz"])
        ->addButtons($ar);
    }

    public function run()
    {
        // $this->askUser();
        $question = Question::create('tilni tanlang!')
        ->addButtons([
            Button::create('uzbek')->value('uz'),
            Button::create('русский')->value('ru'),
        ]);
        $this->ask(QUESTIONS["ASK_NAME"]["uz"], function($name){
            $this->ask(QUESTIONS["ASK_PHONE"]["uz"], function($phone){

            //     $this->askForContact('PHONE', function(Contact $contact){

            //         $this->say("Your phone number is ".$contact->getPhoneNumber());
            //     },
            //     null,
            //     $this->ContactKeyboard()
            // );
                $this->ask(QUESTIONS["ASK_EMAIL"]["uz"], function($email){
                    $this->say("Ok" . $email->getText());
                    // $pstext = str_random(8);
                    // $hashed_random_password = Hash::make($pstext);
                    // $mailer = new MailService();
                    // $mailer->sendMail($email->getText(), 'Asadbek',"OK");

                    $this->ask($this->keyActions(), function($actions){
                        if ($actions->isInteractiveMessageReply()) {
                            $this->say("You selected ".$actions->getValue());

                            $this->ask($this->keyRegions(), function($regions){
                                if ($regions->isInteractiveMessageReply()) {
                                    $this->say("You selected ".$regions->getValue());

                                    $this->ask($this->keyRoutes(), function($routes){
                                        if ($routes->isInteractiveMessageReply()) {
                                            $this->say("You selected ".$routes->getValue());
                                        } else $this->repeat();
                                    });

                                } else $this->repeat();
                            });

                        } else $this->repeat();
                    });
                });
            });

            }
        );
        // $this->ask($question, function($answer){
            // if ($answer->isInteractiveMessageReply()) {
            //     if($answer->getValue() == 'uz') {
            //         $this->say(msgUz);
            //         $questionn = Question::create('Бўлимни танланг!')
            //             ->addButtons([
            //                 Button::create('Вилоятлар')->value('regions'),
            //                 Button::create('Тузилмалар')->value('structs'),
            //             ]);
            //         $this->ask($questionn,function ($answerr) {
            //             if ($answerr->isInteractiveMessageReply()) {
            //                 if($answerr->getValue() == 'regions') {
            //                     $ar = [];

            //                     foreach (keyboardd as $key) {
            //                         array_push($ar,Button::create($key)->value($key));
            //                     }
            //                     $questionn = Question::create('Керакли вилоят танланг!')
            //                         ->addButtons($ar);
            //                     $this->ask($questionn,function ($answerr) {
            //                         if ($answerr->isInteractiveMessageReply()) {
            //                             $ar = [];

            //                             foreach (keyboarddd as $key) {
            //                                 array_push($ar,Button::create($key)->value($key));
            //                             }
            //                             $questionn = Question::create('Керакли йўналишни танланг!')
            //                                 ->addButtons($ar);

            //                             $this->ask($questionn,function ($answer){
            //                                 if ($answer->isInteractiveMessageReply()) {
            //                                     $questionn = Question::create('Сизда ушбу йўналишга оид қандайдир маълумот (видео/аудио/фото/в.х.) бўлса, илова қилган ҳолда бизга юборишингиз мумкин!')

            //                                         ->addButtons([Button::create('')->value('fd')]);

            //                                     $this->ask($questionn,function ($answer){
            //                                         $this->say('✅Юборган хабарингиз белгиланган тартибда кўриб чиқилади. Маълумот учун рахмат!');
            //                                         $this->say('✅boshlashj uchun /start ni yuboring');
            //                                     });
            //                                 }else {
            //                                     $this->repeat();
            //                                 }


            //                             });

            //                         }else {
            //                             $this->repeat();
            //                         }


            //                     });

            //                 }
            //                 elseif ($answerr->getValue() == 'structs') {
            //                     $ar = [];

            //                     foreach (keyboard as $key) {
            //                         array_push($ar,Button::create($key)->value($key));
            //                     }
            //                     $questionn = Question::create('Керакли тузилмани танланг!')
            //                         ->addButtons($ar);
            //                     $this->ask($questionn,function ($answer) {
            //                         if ($answer->isInteractiveMessageReply()) {
            //                             $questionn = Question::create('Сизда ушбу йўналишга оид қандайдир маълумот (видео/аудио/фото/в.х.) бўлса, илова қилган ҳолда бизга юборишингиз мумкин!')->addButton(Button::create('')->value('fd'));
            //                             $this->ask($questionn,function ($answer){
            //                                 $this->say('✅Юборган хабарингиз белгиланган тартибда кўриб чиқилади. Маълумот учун рахмат!');
            //                                 $this->say('✅boshlashj uchun /start ni yuboring');
            //                             });
            //                         }else {
            //                             $this->repeat();
            //                         }


            //                     });
            //                 }
            //             }else {
            //                 $this->repeat();
            //             }

            //         });
            //     }
            //     elseif ($answer->getValue() == 'ru') {

            //         $this->say(msgRu);
            //         $questionn = Question::create('Выберите раздел!')
            //             ->addButtons([
            //                 Button::create('Провинции')->value('vi'),
            //                 Button::create('Структуры')->value('tu'),
            //             ]);
            //         $this->ask($questionn,function ($answerr) {
            //             if($answerr->isInteractiveMessageReply()) {
            //                 if($answerr->getValue() == 'vi') {
            //                     $ar = [];

            //                     foreach (keyboardRu as $key) {
            //                         array_push($ar,Button::create($key)->value($key));
            //                     }
            //                     $questionn = Question::create('Выберите желаемый регион!')
            //                         ->addButtons($ar);
            //                     $this->ask($questionn,function ($answerr) {
            //                         if ($answerr->isInteractiveMessageReply()) {
            //                             $ar = [];

            //                             foreach (keyboardddRu as $key) {
            //                                 array_push($ar,Button::create($key)->value($key));
            //                             }
            //                             $questionn = Question::create('Выберите желаемое направление!')
            //                                 ->addButtons($ar);

            //                             $this->ask($questionn,function ($answer){
            //                                 if ($answer->isInteractiveMessageReply()) {
            //                                     $questionn = Question::create('Если у вас есть какая-либо информация по этому направлению (видео / аудио / фото / и т. Д.), Вы можете прислать ее нам с приложением.!')

            //                                         ->addButtons([Button::create('')->value('fd')]);

            //                                     $this->ask($questionn,function ($answer){
            //                                         $this->say('✅Ваше сообщение будет рассмотрено в установленном порядке. Спасибо за информацию!');
            //                                         $this->say('✅Отправить /start, чтобы начать');
            //                                     });
            //                                 } else {
            //                                     $this->repeat();
            //                                 }

            //                             });
            //                         } else {
            //                             $this->repeat();
            //                         }

            //                     });

            //                 }
            //                 elseif ($answerr->getValue() == 'tu') {

            //                     $ar = [];

            //                     foreach (keyboarddRu as $key) {
            //                         array_push($ar,Button::create($key)->value($key));
            //                     }
            //                     $questionn = Question::create('Выберите желаемую структуру!')
            //                         ->addButtons($ar);
            //                     $this->ask($questionn,function ($answer) {
            //                         if ($answer->isInteractiveMessageReply()) {
            //                             $questionn = Question::create('Если у вас есть какая-либо информация по этому направлению (видео / аудио / фото / и т. Д.), Вы можете прислать ее нам с приложением!')->addButton(Button::create('')->value('fd'));
            //                             $this->ask($questionn,function ($answer){
            //                                 $this->say('✅Ваше сообщение будет рассмотрено в установленном порядке. Спасибо за информацию!. ');
            //                                 $this->say('✅Отправить /start, чтобы начать');
            //                             });
            //                         }else {
            //                             $this->repeat();
            //                         }

            //                     });
            //                 }
            //             }else {
            //                 $this->repeat();
            //             }

            //         });

            //     }
            // }else {
            //     $this->repeat();
            // }


        // });
    }
    public function askUser(){

        $this->ask('Salom', function(Answer $answer){
                $this->say('Your name is a', $answer->getValue());

            }
        );
    }
}
