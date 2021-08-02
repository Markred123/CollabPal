<?php
/*
 * 15/05/2021
 * @author Mark Redmond x16355811
 */

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\DbFile;
use Storage;
use DB;
use Auth;
use App\Models\User;
use App\Models\Shared;
//Even though this is named the DownloadFileController, it handles downloading, deletion and sharing of files!
class DownloadFileController extends Controller
{
// This function displays the view MyFiles, which displays the files uploaded by a user based on the folder they click
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
            return back()->withErrors($exception->getMessage())->withInput();
        }
    }

    //This function allows the users to download their selected file from Amazon S3
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
    //This function allows users to delete their files, it deletes it from the database and Amazon S3. It also ensures the logged in user has permisison to access
    public function delete($id){
        $user = DbFile::where('id',$id)->first();
        $filePath = $user->FilePath;
    //User verification system: Takes the users ID by matching it with the file ID in the database and compares it to the currently authenticated user
        $userVerify4=$user->user_id;
        //if statement checks if user is verified
        if(Auth::id()==$userVerify4) {
            DbFile::where('id', $id)->delete();
            Storage::disk('s3')->delete($filePath);
            Shared::where('FilePath',$filePath)->delete();
            return redirect('fileFolder');
        }
        else{
            return redirect('welcome');
        }

    }

    //This function allows the user to share a file to a person of their choice
    public function share(Request $recipient){

        $id = $recipient->id;
        $recipientId=$recipient->recipient;
        $shareFile = DbFile::where('id',$id)->first();
        $filePath = $shareFile->FilePath;
        $oFileName = $shareFile->originalFileName;

        //User verification system: Takes the users ID by matching it with the file ID in the database and compares it to the currently authenticated user
        $userVerify=$shareFile->user_id;
        $finalRecipient = User::where('email',$recipientId)->first();
        $recipientFinalId = $finalRecipient->id;

        if(Auth::id()==$userVerify) {
            $shared = new Shared (['FilePath' => "$filePath", 'originalFileName'=>"$oFileName",'recipient_id'=>"$recipientFinalId"]);
            $shared->save();
            return redirect('fileFolder');
        }
        else{
            return redirect('welcome');
        }

    }

    //this function allows the user to share a file by link
    public function shareByLink($id){
        $user = DbFile::where('id',$id)->first();
        $filePath = $user->FilePath;
        $url = Storage::disk('s3')->temporaryUrl(
            $filePath,
            now()->addHour(),
            ['ResponseContentDisposition' => 'attachment']);
        return back()->with('success',"Here is your link to share your file $url");
    }
}
