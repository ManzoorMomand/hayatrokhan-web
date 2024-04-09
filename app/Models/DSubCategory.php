<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DSubCategory extends Model
{
    use HasFactory;

    
    public function rCategory()
{
    return $this->belongsTo(DCategory::class, 'd_category_id');
}


    public function rPost()
    {
        return $this->hasMany(DPostCategory::class)->orderBy('id','desc');
    }
}
