<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;

class FileUploadController extends Controller
{

    public function fileUpload()
    {
        return view('FileUpload');
    }
    /**
     * Update the avatar for the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

            $file = $request->file('file');
            $imageName=time().$file->getClientOriginalName();
            $filePath = 'files/' . $imageName;
            Storage::disk('s3')->put($filePath, file_get_contents($file));
            return back()->with('success','You have successfully upload image.');
    }
}
