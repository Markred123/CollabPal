<?php

namespace App\Http\Controllers;

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
    public function fileUpload()
    {
        $user=Auth::User();
        if($user->subscribed('Premium Collabpal')) {
            return view('FileUpload');
        }
        else{
            return redirect('userInfo');

        }
    }
    //This function is for uploading to storage (s3) and writing the data to the database
    public function upload(Request $request): \Illuminate\Http\RedirectResponse
    {
        try {
            //gets user ID, uploads file based on user ID
            $id = Auth::id();
            $file = $request->file('file');
            $oFileName = $file->getClientOriginalName();
            $fileName = time() . $file->getClientOriginalName();
            $filePath = "files/$id/" . $fileName;
            Storage::disk('s3')->put($filePath, file_get_contents($file));

            //Gets user, uploads info to database based on user
            $user = Auth::user();

            $dbFile = new Dbfile (['FileName' => "$fileName", 'FilePath' => "$filePath", 'originalFileName'=>"$oFileName"]);
            $user->dbfiles()->save($dbFile);
            return redirect()->intended('myFiles')->with('success', 'File Uploaded Successfully!');
        }
        catch(Exception $exception){
            return back()->withError($exception->getMessage())->withInput();


        }
    }
}
