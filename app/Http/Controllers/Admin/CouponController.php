<?php

namespace App\Http\Controllers\Admin;

use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CouponController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::orderBy('id','desc')->get();
        return view('admin.coupon.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $html = view('admin.coupon.create')->render();

        return response()->json([
            'html' => $html,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|unique:coupons',
            'start_date' => 'required',
            'expire_date' => 'required',
            'discount_amount' => 'required',
            'discount_type' => 'required',
        ]);

        if (!$validator->fails()) {
            $coupon = new Coupon();
            $coupon->code = $request->code;
            $coupon->start_date =  date("Y-m-d",strtotime($request->start_date)) ; 
            $coupon->expire_date = date("Y-m-d",strtotime($request->expire_date)) ; 
            $coupon->discount_type = $request->discount_type;
            $coupon->discount_amount = $request->discount_amount;
            $coupon->save();
                return response()->json([
                    'status' => "OK",
                    'message' => 'coupon was created',
                ]);
            
        }else{
            return response()->json([
                'status' => 'FAILD',
                'errors' => $validator->errors()->all(),
            ]);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();
            return response()->json([
                'status' => "OK",
                'message' => 'Deleted',
            ]);  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupon = Coupon::find($id);
        $html = view('admin.coupon.edit', compact('coupon'))->render();

        return response()->json([
            'html' => $html,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|unique:coupons,code,'.$id,
            'start_date' => 'required',
            'expire_date' => 'required',
            'discount_amount' => 'required',
            'discount_type' => 'required',
        ]);

        if (!$validator->fails()) {
            $coupon = Coupon::find($id);
            $coupon->code = $request->code;
            $coupon->start_date =  date("Y-m-d",strtotime($request->start_date)) ; 
            $coupon->expire_date = date("Y-m-d",strtotime($request->expire_date)) ; 
            $coupon->discount_type = $request->discount_type;
            $coupon->discount_amount = $request->discount_amount;
            $coupon->save();
                return response()->json([
                    'status' => "OK",
                    'message' => 'coupon updated',
                ]);
            
        }else{

            return response()->json([
                'status' => 'FAILD',
                'errors' => $validator->errors()->all(),
            ]);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    public function destroy($id)
    {
        $coupon = Coupon::findOrFail($id);
        if ($coupon->status== 1 ) {
            $coupon->status= 0;
        }else {
            $coupon->status = 1 ;
        }
        $coupon->save();
            return response()->json([
                'status' => "OK",
                'message' => 'status changed',
            ]);      
        
    
    }

    
}
