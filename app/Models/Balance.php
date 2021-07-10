<?php

namespace App\Models;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{


        public function  today_credit_balance(){

             return $this->hasMany("App\Models\Credit","balance_id")->where('date', '>=', Carbon::today()->startOfDay())
                                        ->where('date', '<=', Carbon::today()->endOfDay()) ;
         }



        public function  total_credit_balance(){

               return $this->hasMany("App\Models\Credit","balance_id")  ;

         }


        public function  today_debit_balance(){

             return $this->hasMany("App\Models\Debit","balance_id")->where('date', '>=', Carbon::today()->startOfDay())
                                        ->where('date', '<=', Carbon::today()->endOfDay()) ;

         }



        public function  total_debit_balance(){

             return $this->hasMany("App\Models\Debit","balance_id") ;

         }





}
