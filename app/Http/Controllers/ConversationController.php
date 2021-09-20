<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appeal;
use App\Models\Conversation;
use App\Models\Region;
use App\Models\Routes;
use Auth;
use App\Models\User;
use TCG\Voyager\Http\Controllers\VoyagerController;
class ConversationController extends VoyagerController
{
    public function showChat(Appeal $appeal){

        $conversations = Conversation::where('appeal_id', $appeal->id)->get()->sortBy('created_at');
        $user = (User::where('id', $appeal->user_id)->first()) !== null ? User::where('id', $appeal->user_id)->first()->name : 'Deleted user';
        $region = Region::where('id', $appeal->region)->first()->ru;
        $route = Routes::where('id', $appeal->route)->first()->ru;

        return view('appeal.chat', compact('conversations', 'appeal', 'user', 'region', 'route'));
    }
    public function send($appeal, Request $request){

        $con = new Conversation();
        $con->user_id = $request->user()->id;
        $con->text = $request->text;
        $con->appeal_id = $appeal;
        $request->user()->role == 'user' ? $con->is_answer = 0 : $con->is_answer = 1;
        $con->save();
        $conversations = Conversation::where('appeal_id', $appeal)->get()->sortBy('created_at');

        $appeal = Appeal::where('id', $appeal);

        Auth::user()->hasrole('user') ? $appeal->update(["status" => 1]) : $appeal->update(["status" => 2]);

        $user = User::where('id', $appeal->user_id)->first()->name;
        $region = Region::where('id', $appeal->region)->first()->ru;
        $route = Routes::where('id', $appeal->route)->first()->ru;

        return redirect()->route('/appeals')->with(['appeal' => $appeal, 'conversations' => $conversations, 'region' =>  $region, 'route' => $route, 'user' => $user]);
    }
    public function close($appeal){

        if(Appeal::where('id', $appeal)->update(["status" => 3])){
            return back()->with('success', 'Closed');
        } return back()->with('warning', 'something went wrong!');
    }
    public function showAppeal(){
        $appeals = Appeal::orderBy('created_at', 'DESC')->paginate('10');
        return view('appeal.appeals')->with('appeals', $appeals);
    }

    public function rating($appeal, Request $request) {
        $appealData =Appeal::where('id', $appeal);
        $rating = floatval((intval($request->rating) + intval($appealData->first()->rating))/2);

        User::where('id', $appeal)->update(['rating'=>$rating]);

        if(Appeal::where('id', $appeal)->update(["status" => 3])){
            return redirect()->route('voyager.appeals.index')->with('success', 'Closed');
        } return redirect()->route('voyager.appeals.index')->with('warning', 'something went wrong!');

    }
}
