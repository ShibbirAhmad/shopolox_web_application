<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class CustomersExport implements FromCollection  , WithHeadings , ShouldAutoSize 
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $collections = Customer::all();

        foreach($collections as  $item){
            unset($item->id,$item->customer_type , $item->city_id, $item->status,$item->created_at,$item->updated_at );
             $collections[]=$item;
         }

        return $collections;

    }
     
    public function headings():  array
    {
        return self::columnWidths( 'Name','Phone','Address');
    }
 

    public static function  columnWidths($name, $phone, $address): array {

         return [

                 $name, $phone, $address
         ];
    }




}