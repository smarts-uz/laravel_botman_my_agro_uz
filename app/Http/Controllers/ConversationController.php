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
    public function send($appeal, Request $request){
        $con = new Conversation();
        $con->user_id = $request->user()->id;
        $con->text = $request->text;
        $con->appeal_id = $appeal;
        $request->user()->role == 'user' ? $con->is_answer = 0 : $con->is_answer = 1;
        $con->is_closed = 0;
        $con->save();
        $appeal = Appeal::where('id', $appeal)->first();
        $conversations = Conversation::where('appeal_id', $appeal->id)->get()->sortBy('created_at');
        return view('appeal.chat', compact('appeal', 'conversations'));
    }
    public function close(){

    }
}
