<?php
/*
 * 15/05/2021
 * @author Mark Redmond x16355811
 */

namespace App\Http\Controllers;

use App\Models\DbFile;
use Illuminate\Http\Request;
use App\Models\Folder;
use Illuminate\Support\Facades\Auth;

class FileFolderController extends Controller
{
    //This function displays the folder view
    public function fileFolderView(){
        $user=\Illuminate\Support\Facades\Auth::id();
        $userFolder = Folder::where('user_id', $user)->get();
            return view('FileFolders',compact('userFolder'));


    }
    //this function allows users to delete folders
    public function folderDelete($id){
        Folder::where('id',$id)->delete();
        DbFile::where('folder_id',$id)->delete();
        return back();

    }
    //this function allows users to create folders
    public function folderCreate(Request $folderFormData){
        $folderName=$folderFormData->folderName;
        $users = Auth::user();
        $dbFile = new Folder (['FolderName' => $folderName]);
        $users->folders()->save($dbFile);
        return back();
    }

}
