<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function uploadFile(Request $request)
    {

        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf,doc,docx,xls,xlsx|max:10240',
        ],[
            'file.required'=>'nugu 111',
            'file.mimes'=>'nugu 112',
        ]);

        $path = $request->file('file')->store('uploads');

        return response()->json([
            'message' => 'File uploaded successfully!',
            'file_path' => $path
        ]);
    }
}
