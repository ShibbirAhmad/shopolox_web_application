<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
     
    
    public function index(){
          $orders = Order::orderby('id','desc')->with('customer')->paginate(30);
          return view('admin.order.index',compact('orders')) ;
      }


    public function users(){
            $users = User::where('role',1)->orderby('id','desc')->paginate(30);
            return view('admin.order.users',compact('users')) ;
    }


    public function customers(){
            $customers = Customer::orderby('id','desc')->paginate(30);
            return view('admin.order.customers',compact('customers')) ;
    }


    public function orderDetails($id){
          $order = Order::where('id',$id)->select('id','customer_id','city_id','sub_city_id','invoice_no','status','shipping_cost','discount','paid','total')->with('order_items.product.product_images','customer','city','sub_city')->first();
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
