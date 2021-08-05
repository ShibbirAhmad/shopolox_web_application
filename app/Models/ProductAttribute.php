<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use HasFactory;


    public function attributes(){
        return $this->belongsTo(Attribute::class,'attribute_id');
    }


}
