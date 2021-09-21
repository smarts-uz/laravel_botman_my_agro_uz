<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
//use App\Models\File;

class FileUpload extends Controller
{
    public function createForm(){
        return view('welcome');
    }

    public function fileUpload(Request $req){
//        dd($req->file);
        $req->validate([
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf,jpeg,jpg,png,svg|max:2048'
        ]);

//        $fileModel = new File;

        if($req->file()) {
            $fileName = time().'_'.$req->file->getClientOriginalName();
            $filePath = $req->file('file')->store('uploadFolder',  ['disk' => 'public']);
//            dd($fileName);
//            $fileModel->name = time().'_'.$req->file->getClientOriginalName();
//            $fileModel->file_path = '/storage/' . $filePath;
//            $fileModel->save();
//
            return back()
                ->with('success','File has been uploaded.')
                ->with('file', $fileName);
        }
    }

}
