<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Services\SmsService\SmsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use ReflectionClass;
use TCG\Voyager\Database\Schema\SchemaManager;
use TCG\Voyager\Database\Schema\Table;
use TCG\Voyager\Database\Types\Type;
use TCG\Voyager\Events\BreadAdded;
use TCG\Voyager\Events\BreadDeleted;
use TCG\Voyager\Events\BreadUpdated;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Http\Controllers\VoyagerBreadController;
use App\Models\Appeal;
use App\Models\Routes;
use App\Models\User;
class AnswerController extends VoyagerBreadController

{
    public function answer($appeal){
        return view('appeal.answerappeal', compact('appeal'));
    }
    public function redirect($appeal){
        return view('appeal.responsible', compact('appeal'));
    }
    public function update(Request $request, $appeal){
        // dd($request);
        Appeal::where('id', $appeal)->update(['to_expert' => 1]);
        return redirect()->route('voyager.appeals.index');
    }
    public function toExpert($appeal){

        $appealObject = Appeal::where('id', $appeal);
        $appealData = $appealObject->first();
        $route = Routes::where('id', $appealData->route)->first();
        $expert = User::where('id', $route->responsible)->first();
        // dd(User::where('id', $route->responsible)->first());

        $appealObject->update(['to_expert' => 1]);
        $details = [
            'title' => $appealData->title,
            'body' => $appealData->text
        ];
        Mail::to($expert->email)->send(new SendMail($details));
        return redirect()->route('voyager.appeals.index');
    }
    public function updateAnswer(Request $request, $appeal){
        // dd($request);
        Appeal::where('id', $appeal)->update(['answer_text' => $request->answer_text, 'responsible' => $request->user()->id]);
        return redirect()->route('voyager.appeals.index');
    }
    public function sendAnswer($appeal){
        $appealObj = Appeal::where('id', $appeal)->first();
        $author = $appealObj->user_id;
        $user = User::where('id', $author)->first();
        $text = "sizning murojaatingizga javob berildi, javobni my.agro.uz/admin saytidan appeals bo'limida ko'rishingiz mumkin";
         $smsSender = new SmsService();
            $smsSender->send($user->phone, $text);
            $details = [
                'title' => 'your answer',
                'body' => $text
            ];
            Mail::to($user->email)->send(new SendMail($details));
        Appeal::where('id', $appeal)->update(['to_User' => '1']);
        return redirect()->route('voyager.appeals.index');
    }
}
