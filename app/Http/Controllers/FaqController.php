<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\faq;

class FaqController extends Controller
{ public function index(){
    return faq::all();
}
}
