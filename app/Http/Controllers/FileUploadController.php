<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use Illuminate\Support\Facades\Auth;

class FileUploadController extends Controller
{

    public function fileUpload()
    {
        return view('FileUpload');
    }

    public function update(Request $request)
    {
        $id = Auth::id();
        $file = $request->file('file');
            $fileName=time().$file->getClientOriginalName();
            $filePath = "files/$id/" . $fileName;
            Storage::disk('s3')->put($filePath, file_get_contents($file));
            return back()->with('success','You have successfully upload image.');
    }
}
