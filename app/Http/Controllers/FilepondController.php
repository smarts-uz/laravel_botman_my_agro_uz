<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilepondController extends Controller
{

    public function chat()
    {

    }

    public function upload(Request $request)
    {

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();

            $folder = $_SERVER['DOCUMENT_ROOT'] . '/upload/';

            $file->storeAs($folder, $filename);

            return response()->json([
                "success" => true,
                "message" => "File successfully uploaded",
                "file" => $file
            ]);
        }
        return response()->json([
            "success" => false,
            "message" => "File unsuccessfully uploaded",
        ]);

    }


    public function fileUpload(Request $req)
    {
        /*  $req->validate([
              'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048'
          ]);*/

        if ($req->file()) {
            $fileName = time() . '_' . $req->file->getClientOriginalName();
            $filePath = $req->file('file')
                ->storeAs('uploads', $fileName, 'public');

            $fileModelname = time() . '_' . $req->file->getClientOriginalName();
            $fileModelfile_path = '/storage/' . $filePath;

            return response()->json([
                "success" => true,
                "message" => "File successfully uploaded",
                "file" => $fileName
            ]);
        }

        return response()->json([
            "success" => false,
            "message" => "File unsuccessfully uploaded",
        ]);

    }
}
