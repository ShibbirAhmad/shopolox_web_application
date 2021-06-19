<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    public  function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
     public function sub_sub_categories()
    {
        return $this->hasMany(SubSubCategory::class,'sub_category_id')->where('status',1);

    }
      public function products()
    {
        return $this->hasMany(Product::class,'sub_category_id')->where('status',1);

    }

    
}
