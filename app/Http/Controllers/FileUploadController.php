<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    public function showUploadForm()
    {
        return view('upload-form');
    }

    public function uploadFile(Request $request)
    {
        // Validate the request
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png,pdf,docx|max:2048',
        ]);

        // Handle the file upload
        if ($request->file('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = Storage::disk('s3')->putFileAs('uploads',$file, $filename);

            return back()
                ->with('success', 'File has been uploaded successfully to S3.')
                ->with('file', $filename);
        }

        return back()->withErrors('Please upload a valid file.');
    }
}
