<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DPostCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'd_sub_category_id',
        'post_title',
        'post_detail', // Make sure "post_detail" is included here
        'post_photo',
        'visitors',
        'author_id',
        'admin_id',
  


    ];
public function rSubCategory(){
    return $this->belongsTo(DSubCategory::class,'d_sub_category_id'); // 1 sub category belongs to one category.
}

}
