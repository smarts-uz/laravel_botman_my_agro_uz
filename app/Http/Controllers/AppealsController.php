<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
<<<<<<< HEAD
=======
use App\Models\Appeal;
>>>>>>> f062c56cf533bdf3bc2431b7e8e4376a0d847df7
use TCG\Voyager\Http\Controllers\VoyagerController;

class AppealsController extends VoyagerController
{
    public function index(){
        $appeals = Appeal::orderBy('created_at', 'DESC');
        return view('appeal.appeals')->with('appeals', $appeals);
    }
}
