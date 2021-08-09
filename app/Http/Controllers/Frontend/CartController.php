<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Models\ProductAttribute;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function addCart(Request $request,$id){

        $product=Product::findOrFail($id);
        
            Cart::add([
                'id' => $product->id,
                'name'=>$product->name,
                'qty' => $request->quantity ?? 1,
                'price' => $product->sale_price,
                'weight' => 0,
                'tax' => 0,
                'options' =>
                     [
                         'size' => $request->size,
                         'color'=>$request->color,
                         'weight'=>$request->weight,
                         'slug'=>$product->slug,
                         'image'=>ProductImage::where('product_id',$product->id)->first()
                      ]
            ]);

        return response()->json([
            'status'=>'OK',
            'message'=>$product->name.' added your cart'
        ]);
        

 }

 public function cartContent(){

    $cart_content=Cart::content();
    $cart_total=Cart::total();
        return response()->json([
            'status' => 'OK',
            'cart_total'=>$cart_total,
            'cart_content'=>$cart_content,
            'item_count'=>Cart::count()
        ]);

    }


    
 public function viewCart(){

    $cart_content=Cart::content();
    $cart_total=Cart::total();
    $cart_item = Cart::count() ;
    return view('frontend.cart',compact(['cart_content','cart_total','cart_item']));

    }



    public  function cartUpdate(Request $request){
    //    return $request->all();
        $rowId =$request->rowId ;
        Cart::update($rowId, $request->qty) ;
        $cart_content = Cart::content();
        $cart_total=Cart::total();
        $cart_item = Cart::count() ;
        $updated_qty =0;
        $item_price =0;
        foreach($cart_content as $item) {
            if ($item->rowId==$rowId) {
                $updated_qty += $item->qty ;
                $item_price += $item->price ;
            }
        }
        return response()->json([
                'status'=>'OK',
                'updated_qty'=>$updated_qty,
                'item_price'=>$item_price,
                'cart_total'=>$cart_total,
                'cart_content'=>$cart_content,
                'item_count'=> $cart_item ,
            ]);

    }

    public  function cartDestroy($rowId){
        Cart::remove($rowId);
        $cart_total=Cart::total();
        return response()->json([
            'status'=>'OK',
            'message' => 'item removed from your cart',
            'cart_total'=>$cart_total,
            'item_count'=>Cart::count(),
        ]);


    }
}
