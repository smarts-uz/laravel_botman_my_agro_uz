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
        Appeal::where('id', $appeal)->update(['responsible' => $request->responsible]);
        return redirect()->route('voyager.appeals.index');
    }
}
