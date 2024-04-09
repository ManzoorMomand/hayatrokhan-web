<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class team extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'post_title',
        'post_detail', // Make sure "post_detail" is included here
        'post_photo',
        'visitors',
        'author_id',
        'admin_id',
  


    ];
}
