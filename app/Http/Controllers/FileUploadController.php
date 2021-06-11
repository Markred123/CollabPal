<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Models\DbFile;
use Exception;

class FileUploadController extends Controller
{
    // This function checks if the user is subscribed, if they are, returns the File Upload view, if not, they're redirected
    public function fileUpload(){
        $user=\Illuminate\Support\Facades\Auth::id();
        $userFolder = Folder::where('user_id', $user)->get();

        return view('FileUpload', compact('userFolder'));

    }
    //This function is for uploading to storage (s3) and writing the data to the database
    public function upload(Request $request): \Illuminate\Http\RedirectResponse
    {
        try {
            //gets user ID, uploads file based on user ID
            $id = Auth::id();
            $file = $request->file('file');
            $folder = $request->get('folders');
            $oFileName = $file->getClientOriginalName();
            $fileName = time() . $file->getClientOriginalName();
            $filePath = "files/$id/" . $fileName;
            Storage::disk('s3')->put($filePath, file_get_contents($file));

            //Gets user, uploads info to database based on user
            $user = Auth::user();

            $dbFile = new Dbfile (['FileName' => "$fileName", 'FilePath' => "$filePath", 'originalFileName'=>"$oFileName",'folder_id'=>"$folder"]);
            $user->dbfiles()->save($dbFile);
            return redirect()->intended('fileFolder')->with('success', "Uploaded Sucessfully");
        }
        catch(Exception $exception){
            return back()->withError($exception->getMessage())->withInput();


        }
    }
}
