<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appeal;
use App\Models\Conversation;
use App\Models\Region;
use App\Models\Routes;
use App\Models\User;

class ConversationController extends Controller
{
    public function index(Appeal $appeal){
        $conversations = Conversation::where('appeal_id', $appeal->id)->get()->sortBy('created_at');
        $user = User::where('id', $appeal->user_id)->first()->name;
        $region = Region::where('id', $appeal->region)->first()->ru;
        $route = Routes::where('id', $appeal->route)->first()->ru;

        // $created_at = Region::where('id', $appeal->region)->first()->ru;

        return view('appeal.chat', compact('conversations', 'appeal', 'user', 'region', 'route'));
    }
    public function send($appeal, Request $request){

        $con = new Conversation();
        $con->user_id = $request->user()->id;
        $con->text = $request->text;
        $con->appeal_id = $appeal;
        $request->user()->role == 'user' ? $con->is_answer = 0 : $con->is_answer = 1;
        $con->save();
        $appeal = Appeal::where('id', $appeal)->first();
        $conversations = Conversation::where('appeal_id', $appeal->id)->get()->sortBy('created_at');

        $user = User::where('id', $appeal->user_id)->first()->name;
        $region = Region::where('id', $appeal->region)->first()->ru;
        $route = Routes::where('id', $appeal->route)->first()->ru;
        return view('appeal.chat', compact('appeal', 'conversations', 'region', 'route', 'user'));
    }
    public function close($appeal){
        if(Appeal::where('id', $appeal)->update(["is_closed" => 1])){
            return redirect()->back()->with('success', 'Closed');
        } return redirect()->back()->with('warning', 'something went wrong!');
    }
}
