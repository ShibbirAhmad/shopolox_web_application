<?php

namespace App\Models;

use Exception;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];





    public static function sendOtpCode($number,$code){
            
            $contacts = $number ;
            $message = 'Welcome to shopolox.com Your one time pin (OTP) is: '.$code.'. which will expire within 5 minutes. For help:01635 172218';  
            return self::messageApi($contacts,$message) ;

        }




   public static function messageApi($contacts,$message){

            $url = "http://portal.metrotel.com.bd/smsapi";
            $data = [
            "api_key" => "C2001097615179727f7c17.49388746",
            "type" => "text",
            "contacts" => $contacts,
            "senderid" => "8809612441890",
            "msg" => $message,
            ];
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($ch);
            curl_close($ch);
            return $response;

       
   }




}
