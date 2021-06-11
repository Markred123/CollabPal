<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DbFile;
use Storage;
use DB;

class DownloadFileController extends Controller
{

    public function downloadView($folderid){

        $userFile = DbFile::where('folder_id', $folderid)->get();
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
    public function delete($id){
        $user = DbFile::where('id',$id)->first();
        $filePath = $user->FilePath;
        DbFile::where('id',$id)->delete();
        Storage::disk('s3')->delete($filePath);
        return back();

    }
}
