<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Banner;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\ProductVariant;
use App\Models\SubSubCategory;
use App\Models\ProductCategory;
use App\Models\ProductAttribute;
use App\Models\ProductSubCategory;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\ProductSubSubCategory;
use App\Models\Variant;
use Attribute;
use Gloudemans\Shoppingcart\Facades\Cart;


class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Cart::content();
         $sliders = Slider::where('status',1)->orderBy('id','desc')->get();
         $banners = Banner::latest()->where('status',1)->orderBy('id','desc')->take(2)->get();
         //sub categories and products start query
         $sub_categories_with_products =SubCategory::where('status',1)->orderBy('position','desc')->with('sub_sub_categories')->get();
         foreach($sub_categories_with_products as $sub_category){
           $products_id=ProductSubCategory::where('sub_category_id',$sub_category->id)->select('product_id')->pluck('product_id');
           $sub_category->{'products'}=Product::whereIn('id',$products_id)->where('status',1)
                                                                    ->select('id','name','slug','thumbnail_img','code','discount','regular_price','sale_price')
                                                                    ->get()
                                                                    ->take(10);
        }
        //sub categories and products
         return view('frontend.index',compact(['sliders','banners','sub_categories_with_products']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function product($slug){
        $product = Product::where('slug',$slug)->with(['product_images','shipment'])->first();
        //finding attributes
        $product_attributes=ProductAttribute::where('product_id',$product->id)->with(['attributes'])->get()->each((function($value){
                  $value->attributes->{'varaints'}=ProductVariant::where('product_id',$value->product_id)->with('variants')->get();
       }));

        //finding related sub category products
        $product_sub_category=ProductSubCategory::where('product_id',$product->id)->first();
        $s_products_id=ProductSubCategory::where('sub_category_id',$product_sub_category->sub_category_id)->select('product_id')->pluck('product_id');
        $related_products=Product::whereIn('id',$s_products_id)->where('id','!=',$product->id)->get()->take(10);

        //finding related category products
        $product_category=ProductCategory::where('product_id',$product->id)->first();
        $c_products_id=ProductCategory::where('category_id',$product_category->category_id)->select('product_id')->pluck('product_id');
         $after_four=[];
         $before_four=[];
         foreach($c_products_id as $k=> $id){
             if($k+1 < 4){
                 array_push($before_four,$id);
             }
             if($k+1 >= 4){
                array_push($after_four,$id);
            }
         }
        $related_category_products=Product::whereIn('id',$after_four)->whereNotIn('id',$s_products_id)->where('id','!=',$product->id)->select('id','name','slug','thumbnail_img','code','discount','regular_price','sale_price')->get()->take(12);
        $recommend_products=Product::whereIn('id',$before_four)->whereNotIn('id',$s_products_id)->where('id','!=',$product->id)->select('id','name','slug','thumbnail_img','code','discount','regular_price','sale_price')->get()->take(12);
       
        return view('frontend.single_product',compact(['product','product_attributes','related_products','related_category_products','recommend_products']));
    }



     


    public function categoryWiseProduct($slug){
            
            $category = Category::where('slug',$slug)->first();
            $related_categories=Category::where('status',1)->where('id','!=',$category->id)->with('sub_categories')->get();
            //finding related sub category products
            $c_products_id=ProductCategory::where('category_id',$category->id)->select('product_id')->pluck('product_id');
            $products=Product::whereIn('id',$c_products_id)->select('id','name','slug','thumbnail_img','code','discount','regular_price','sale_price')->paginate(25);
            $brands= Brand::where('status',1)->get();

            return view('frontend.category_product',compact(['category','brands','products','related_categories']));

    }



    public function subCategoryWiseProduct($slug){

            $category = SubCategory::where('slug',$slug)->first();
            $related_categories=SubCategory::where('id','!=',$category->id)->where('status',1)->with('sub_sub_categories')->get();
            //finding related sub category products
            $c_products_id=ProductSubCategory::where('sub_category_id',$category->id)->select('product_id')->pluck('product_id');
            $products=Product::whereIn('id',$c_products_id)->select('id','name','slug','thumbnail_img','code','discount','regular_price','sale_price')->paginate(25);
            $brands= Brand::where('status',1)->get();

            return view('frontend.sub_category_product',compact(['category','brands','products','related_categories']));

    }


    
    public function subSubCategoryWiseProduct($slug){

       $category = SubSubCategory::where('slug',$slug)->first();
       $related_categories=SubSubCategory::where('id','!=',$category->id)->where('status',1)->get();
        //finding related sub category products
        $c_products_id=ProductSubSubCategory::where('sub_sub_category_id',$category->id)->select('product_id')->pluck('product_id');
        $products=Product::whereIn('id',$c_products_id)->select('id','name','slug','thumbnail_img','code','discount','regular_price','sale_price')->paginate(25);
        $brands= Brand::where('status',1)->get();

        return view('frontend.sub_sub_category_product',compact(['category','brands','products','related_categories']));

   }

     
 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function productQickView($id){
        
            $product = Product::select('id','name','details','regular_price','sale_price')->with('product_images')->findOrFail($id);
            $variants_id=ProductVariant::where('product_id',$product->id)->select('variant_id')->pluck('variant_id');
            $variants=Variant::whereIn('id',$variants_id)->select('name')->get();  
                            
            return response()->json([
               'status' => 'OK',
               'product' => $product,
               'variants' => $variants,

           ]);
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
}
