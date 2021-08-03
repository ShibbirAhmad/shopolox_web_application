<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Banner;
use App\Models\Slider;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use App\Http\Controllers\Controller;
use App\Models\ProductAttribute;
use App\Models\ProductVariant;
use App\Models\Attribute;
use App\Models\Variant;


class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $sliders = Slider::where('status',1)->orderBy('id','desc')->get();
         $banners = Banner::latest()->where('status',1)->orderBy('id','desc')->take(2)->get();
         //sub categories and products start query
         $sub_categories_with_products =SubCategory::where('status',1)->orderBy('position','desc')->get();
         foreach($sub_categories_with_products as $sub_category){
           $products_id=ProductSubCategory::where('sub_category_id',$sub_category->id)->select('product_id')->pluck('product_id');
           $sub_category->{'products'}=Product::whereIn('id',$products_id)->with('product_images')
                                                                    ->where('status',1)
                                                                    ->select('id','name','slug','code','discount','regular_price','sale_price')
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
    public function product($slug)
    {
        $product = Product::where('slug',$slug)->with(['product_images'])->first();
        //finding attributes
        $p_attributes=ProductAttribute::where('product_id',$product->id)->select('attribute_id')->pluck('attribute_id');
        $product_attributes=Attribute::whereIn('id',$p_attributes)->get();
        //finding variants
        $p_variants=ProductVariant::where('product_id',$product->id)->select('variant_id')->pluck('variant_id');
        $product_variants=Variant::whereIn('id',$p_variants)->get();
        //finding related category products
        $product_category=ProductCategory::where('product_id',$product->id)->first();
        $c_products_id=ProductCategory::where('category_id',$product_category->category_id)->select('product_id')->pluck('product_id');
        $related_category_products=Product::whereIn('id',$c_products_id)->where('id','!=',$product->id)->with('product_images')->get()->take(12);
        //finding related sub category products
        $product_sub_category=ProductSubCategory::where('product_id',$product->id)->first();
        $products_id=ProductSubCategory::where('sub_category_id',$product_sub_category->sub_category_id)->select('product_id')->pluck('product_id');
        $related_products=Product::whereIn('id',$products_id)->where('id','!=',$product->id)->with('product_images')->get()->take(20);

        return view('frontend.single_product',compact(['product','product_attributes','product_variants','related_products','related_category_products']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
