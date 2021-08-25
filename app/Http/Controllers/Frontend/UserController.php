<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    
     
    public function updateProfile(Request $request){
        $user = Auth::user() ;
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'phone' => ['required', 'digits:11', 'unique:users,phone,'.$user->id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
        ]);

        if (!$validator->fails()) {
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->city_id = $request->city_id;
            $user->save();
            return response()->json([
                'status' => "OK",
                'message' => 'updated successfully',
                'user' => $user ,
            ]);
            
        }else{
            return response()->json([
                'status' => 'FAILD',
                'errors' => $validator->errors()->all(),
            ]);
        }
    }



}
