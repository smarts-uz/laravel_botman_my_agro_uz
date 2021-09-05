<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        Appeal::where('id', $appeal)->update(['to_expert' => 1]);
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

        Appeal::where('id', $appeal)->update(['to_User' => '1']);
        return redirect()->route('voyager.appeals.index');
    }
}
