<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Customer;
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
            if($user->save()){
                $customer=Customer::where('phone',$user->phone)->first();
                 if($customer){
                    $customer->name=$request->name;
                    $customer->phone=$request->phone;
                    $customer->address=$request->address;
                    $customer->city_id=$request->city_id;
                    $customer->save();
                }
             }
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






    public function updatePassword(Request $request){

        $validator = Validator::make($request->all(),[
            'old_password' => 'required ',
            'new_password' => 'required',
        ]);
        
        if (!$validator->fails()) {
            $before_update_user=Auth::user();
            $user=User::where('phone',$before_update_user->phone)->first();
            $user_current_password=$user->password;
            if (Hash::check($request->old_password,$user_current_password)) {
                if($request->new_password==$request->old_password){
                    return response()->json([
                        "message" => "current password and new password can't be same ",
                    ]);
                }else{
                    $user->password=Hash::make($request->new_password);  
                        if ($user->save()) {
                            return response()->json([ "status" => "OK", "message" => "password changed successfully" ]);
                        }  
                }
            }else{
                return response()->json([
                    "message" => "current password is incorrect! ",
                ]);
            }    
        }else{
            return response()->json([
                'status' => 'FAILD',
                'errors' => $validator->errors()->all(),
            ]);
        }
    }








    public function resetCode(Request $request){
       

        $validatedData = $request->validate([
            'phone' => 'required|digits:11',
            ]);

          $user=User::where('phone',$request->phone)->first();
        if(empty($user)){
            return response()->json([
                'status'=>"ERROR",
                'message'=>"The mobile number does not match our records"
            ]);
       }else{
            $code=rand(000000,999999);
            DB::table('password_resets')->insert([
                'phone'=>$request->phone,
                'token'=>Hash::make($code)
            ]);
            User::SendUserPasswordResetCode($request->phone,$code);

            return response()->json([
                'status'=>"SUCCESS",
                'message'=>"Send verification code on your mobile"
            ]);
    }
}

public function codeVerify(Request $request, $phone){
    
     $validatedData = $request->validate([
     ]);

     $phone=DB::table('password_resets')->where('phone',$phone)->orderBy('id','DESC')->first();
     if(!empty($phone)){
        if (Hash::check($request->code, $phone->token)) {
           return response()->json([
                'status'=>"SUCCESS",
                'message'=>"Code Match"
            ]);
        }else{
             return response()->json([
                'status'=>"ERROR",
                'message'=>"Code Matching Error"
            ]);
        }
     }else{
          return response()->json([
                'status'=>"ERROR",
                'message'=>"Code Matching Error"
            ]);
     }

}

public function ResetPassword(Request $request,$phone){

    $user=User::where('phone',$request->phone)->first();
    if(!empty($user)){
        $user->password=Hash::make($request->password);
        if($user->save()){
            return response()->json([
                'status'=>"SUCCESS",
                'message'=>"Passwrod update successfully"
            ]);
        }else{
             return response()->json([
                'status'=>"ERROR",
                'message'=>"Error established"
            ]);
        }
    }
    else{
        return response()->json([
            'status'=>"ERROR",
            'message'=>"Error estblished"
        ]);
    }

}



  public function setNewPassword(Request $request){

    $validator = Validator::make($request->all(),[
        'new_password' => 'required ',
        'retype_password' => 'required',
    ]);
    
    if (!$validator->fails()) {
        if($request->new_password==$request->retype_password){
                $user=Auth::user();
                $user->password=Hash::make($request->new_password);
                $user->save();
                    return response()->json([
                    "success" => "OK",
                    "message" => "password setup successfully"
                    ]);

                }else{
                    return response()->json([
                        "success" => "FAIL", 
                        "message" => "password not matched"
                        ]);
                    }
        }else{
            return response()->json([
                'status' => 'FAILD',
                'errors' => $validator->errors()->all(),
            ]);

        }
        
        


    }
     






}
