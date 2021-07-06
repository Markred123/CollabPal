<?php

namespace App\Http\Controllers;

use App\Models\DbFile;
use App\Models\Folder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Group;

class GroupController extends Controller
{
    //
    public function groupView(){
        $user=Auth::user();
        return view('MyGroups',compact('user'));
//        foreach($user->groups as $group){
//            $groupName=$group->name;
//            echo $groupName;
//        }

    }
    public function groupCreate(Request $groupFormData){
        $groupName=$groupFormData->name;
        $users = Auth::user();
        $groupOwner = Auth::id();
        $group = new Group (['name' => $groupName,'GroupOwner'=>$groupOwner]);
        $users->groups()->save($group);
        return back();

    }
}
