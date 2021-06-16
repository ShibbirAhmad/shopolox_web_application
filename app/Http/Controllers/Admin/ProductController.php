<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $category,$sub_category,$sub_sub_category,$attributes,$variants,$brands ;

    public function __construct() {

      $this->attributes = Attribute::where('status',1)->orderBy('name')->with('variants')->get();
      $this->brands =   Brand::where('status',1)->orderBy('name')->get();
      $this->categories = Category::where('status',1)->orderBy('name')->with('subCategories.subSubCategory')->get();
    
    }


    public function index()
    {
        $products = Product::orderBy('id','desc')->get();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=$this->categories ;
        $attributes=$this->attributes ;
        $brands=$this->brands ;
        return view('admin.product.create',compact(['categories','attributes','brands']));
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
            'name' => 'required|unique:products',
        ]);

        if (!$validator->fails()) {
            $product = new Product();
            $product->name = $request->name;
            $product->status = 1 ;
            $product->slug = Str::slug($request->name);
            if ($request->hasFile('image')) {
                $path=$request->file('image')->store('images/product','public');
                $product->image=$path;
            }
            $product->save();
                return response()->json([
                    'status' => "OK",
                    'message' => 'product Was Created',
                ]);
            
        }

        return response()->json([
            'status' => 'FAILD',
            'errors' => $validator->errors()->all(),
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
           
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $html = view('admin.product.edit', compact('product'))->render();

        return response()->json([
            'html' => $html,
        ]);
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
        $validator = Validator::make($request->all(), [

            'name' => 'required|unique:products,name,' . $id,
        ]);

        if (!$validator->fails()) {
            $product = Product::find($id);
            $product->name = $request->name;
            $product->slug = Str::slug($request->name);
            if ($request->hasFile('image')) {
                $path=$request->file('image')->store('images/product','public');
                $product->image=$path;
            }
            $product->save();
                return response()->json([
                    'status' => "OK",
                    'message' => 'product Was Updated',
                ]);
            
        }

        return response()->json([
            'status' => 'FAILD',
            'errors' => $validator->errors()->all(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->status== 1 ) {
            $product->status= 0;
        }else {
            $product->status = 1 ;
        }
        $product->save();
            return response()->json([
                'status' => "OK",
                'message' => 'status changed',
            ]);      
        
    
    }

    


}
