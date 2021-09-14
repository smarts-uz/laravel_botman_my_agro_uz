<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appeal;
use App\Models\Conversation;
class ConversationController extends Controller
{
    public function index(Appeal $appeal){
        $conversations = Conversation::where('appeal_id', $appeal->id)->get()->sortBy('created_at');
        return view('appeal.chat', compact('conversations', 'appeal'));
    }
    public function send(Request $request, Appeal $appeal){
        dd($appeal);
        return view('appeal.chat');
    }
    public function close(){

    }
}
