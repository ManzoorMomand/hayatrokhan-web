<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
        protected $fillable = [
            'sub_category_id',
            'post_title',
            'post_detail', // Make sure "post_detail" is included here
            'post_photo',
            'visitors',
            'author_id',
            'admin_id',
      


        ];
    public function rSubCategory(){
        return $this->belongsTo(SubCategory::class,'sub_category_id'); // 1 sub category belongs to one category.
    }

    
    
}
