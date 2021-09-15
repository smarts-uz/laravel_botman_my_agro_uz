<?php
use App\Http\Controllers\BotManController;
use App\Conversations\ButtonConversation;
use App\Conversations\RealConversation;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Messages\Attachments\Contact;
DriverManager::loadDriver(TelegramDriver::class);
$botman = BotManFactory::create($config);

$botman = resolve('botman');

$botman->hears('/start', function ($bot) {
    $bot->say("salom");
    // $bot->startConversation(new RealConversation());
});
