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
use Illuminate\Support\Facades\App;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ConversationController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.user');

        // return back();
    }
    public function index(){
        if(Auth::user()->hasRole('admin')){
            return view('voyager::index');
        }
        return redirect()->route('voyager.appeals.index');
    }
    public function toExpert($appeal)
    {

        $appealObject = Appeal::where('id', $appeal);
        $appealData = $appealObject->first();
        $route = Routes::where('id', $appealData->route)->first();
        $files = json_decode($appealData->images);

        $details = [
            'title' => $appealData->title,
            'body' => $appealData->text,
            'files' => $files
        ];
        if(Mail::to(Auth::user()->email)->send(new SendMail($details))){
            Alert::success('Send', 'Appeal sent to expert');
        };
        return redirect()->route('voyager.appeals.index');
    }
    public function showChat(Appeal $appeal)
    {

        if( $appeal->user_id == Auth::user()->id && Auth::user()->hasRole("user")){
            return back();
        }

        $finishTime = Carbon::now();
        $conversations = Conversation::where('appeal_id', $appeal->id);
        $con = $conversations->orderBy("created_at", 'DESC');

        if (($con->first() !== null)) {
            $starttime = $con->first()->created_at;
        } else $starttime = new Carbon(($starttime = $appeal->created_at));
        // $carbon = new Carbon(new \DateTime($appeal->created_at), new \DateTimeZone('Asia/Tashkent')); // equivalent to previous instance
        // You can create Carbon or CarbonImmutable instance from:
        $totalDuration = $finishTime->diffInHours($starttime);

        $conversations = Conversation::where('appeal_id', $appeal->id)->orderBy('created_at', 'ASC')->get();
        // dd($totalDuration);
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
            $appeals = Appeal::where('user_id', Auth::user()->id)->orderBy('created_at', 'ASC');
        } else {
            $appeals = Appeal::orderBy('id', 'ASC');
        }
        $appeals = $appeals->get();
        return view('appeal.appeals')->with('appeals', $appeals);
    }


    public function rating($appeal, Request $request)
    {
        $finishTime = now();
        $appealData = User::where('id', Auth::user()->id);
        $conversationObject = Conversation::orderBy("created_at", 'DESC');
        if (($conversationObject->first() !== null)) {
            $starttime = $conversationObject->first()->created_at;
        } else $starttime = $appealData->first()->created_at;

        $totalDuration = $finishTime->diffInHours($starttime);
        $rating = floatval((intval($request->rating) + intval($appealData->first()->rating)) / 2);
        $experts = DB::select('SELECT user_id FROM conversations WHERE appeal_id =277 AND user_id IN (SELECT id FROM users WHERE role_id != 2) ORDER BY created_at ASC LIMIT 1');
        // if ($totalDuration == 48) {
        //     // Alert::error('impossible close', 'You couldn`t close conversation!!!');
        //     redirect()->route('voyager.appeals.index')->with('warning', 'something went wrong!');
        // } else {
        
        foreach ($experts as $expert){
            $expertUser = User::where('id', $expert->user_id)->update(['rating' => $request->rating]);
        }


        if (Appeal::where('id', $appeal)->update(["status" => 3])) {
            Alert::success('Closed', 'Conversation closed succesfully!');
            return redirect()->route('voyager.appeals.index')->with('success', 'Closed');
        } else {
            Alert::error('impossible close', 'You couldn`t close conversation!!!');
            return redirect()->route('voyager.appeals.index')->with('warning', 'something went wrong!');
        }
    }
    // }
    public function setLang(Request $request)
    {

        $user = User::where('id', Auth::user()->id)->update(["settings" => ["locale" => $request->lang]]);
        $x = App::setLocale($request->lang);

        return back();
    }
}
