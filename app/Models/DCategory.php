<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DCategory extends Model
{
    use HasFactory;

    
    public function rSubCategory()
    {
        return $this->hasMany(DSubCategory::class)->where('show_on_menu','Show')->orderBy('sub_category_order','asc');
    }
}
