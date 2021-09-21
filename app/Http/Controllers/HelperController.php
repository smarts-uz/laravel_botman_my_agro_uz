<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Voyager;
class HelperController extends Controller
{
    public function getSetting(){
        if (file_exists(asset('/js/botmanJS.php'))) {
            require asset('/js/botmanJS.php');
        }
    }
}
