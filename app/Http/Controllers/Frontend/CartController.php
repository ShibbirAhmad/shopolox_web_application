<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Attribute;
use Illuminate\Http\Request;
use App\Models\ProductAttribute;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;


class CartController extends Controller
{
    public function addCart(Request $request,$id){

        $product=Product::findOrFail($id);
         
           $size='';
           $color= $request->color ?? '';
           $weight= $request->weight ?? '';
           if(empty($request->size)) {
                //firstly i am finding the attributes of products and checking what type of attribute are there.
                // Then after initializing variant according to attribute
                $p_attributs=ProductAttribute::where('product_id',$product->id)->select('attribute_id')->pluck('attribute_id');
                $attributs = Attribute::whereIn('id',$p_attributs)->get();
                for ($i=0; $i < count($attributs) ; $i++) { 
                    if (strtolower($attributs[$i]->name) == 'size') {
                            $size= 'L' ;     
                    }else if (strtolower($attributs[$i]->name) == 'color') {
                            $color= 'Black' ;
                    }else if (strtolower($attributs[$i]->name) == 'weight') {
                        $weight= '500 gm' ;
                    }
                }
           }else{
               $size = $request->size ;
           }

            Cart::add([
                'id' => $product->id,
                'name'=>$product->name,
                'qty' => $request->quantity ?? 1,
                'price' => $product->sale_price,
                'weight' => 0,
                'tax' => 0,
                'options' =>
                     [
                         'size' => $size,
                         'color'=>$color,
                         'weight'=>$weight,
                         'slug'=>$product->slug,
                         'image'=> $product->thumbnail_img ?? 'noimage.png',
                      ]
            ]);

        return response()->json([
            'status'=>'OK',
            'message'=>$product->name.' added your cart'
        ]);
        

 }

 public function cartContent(){

    $cart_content=Cart::content();
    $cart_total=Cart::subtotal();
        return response()->json([
            'status' => 'OK',
            'cart_total'=>$cart_total,
            'cart_content'=>$cart_content,
            'item_count'=>Cart::count()
        ]);

    }


    
 public function viewCart(){

    $cart_content=Cart::content();
    $cart_total=Cart::subtotal();
    $cart_item = Cart::count() ;
    return view('frontend.cart',compact(['cart_content','cart_total','cart_item']));

    }



    public  function cartUpdate(Request $request){
    //    return $request->all();
        $rowId =$request->rowId ;
        Cart::update($rowId, $request->qty) ;
        $cart_content = Cart::content();
        $cart_total=Cart::subtotal();
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
        $cart_total=Cart::subtotal();
        return response()->json([
            'status'=>'OK',
            'message' => 'item removed from your cart',
            'cart_total'=>$cart_total,
            'item_count'=>Cart::count(),
        ]);


    }






    public function addWishlist(Request $request,$id){

           $product=Product::findOrFail($id);
           Cart::instance('wishlist')->add($product->id,$product->name,1,$product->sale_price,00,['slug' => $product->slug ,'image' => $product->thumbnail_img ?? 'noimage.png' ]);
            return response()->json([
                'status'=>'OK',
                'message'=>$product->name.' added to  wishlist',
                'wishlist_item'=>Cart::instance('wishlist')->count(),
            ]);
            

    }



    public function viewWishlist(){

        $wishlist_content=Cart::instance('wishlist')->content();
        $wishlist_item = Cart::instance('wishlist')->count();
        return view('frontend.wishlist',compact(['wishlist_content','wishlist_item']));

        }




    public  function wishlistDestroy($rowId){
        Cart::remove($rowId);
        $cart_total=Cart::subtotal();
        return response()->json([
            'status'=>'OK',
            'message' => 'item removed from your cart',
            'cart_total'=>$cart_total,
            'item_count'=>Cart::count(),
        ]);


    }






}
