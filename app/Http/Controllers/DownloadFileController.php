<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DbFile;
use Storage;
use DB;

class DownloadFileController extends Controller
{

    public function downloadView(){
        $user=\Illuminate\Support\Facades\Auth::id();
        $userFile = DbFile::where('user_id', $user)->get();
        return view('MyFiles',compact('userFile'));
    }
    public function download($id){
        $user = DbFile::where('id',$id)->first();
        $filePath = $user->FilePath;

        return redirect(Storage::disk('s3')->temporaryUrl(
            $filePath,
            now()->addHour(),
            ['ResponseContentDisposition' => 'attachment']
        ));



    }
}
