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
        'OrignalFileName'

    ];
}
