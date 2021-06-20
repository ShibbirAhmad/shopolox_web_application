<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Variant;
use App\Models\Category;
use App\Models\Attribute;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use App\Models\ShipmentInfo;
use Illuminate\Http\Request;
use App\Models\ProductVariant;
use App\Models\SubSubCategory;
use App\Models\ProductCategory;
use App\Models\ProductAttribute;
use App\Models\ProductSubCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ProductSubSubCategory;
use Illuminate\Support\Facades\Validator;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $category,$sub_category,$sub_sub_category,$attributes,$variants,$brands, $shipment_infos ;

    public function __construct() {

      $this->attributes = Attribute::where('status',1)->orderBy('name')->with('variants')->get();
      $this->shipment_infos = ShipmentInfo::where('status',1)->get();
      $this->brands =   Brand::where('status',1)->orderBy('name')->get();
      $this->categories = Category::where('status',1)->orderBy('name')->with('sub_categories.sub_sub_categories')->get();
    
    }


    public function index()
    {
        $products = Product::orderBy('id','desc')->with(['product_images','purchase_items'])->get();
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
        $shipment_infos= $this->shipment_infos;
        return view('admin.product.create',compact(['categories','attributes','brands','shipment_infos']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function slugCreator($string, $delimiter = '-') {
        // Remove special characters
          $string = preg_replace("/[~`{}.'\"\!\@\#\$\%\^\&\*\(\)\_\=\+\/\?\>\<\,\[\]\:\;\|\\\]/", "", $string);
        // Replace blank space with delimeter
        $string = preg_replace("/[\/_|+ -]+/", $delimiter, $string);
        return $string;
    }


    public function store(Request $request)
    {   
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'categories' => 'required',
            'attributes' => 'required',
            'regular_price' => 'required',
            'sale_price' => 'required',
            'status' => 'required',
        ]);

        if (!$validator->fails()) {
            DB::transaction(function() use($request){
            $max_id= Product::max('id') ?? 1 ;
            $product_code = $max_id + 1000 ;
            //inseting product
            $product = new Product();
            $product->name = $request->name;
            $product->code = $product_code;
            $product->slug = $this->slugCreator($request->name);
            $product->regular_price = $request->regular_price;
            $product->discount = $request->discount ?? 0;
            $product->sale_price = $request->sale_price;
            $product->details = $request->details;
            $product->status = $request->status ;
            $product->stock = 0;
            $product->brand_id = $request->brand_id ?? null ;
            $product->shiping_info_id = $request->shiping_info_id ?? null ;
            $product->labels = $request->labels ?? null ;
            $product->is_featured = $request->is_featured ?? null ;
            $product->tags   = $request->tags ?? null ;
            $product->seo_title = $request->seo_title ?? null ;
            $product->seo_description = $request->seo_description ?? null ;
            $product->collection_type = $request->collection ?? null ;
            $product->save();

            //save product multiple image in store directory
            if ($request->hasFile('image')) {
            $files = $request->file('image');
            foreach ($files as $file) {
                $product_image = new ProductImage();
                $product_image->product_id = $product->id;
                $path = $file->store('images/products', 'public');
                $product_image->image = $path;
                $product_image->save();
                }
            }

            //save the product categories
            if (isset($request->categories) && !empty($request->categories)) {
                foreach ($request->categories as $item) {
                    $p_category = new ProductCategory();
                    $p_category->product_id = $product->id;
                    $p_category->category_id = $item;
                    $p_category->save();
                }
            }

             //save the product sub categories
            if (isset($request->sub_categories) && !empty($request->sub_categories)) {
                foreach ($request->sub_categories as $item) {
                    $p_sub_category = new ProductSubCategory();
                    $p_sub_category->product_id = $product->id;
                    $p_sub_category->sub_category_id = $item;
                    $p_sub_category->save();
                }
            }

            //save the product categories
            if (isset($request->sub_sub_categories) && !empty($request->sub_sub_categories)) {
                foreach ($request->sub_sub_categories as $item) {
                    $p_sub_sub_category = new ProductSubSubCategory();
                    $p_sub_sub_category->product_id = $product->id;
                    $p_sub_sub_category->sub_sub_category_id = $item;
                    $p_sub_sub_category->save();
                }
            }

            //save the product properties
            if (isset($request->attributes) && !empty($request->attributes)) {
                    foreach ($request->attributes as $item) {
                        $p_attribute = new ProductAttribute();
                        $p_attribute->product_id = $product->id;
                        $p_attribute->attribute_id = $item;
                        $p_attribute->save();
                    }
            }
            //save the product variants
            if (isset($request->variants) && !empty($request->variants)) {
                foreach ($request->variants as $item) {
                    $product_variant = new ProductVariant();
                    $product_variant->product_id = $product->id;
                    $product_variant->variant_id = $item;
                    $product_variant->save();
                }
            }

            
        });
            
              return response()->json([
                    'status' => "OK",
                    'message' => 'product Created',
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
