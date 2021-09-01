<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
     
    
    public function index(){
          $orders = Order::orderby('id','desc')->with('customer')->paginate(30);
          return view('admin.order.index',compact('orders')) ;
      }




    public function orderDetails($id){
          $order = Order::with('order_items','customer')->findOrFail($id);
          return view('admin.order.details',compact('order')) ;
      }


    public function statusChange($id,$status){
          $order = Order::findOrFail($id);
          $order->status=$status ;
          $order->save();
          return response()->json([
              'status' => 'OK',
              'message' => 'order status changed to '.$status,
          ]);

      }





}
