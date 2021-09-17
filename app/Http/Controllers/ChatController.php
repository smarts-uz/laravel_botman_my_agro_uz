<?php
namespace App\Http\Controllers;

use App\Services\Notify\Notify;
use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;
use App\Conversations\ButtonConversation;
use App\Conversations\RealConversation;


class ChatController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function app()
    {
        return view('chat/chat');
    }


}
