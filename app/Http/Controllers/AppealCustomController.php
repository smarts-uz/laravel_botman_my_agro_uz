<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appeal;

class AppealCustomController extends Controller
{
    public function showAppeal(){
        $appeals = Appeal::orderBy('created_at', 'DESC');
        dd($appeals);
        return view('appeal.appeals')->with('appeals', $appeals);
    }
}
