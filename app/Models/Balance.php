<?php

namespace App\Models;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{


        public function  today_credit_balance(){

             return $this->hasMany("App\Models\Credit","balance_id")->wheredate('created_at', '>=', Carbon::today()->startOfDay())
                                        ->wheredate('created_at', '<=', Carbon::today()->endOfDay()) ;
         }



        public function  total_credit_balance(){

               return $this->hasMany("App\Models\Credit","balance_id")  ;

         }


        public function  today_debit_balance(){

             return $this->hasMany("App\Models\Debit","balance_id")->wheredate('created_at', '>=', Carbon::today()->startOfDay())
                                        ->wheredate('created_at', '<=', Carbon::today()->endOfDay()) ;

         }



        public function  total_debit_balance(){

             return $this->hasMany("App\Models\Debit","balance_id") ;

         }





}
