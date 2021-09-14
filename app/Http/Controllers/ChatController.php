<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appeal;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index($chat) {
        $x = Appeal::where('id', $chat)->first();
        $x->messages = json_decode($x->messages);
        return view("chat",["chat"=>$chat,"messages"=>$x->messages,"id"=>Auth::user()->id]);
    }

    public function addd(Request $request) {
        $x = Appeal::where('id', $request->id)->first();
        if($x->messages == null) {
            $y = $x->update(["messages"=>[["user_id"=>Auth::user()->id,'messages'=>$request->msg]]]);
            return back();
        }else {
            $arr = [];
            $x->messages = json_decode($x->messages);
            foreach($x->messages as $msg) {
                array_push($arr,$msg);
            }
            $y = array_push($arr,['user_id'=>Auth::user()->id,'messages'=>$request->msg]);
            $x->update(["messages"=>$arr]);
            return back();
        }
    }
}
