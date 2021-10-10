<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\DB;

class UsersExport implements FromCollection , WithHeadings , ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $collections = User::all();

        foreach($collections as  $item){
            unset($item->id,$item->city_id, $item->remember_token, $item->password,$item->email_verified_at,$item->updated_at,$item->created_at,$item->status);
             $item->mobile_no=$item->mobile_no;
             $collections[]=$item;
         }

        return $collections;

    }
     
    public function headings():  array
    {
        return self::columnWidths( 'Name','Phone','Email','Address');
    }
 

    public static function  columnWidths($name,$phone,$email,$address): array {

         return [

                 $name,$phone,$email, $address
         ];
    }



}