<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Models\DbFile;

class FileUploadController extends Controller
{

    public function fileUpload()
    {
        return view('FileUpload');
    }

    public function update(Request $request): \Illuminate\Http\RedirectResponse
    {
        $id = Auth::id();
        $file = $request->file('file');
        $fileName=time().$file->getClientOriginalName();
        $filePath = "files/$id/" . $fileName;
        Storage::disk('s3')->put($filePath, file_get_contents($file));

        $user= Auth::user();

        $dbFile= new Dbfile (['FileName'=>"$fileName",'FilePath'=>"$filePath"]);
        $user->dbfiles()->save($dbFile);
        return back()->with('Success','File Uploaded.');
    }
}
