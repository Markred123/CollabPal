<?php

namespace App\Http\Controllers;

use App\Models\DbFile;
use Illuminate\Http\Request;
use App\Models\Folder;
use Illuminate\Support\Facades\Auth;

class FileFolderController extends Controller
{
    public function fileFolderView(){
        $user=\Illuminate\Support\Facades\Auth::id();
        $userFolder = Folder::where('user_id', $user)->get();
        return view('FileFolders',compact('userFolder'));
    }

    public function folderDelete($id){
        Folder::where('id',$id)->delete();
        return back();

    }
    public function folderCreate(Request $folderFormData){
        $folderName=$folderFormData->folderName;
        $users = Auth::user();
        $dbFile = new Folder (['FolderName' => $folderName]);
        $users->folders()->save($dbFile);
        return back();
    }

}
