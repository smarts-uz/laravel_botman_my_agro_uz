<?php
namespace App\Http\Controllers;

use App\Services\Notify\Notify;
use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;
use App\Conversations\ButtonConversation;
use App\Conversations\RealConversation;


class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {

        $botman = app('botman');

        $botman->hears('(.*)', function ($bot) {
            $bot->startConversation(new RealConversation());
           
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
