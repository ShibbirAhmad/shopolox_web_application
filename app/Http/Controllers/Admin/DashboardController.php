<?php

namespace App\Http\Controllers\Admin;


use Carbon\Carbon;
use App\Models\Order;
use App\Models\Balance;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Models\RequestProduct;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(){

        $analysis = self::dataCount();
        $top_selling_products_this_week=self::topSellingProductThisWeek();
        $recent_orders=Order::latest()->select('id','customer_id','invoice_no','total','status')->with(['customer:id,name','payment','order_items.product'])->take(10)->get();
        $balance_data=Balance::with('today_credit_balance','total_credit_balance','today_debit_balance','total_debit_balance')->get();
       
        return view('admin.index',compact(['analysis','recent_orders','balance_data','top_selling_products_this_week']));
   
    }




    public static function dataCount(){

         $analysis=array();
         //orders
         $analysis['total_order']=Order::count();
         $analysis['new_order']=Order::where('status','order placed')->count();
         $analysis['pending_order']=Order::where('status','pending')->count();
         $analysis['approved_order']=Order::where('status','confirm')->count();
         $analysis['shipment_order']=Order::where('status','shipped')->count();
         $analysis['delivered_order']=Order::where('status','delivered')->count();
         $analysis['return_order']=Order::where('status','return')->count();
         $analysis['cancel_order']=Order::where('status','cancel')->count();
         //others
         $analysis['total_product'] = Product::count();
         $analysis['total_product_request'] = RequestProduct::count();
         $analysis['total_supplier'] = Supplier::count();
         $analysis['total_purchase'] = Purchase::sum('total');
         $analysis['total_customer'] = Customer::count();
         $analysis['total_user'] = User::count();

         return $analysis;

    }


    
    public static function topSellingProductThisWeek(){
        $products=OrderItem::where('created_at', '>=', Carbon::today()->startOfDay()->subDays('7'))
                           ->where('created_at', '<=', Carbon::today()->endOfDay())
                           ->select('product_id',DB::raw('count(*) as total'))
                           ->groupBy('product_id')
                           ->orderBy('total','DESC')
                           ->with('product')
                           ->get();
  
       return $products;
    }

 
   
  
}
