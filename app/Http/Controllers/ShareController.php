<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DbFile;
use App\Models\Shared;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ShareController extends Controller
{

    //displays the view where the user can see files shared with them
    public function shareView(){
        $recipientId = Auth::user()->id;
        $userFile = Shared::where('recipient_id', $recipientId)->get();

        return view('shared', compact('userFile'));
    }
    //Allows the users to remove files shared with them. Takes in ID of the shared file from the view when the user clicks the 'delete' button.
    public function shareDelete($id){
        $userVerify = Shared::where('id', $id)->first();
        if($userVerify){
            $userVerify2= $userVerify->recipient_id;
            If(Auth::id()==$userVerify2){
                Shared::where('id', $id)->delete();
                return back();
            }
            else{
                return redirect('welcome');
            }

        }
        else {
            return back()->withErrors("Something has gone wrong!");
        }

    }

    public function shareDownload($id){
        $user = Shared::where('id',$id)->first();
        $filePath = $user->FilePath;
        $userVerify = Shared::where('id', $id)->first();
        if($userVerify){
            $userVerify2= $userVerify->recipient_id;

            if(Auth::id()==$userVerify2){
                return redirect(Storage::disk('s3')->temporaryUrl(
                    $filePath,
                    now()->addHour(),
                    ['ResponseContentDisposition' => 'attachment']
                ));

            }
            else {
                return redirect('welcome');
            }
        }
        else{

            return redirect('welcome');
        }



    }
}
