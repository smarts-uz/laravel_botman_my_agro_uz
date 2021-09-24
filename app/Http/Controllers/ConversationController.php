<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appeal;
use App\Models\Conversation;
use App\Models\Region;
use App\Models\Routes;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use TCG\Voyager\Http\Controllers\VoyagerController;
use RealRashid\SweetAlert\Facades\Alert;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
class ConversationController extends VoyagerController
{
    public function __construct()
    {
        $this->middleware('auth');

        // return back();
    }
    public function toExpert($appeal){

        $appealObject = Appeal::where('id', $appeal);
        $appealData = $appealObject->first();
        $route = Routes::where('id', $appealData->route)->first();
        $files = json_decode($appealData->images);

        $details = [
            'title' => $appealData->title,
            'body' => $appealData->text,
            'files'=> $files
        ];
        Mail::to(Auth::user()->email)->send(new SendMail($details));
        return redirect()->route('voyager.appeals.index');
    }
    public function showChat(Appeal $appeal)
    {
        $finishTime = now();
        $appealData = Appeal::where('id', $appeal);
        // $conversationObject = Conversation::orderBy("created_at", 'DESC');
        $conversations = Conversation::where('appeal_id', $appeal->id);
        if (($conversations->first() !== null)) {
            $starttime = $appeal->created_at;
        } else $starttime = $appeal->created_at;

        $totalDuration = $finishTime->diffInHours($starttime);


        $conversations = Conversation::where('appeal_id', $appeal->id)->orderBy('created_at', 'ASC')->get();
        // dd($conversations);
        $user = (User::where('id', $appeal->user_id)->first()) !== null ? User::where('id', $appeal->user_id)->first()->name : 'Deleted user';
        $region = app()->getLocale() == "uz" ? Region::where('id', $appeal->region)->first()->uz : Region::where('id', $appeal->region)->first()->ru;
        $route = app()->getLocale() == "uz" ? Routes::where('id', $appeal->route)->first()->uz : Routes::where('id', $appeal->route)->first()->ru;

        return view('appeal.chat', compact('conversations', 'appeal', 'user', 'region', 'route', 'finishTime', 'totalDuration'));
    }
    public function send($appeal, Request $request)
    {

        $con = new Conversation();
        $con->user_id = $request->user()->id;
        $con->text = $request->text;
        $con->appeal_id = $appeal;
        $request->user()->role == 'user' ? $con->is_answer = 0 : $con->is_answer = 1;
        $con->save();
        $appeal = Appeal::where('id', $appeal)->first();
        Auth::user()->hasRole('user') ? $appeal->update(["status" => 1]) : $appeal->update(["status" => 2]);

        return redirect()->route('conversation.index', $appeal);
    }
    public function close($appeal)
    {

        if (Appeal::where('id', $appeal)->update(["status" => 3])) {
            return back()->with('success', 'Closed');
        }
        return back()->with('warning', 'something went wrong!');
    }
    public function showAppeal()
    {
        if (Auth::user()->hasRole('user')) {
            $appeals = Appeal::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC');
        } else {
            $appeals = Appeal::orderBy('created_at', 'DESC');
        }
        $appeals = $appeals->get();
        return view('appeal.appeals')->with('appeals', $appeals);

    }


    public function rating($appeal, Request $request)
    {
        $finishTime = now();
        $appealData = Appeal::where('id', $appeal);
        $conversationObject = Conversation::orderBy("created_at", 'DESC');
        if (($conversationObject->first() !== null)) {
            $starttime = $conversationObject->first()->created_at;
        } else $starttime = $appealData->first()->created_at;

        $totalDuration = $finishTime->diffInHours($starttime);
        $rating = floatval((intval($request->rating) + intval($appealData->first()->rating)) / 2);

        // if ($totalDuration == 48) {
        //     // Alert::error('impossible close', 'You couldn`t close conversation!!!');
        //     redirect()->route('voyager.appeals.index')->with('warning', 'something went wrong!');
        // } else {
            User::where('id', $appeal)->update(['rating' => $rating]);

            if (Appeal::where('id', $appeal)->update(["status" => 3])) {
                Alert::success('Closed', 'Conversation closed succesfully!');
                return redirect()->route('voyager.appeals.index')->with('success', 'Closed');
            } else {
                Alert::error('impossible close', 'You couldn`t close conversation!!!');
                return redirect()->route('voyager.appeals.index')->with('warning', 'something went wrong!');
            }
        // }
    }
    public function setLang($lang){
    User::where('id', Auth::user()->id)->update(['settings' => json_encode(['locale'=>app()->getLocale()])]);
return back();
    }

}
