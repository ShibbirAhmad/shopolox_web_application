<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    public function customer(){

        return  $this->belongsTo(Customer::class,'customer_id') ;
        
    }

    public function order_items(){

         return  $this->hasMany(OrderItem::class,'order_id') ;
      
  }




}
