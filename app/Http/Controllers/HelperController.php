<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use TCG\Voyager\Voyager;
class HelperController extends Controller
{
    public function getSetting(){
        if (file_exists(asset('/js/botmanJS.php'))) {
            require asset('/js/botmanJS.php');
        }
    }
    public function getAll(){
        $text = '';
        $path = 'uploads/fayzulloevasadbek@gmail.com/';
        $files = Storage::allFiles($path);
        Storage::delete($files);

//        foreach ($files as $file){
//            ;
//            $text = $text . str_replace($path, '', $file) . '<br>';
//        }
//        return $text;
    }
}
