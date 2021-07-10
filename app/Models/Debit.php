<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debit extends Model
{
    use HasFactory;

    public function admin(){
        return $this->belongsTo(User::class,'insert_admin_id');
    }

   public function balance(){
         return $this->belongsTo(Balance::class,'balance_id');
    }

}
