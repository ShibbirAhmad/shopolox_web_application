<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\OtpVerification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function login(Request $request){

        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($validated)) {
            if (Auth::user()->role == 1) {
                return response()->json([
                    'status' => 'OK',
                    'message' => 'Authenticated successfully',
                ]);
            } elseif (Auth::user()->role == 2) {
                return redirect()->route('admin.home');

            } else {
                return redirect('/');

            }
        } else {
            return response()->json([
                'status' => 'FAILED',
                'message' => "Credential isn't mathing with our records",
            ]);
        }

    }






    
    public function userRegistration(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if (!$validator->fails()) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = 1;
            $user->save();
            Auth::attempt(['email' => $request->email, 'password' => $request->password]);
            return response()->json([
                'status' => "OK",
                'message' => 'you have registered',
            ]);
            
        }else{
            return response()->json([
                'status' => 'FAILD',
                'errors' => $validator->errors()->all(),
            ]);
        }
    }

    

    
    public function sendOtP(Request $request){

        $validator = Validator::make($request->all(), [
            'phone' => ['required', 'digits:11'],
        ]);

        if (!$validator->fails()) {
          
            $code=random_int(3333, 9999);
            $otp=new OtpVerification();
            $otp->phone=$request->phone;
            $otp->code=Hash::make($code);
            $otp->save();
            return response()->json([
                'status' => "OK",
                'message' => 'sent one time verification code on your phone number ',
            ]);
            
        }else{
            return response()->json([
                'status' => 'FAILD',
                'errors' => $validator->errors()->all(),
            ]);
        }
    }




    public function verifyOtpCode(Request $request){

    $validator = Validator::make($request->all(), [
        'code' => ['required', 'digits:4'],
    ]);

   //  return $request->all();
     $otp=OtpVerification::where('phone',$request->phone)->latest()->first();
     $to_time = strtotime(Carbon::now()->format('Y-m-d g:i:s'));
     $from_time = strtotime(Carbon::parse($otp->created_at)->format('Y-m-d g:i:s'));
     $expire_time= round(abs($to_time - $from_time) / 60,2);

     if (Hash::check($request->code, $otp->code)) {
           if($expire_time > 5){
               return \response()->json('Code Time Expired');
             }else{
            $user=User::where('phone',$request->phone)->first();
            if(empty($user)){
                $user=new User();
                $user->phone=$request->phone;
                $user->password=Hash::make($request->phone);
                $user->name=null;
                $user->email=null;
                $user->image=null;
                $user->city_id=null;
                $user->address=null;
                $user->status=1;
                $user->save();
           }
            Auth::loginUsingId($user->id);
            return \response()->json([
                'status'=>"OK",
                'message'=> 'Your number is verified',
                'user'=>Auth::user()
             ]);

             }
     }else{

        return \response()->json('Code Dose Not Match');
     }

}
















}
