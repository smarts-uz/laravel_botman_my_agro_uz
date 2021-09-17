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

        if ($req->file()) {
            $fileName = $req->file->getClientOriginalName();
            $filePath = $req->file('file')
                ->storeAs('uploads/' . $req->get('email'), $fileName, 'public');

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
