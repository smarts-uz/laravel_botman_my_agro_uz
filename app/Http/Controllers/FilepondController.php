<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilepondController extends Controller
{
    public function upload(Request $request) {

        if($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $folder = uniqid().'-'.now()->timestamp;
            $file->storeAs($folder,$filename);

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
}
