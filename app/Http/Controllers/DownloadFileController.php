<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DbFile;
use Storage;
use DB;
use Auth;

class DownloadFileController extends Controller
{

    public function downloadView($folderid){
        try {
            $userFile = DbFile::where('folder_id', $folderid)->get();
            $userVerify2 = DbFile::where('folder_id', $folderid)->first();
            if($userVerify2){
                $userVerify3 = $userVerify2->user_id;
                if (Auth::id() == $userVerify3) {
                    return view('MyFiles', compact('userFile'));
                } else {
                    return redirect('welcome');
                }
            }
            else{
                return back()->with('success', "This folder doesn't have any files yet!");
            }
        }
        catch(Exception $exception){
            return back()->withError($exception->getMessage())->withInput();
        }
    }
    public function download($id){
        $user = DbFile::where('id',$id)->first();
        $filePath = $user->FilePath;
        $userVerify5 = $user->user_id;
        if(Auth::id()==$userVerify5) {
            return redirect(Storage::disk('s3')->temporaryUrl(
                $filePath,
                now()->addHour(),
                ['ResponseContentDisposition' => 'attachment']
            ));
        }
        else{
            return redirect('welcome');
        }

    }
    public function delete($id){
        $user = DbFile::where('id',$id)->first();
        $filePath = $user->FilePath;
        $userVerify4=$user->user_id;
        if(Auth::id()==$userVerify4) {
            DbFile::where('id', $id)->delete();
            Storage::disk('s3')->delete($filePath);
            return redirect('fileFolder');
        }
        else{
            return redirect('welcome');
        }

    }
}
