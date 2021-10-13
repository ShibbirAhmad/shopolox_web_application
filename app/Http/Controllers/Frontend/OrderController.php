<?php

namespace App\Http\Controllers\Frontend;

use App\Models\City;
use App\Models\User;
use App\Models\Order;
use App\Models\SubCity;
use App\Models\Customer;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart_content=Cart::content();
        $cart_total=Cart::subtotal();
        $cart_item = Cart::count() ;
        $cities = City::where('status',1)->get();
        $user = Auth::user();
        return view('frontend.checkout',compact(['user','cities','cart_content','cart_total','cart_item']));
    }

    public function  subCities($id)
    {     
          $city= City::findOrFail($id);
          $sub_cities = SubCity::where('city_id',$id)->get();
          return response()->json([
                 "status" => "OK",
                 "city" => $city ,
                 "sub_cities" => $sub_cities ,
          ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
                'phone' => 'required|digits:11',
                'name' => 'required ',
                'address' => 'required',
                'city' => 'required',
                'sub_city' => 'required',
            ]);
            if (Cart::total() < 1) {
                return response()->json([
                    'message' => 'cart is empty'
                ]);
            }
            if (!$validator->fails()) {
                DB::transaction(function() use($request){
                    $user=User::where('id',Auth::user()->id)->first();
                    //update user city and address
                        $user->city_id=$request->city;
                        $user->address=$request->address;
                        $user->name=$request->name;
                        $user->save();
                    $customer=Customer::where('phone',$user->phone)->first();
                    if(!$customer){
                        $customer->user_id=$user->id;
                        $customer=new Customer();
                        $customer->name=$request->name;
                        $customer->phone=$request->phone;
                        $customer->address=$request->address;
                        $customer->city_id=$request->city;
                        $customer->save();
                    }
                    //save the order
                    $id = Order::max('id') ?? 1;
                    $invoice = rand(111,999) + $id;
                    $total=Cart::total();
                    if(!empty($request->coupon_discount) && $request->coupon_discount > 0 ){
                        $total=$total-$request->coupon_discount;
                    }
                    $order=new Order();
                    $order->customer_id=$customer->id;
                    $order->invoice_no=$invoice;
                    $order->city_id=$request->city;
                    $city= City::findOrFail($request->city);
                    $order->shipping_cost=$city->delivery_charge;
                    $order->discount=$request->discount ?? 0;
                    $order->paid=$request->paid ?? 0;
                    $order->total=$total;
                    $order->coupon_id=$request->coupon_id ?? null;
                    $order->coupon_discount=$request->coupon_discount ?? null;
                    $order->status='order placed';
                    $order->sub_city_id=$request->sub_city;
                    $order->save();
                    //if order save then save the order details
                    foreach(Cart::content() as $product){    
                            $details=new OrderItem();
                            $details->order_id=$order->id;
                            $details->product_id=$product->id;
                            $details->price=$product->price;
                            $details->quantity=$product->qty;
                            $details->size=$product->options->size??null;
                            $details->color=$product->options->color??null;
                            $details->weight=$product->options->weight??null;
                            $details->total=$product->qty*$product->price;
                            $details->save();
                        }

                    User::SendMessageCustomer($customer->phone,$customer->name,$order->invoice_no);
                    cart::destroy();
                    session()->put('order_id',Order::max('id'));
                });

                return response()->json([
                    'status' => "OK",
                    'message' => 'Thanks Dear '.$request->name.' your order is placed successfully',
                    'order_id' => Order::max('id'),
                    'payment_method' => $request->payment_method ,
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    public function orderList(){

        $user=Auth::user();
        $customer=Customer::where('phone',$user->phone)->first();
        $orders=Order::where('customer_id',$customer->id)->orderBy('id','desc')->paginate(10);
        return view('frontend.user.dashboard',compact('orders'));
         
     }
 
 
     public function orderDetails($id){
 
           $order =  Order::findOrFail($id);
           $customer = Customer::findOrFail($order->customer_id);
           if ($order->customer_id == $customer->id) {
                      $order_items=OrderItem::where('order_id',$order->id)->with(['product.product_images'])->get();
               return view('frontend.user.order',compact(['order_items','order','customer']));
           }else {
               return redirect()->back();
           }
          
     }
 
 
 













}
