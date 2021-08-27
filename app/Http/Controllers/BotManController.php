<?php
namespace App\Http\Controllers;

use App\Services\Notify\Notify;
use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;
use App\Conversations\ButtonConversation;
class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {

        $botman = app('botman');

        // $botman->hears('{message}', function($botman, $message) {

        //     if ($message == 'hi') {
        //         $this->askName($botman);
        //     }else{
        //         $notifier = new Notify();
        //         $notifier->notify($message);
        //         $botman->reply("write 'hi' for testing...");
        //     }

        // });
        $botman->hears('/start', function ($bot) {
            $bot->startConversation(new ButtonConversation());
        });
        $botman->listen();
    }

    /**
     * Place your BotMan logic here.
     */
    public function askName($botman)
    {
        $botman->ask('Hello! What is your Name?', function(Answer $answer) {

            $name = $answer->getText();

            $this->say('Nice to meet you '.$name);
        });
    }
}
