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
        //  $product_attribute=ProductAttribute::where('product_id',$product->id)->get();

        //  if($product_attribute->count()>=1 && $request->attribute_id==null){
        //     return response()->json([
        //         'status'=>'error',
        //         'message'=>'missing product information'
        //      ]);
        // }else if($product->stock<=0){
        //     return response()->json([
        //     'status'=>'error',
        //     'message'=>"Product Stock Out"
        //     ]);
        // }
        //  else if($request->quantity > $product->stock){
        //     return response()->json([
        //             'status'=>'error',
        //             'message'=>"Product Highest Quantity '$product->stock'"
        //     ]);
        // }
 
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



    public  function carToUpdate(Request $request){

        $rowId =$request->rowId ;
        if(Cart::update($rowId, $request->qty)){
            return response()->json([
                'status'=>'OK',

            ]);
        }

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
