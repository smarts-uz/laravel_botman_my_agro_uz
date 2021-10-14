<?php

namespace App\Http\Controllers;

use App\Services\Notify\Notify;
use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;
use App\Conversations\ButtonConversation;
use App\Conversations\RealConversation;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;


class ChatController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function app()
    {

        $host = Arr::get($_SERVER, 'HTTP_REFERER');

        if (empty($host))
            $before = null;
        else
            switch ($host) {
                case Str::contains($host, 'agro.tested.uz'):
                case Str::contains($host, 'agro.uz'):
                    $before = 'https://my.agro.uz';
                    break;

                default:
                    $before = '';
            }

        return view('chat/chat', [
            'before' => $before
        ]);
    }


}
