<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function product_images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function product_attribute()
    {
        return $this->hasOne(ProductAttribute::class, 'product_id');
    }

    public function product_variants()
    {
        return $this->hasMany(ProductVariant::class, 'product_id');
    }

    public  function supplier(){
        return $this->belongsTo(Supplier::class,'merchant_id');
    }

     public function purchase_items()
    {
        return $this->hasMany(PurchaseItem::class,'product_id');

    }
}
