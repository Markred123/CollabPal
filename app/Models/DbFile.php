<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DbFile extends Model
{
    use HasFactory;
    protected $fillable=[
        'FileName',
        'FilePath',
        'originalFileName',
        'FileFolder',
        'folder_id',

    ];

    public function dbfiles(){
        return $this->hasMany('App\Models\DbFile');
    }
}
