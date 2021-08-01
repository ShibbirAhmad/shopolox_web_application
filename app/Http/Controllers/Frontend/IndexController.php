<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Banner;
use App\Models\Slider;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductSubCategory;

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
         $sub_categories_with_products =SubCategory::where('status',1)->orderBy('position','asc')->paginate(5);
         foreach($sub_categories_with_products as $sub_category){
           $products_id=ProductSubCategory::where('sub_category_id',$sub_category->id)->select('product_id')->pluck('product_id');
           $sub_category->{'products'}=Product::whereIn('id',$products_id)->with('product_images')
                                                                    ->where('status',1)
                                                                    ->select('id','name','slug','code','discount','regular_price','sale_price')
                                                                    ->get()
                                                                    ->take(10);
        }
        //sub categories and products end
         return view('frontend.index',compact(['sliders','banners','sub_categories_with_products']));
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
