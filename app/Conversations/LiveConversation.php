<?php

namespace App\Conversations;

use App\Models\Appeal;
use BotMan\BotMan\Messages\Conversations\Conversation;
use Illuminate\Support\Facades\Auth;

class LiveConversation extends Conversation
{
    public $data = array();
    public function __construct($data)
    {
        $this->$data = $data;
    }
    public function run(){
        $this->ask("Yuboring", function($conversation){
            if ($conversation->getText() != "Tugat") {
                $appeal = new Appeal();
                $appeal->text = $conversation->getText();
                $appeal->user_id = Auth::user()->id;
                $appeal->region = $this->data["region"];
                $appeal->route = $this->data["route"];
                $appeal->type = $this->data["type"];
                $appeal->save();
            } else $this->repeat();
        });
    }
}
