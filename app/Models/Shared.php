<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shared extends Model
{
    use HasFactory;
    protected $fillable=[
        'FileName',
        'FilePath',
        'originalFileName',
        'recipient_id',
    ];
}
