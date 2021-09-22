<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Appeal;
use TCG\Voyager\Http\Controllers\VoyagerController;
use App\Models\Appeal;

class AppealsController extends VoyagerController
{
    public function index(){
        $appeals = Appeal::orderBy('created_at', 'DESC');
        return view('appeal.appeals')->with('appeals', $appeals);
    }
}
