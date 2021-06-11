<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubCategory extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public  function sub_category(){
        return $this->belongsTo(SubCategory::class,'subcategory_id');
    }

      public function products()
    {
        return $this->hasMany(Product::class,'sub_sub_category_id')->where('status',1);

    }


}
