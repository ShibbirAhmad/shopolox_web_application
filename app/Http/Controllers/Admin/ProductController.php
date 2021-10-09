<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Attribute;
use App\Models\ProductImage;
use App\Models\ShipmentInfo;
use Illuminate\Http\Request;
use App\Models\ProductVariant;
use App\Models\RequestProduct;
use App\Models\ProductCategory;
use App\Models\ProductAttribute;
use App\Models\ProductSubCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ProductSubSubCategory;
use Intervention\Image\Facades\Image;
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
        $products = Product::orderBy('id','desc')->with(['product_images','purchase_items'])->paginate(20);
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
            'product_attributes' => 'required',
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
            $product->slug = $this->slugCreator(strtolower($request->name)).'-'.$product_code;
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

            //save product multiple image in store directory
            if ($request->hasFile('images')) {
            $files = $request->file('images');

            //make thumnail image
            $filename = time() .$files[0]->getClientOriginalName();
            $image_resize = Image::make($files[0]->getRealPath());
            $image_resize->resize(400, 400, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image_resize->save(public_path('storage/images/thumbnail_img/'.$filename));
            $product->thumbnail_img = $filename;
            $product->save();

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
            if (isset($request->product_attributes) && !empty($request->product_attributes) ) {
                    foreach ($request->product_attributes as $item) {
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
    public function productCopy($id,$item)
    {
        $product = Product::findOrFail($id);
        DB::transaction(function() use($product,$item){
            for($i =1 ; $i <= $item; $i++) {  
            $max_id= Product::max('id') ?? 1 ;
             $product_code = $max_id + 1000 ;
            //inseting product
            $c_product = new Product();
            $c_product->name = $product->name;
            $c_product->code = $product_code;
            $c_product->slug = $this->slugCreator(strtolower($product->name)).'-'.$product_code;
            $c_product->regular_price = $product->regular_price;
            $c_product->discount = $product->discount ?? 0;
            $c_product->sale_price = $product->sale_price;
            $c_product->details = $product->details;
            $c_product->status = $product->status ;
            $c_product->thumbnail_img = $product->thumbnail_img;
            $c_product->stock = 0;
            $c_product->brand_id = $product->brand_id ?? null ;
            $c_product->shiping_info_id = $product->shiping_info_id ?? null ;
            $c_product->labels = $product->labels ?? null ;
            $c_product->is_featured = $product->is_featured ?? null ;
            $c_product->tags   = $product->tags ?? null ;
            $c_product->seo_title = $product->seo_title ?? null ;
            $c_product->seo_description = $product->seo_description ?? null ;
            $c_product->collection_type = $product->collection ?? null ;
            $c_product->save();

            //save product multiple image in store directory
            
                $exist_p_image=ProductImage::where('product_id',$product->id)->get();
                if (!empty($exist_p_image)) {
                        $product_image = new ProductImage();
                        $product_image->product_id = $c_product->id;
                        $product_image->image = $exist_p_image[0]->image;
                        $product_image->save();
                }
                
                

            //save the product categories
              $exist_p_categories= ProductCategory::where('product_id',$product->id)->get();               
              if (!empty($exist_p_categories)) {
                $p_category = new ProductCategory();
                $p_category->product_id = $c_product->id;
                $p_category->category_id = $exist_p_categories[0]->category_id;
                $p_category->save();     
            }
        

                //save the product sub categories
                $exist_p_sub_categories= ProductSubCategory::where('product_id',$product->id)->get();
                if (!empty($exist_p_sub_categories)) {
                        $p_sub_category = new ProductSubCategory();
                        $p_sub_category->product_id = $c_product->id;
                        $p_sub_category->sub_category_id = $exist_p_sub_categories[0]->sub_category_id;
                        $p_sub_category->save();
                }


                //save the product categories
                $exist_p_sub_sub_categories= ProductSubSubCategory::where('product_id',$product->id)->get();
                if (count($exist_p_sub_sub_categories) > 0) {
                    $p_sub_sub_category = new ProductSubSubCategory();
                    $p_sub_sub_category->product_id = $c_product->id;
                    $p_sub_sub_category->sub_sub_category_id = $exist_p_sub_sub_categories[0]->sub_sub_category_id;
                    $p_sub_sub_category->save();
                }

                //save the product properties
                $exist_attributes = ProductAttribute::where('product_id',$product->id)->get();
                if (count($exist_attributes) > 0) {
                        $p_attribute = new ProductAttribute();
                        $p_attribute->product_id = $c_product->id;
                        $p_attribute->attribute_id = $exist_attributes[0]->attribute_id;
                        $p_attribute->save();
                }
                //save the product variants
                $exist_p_variants = ProductVariant::where('product_id',$product->id)->get();
                if (count($exist_p_variants) > 0) {
                        $product_variant = new ProductVariant();
                        $product_variant->product_id = $c_product->id;
                        $product_variant->variant_id = $exist_p_variants[0]->variant_id;
                        $product_variant->save();
                }

        
          } 

        }); 
        
            return response()->json([
               'status' => "OK",
                'message' => 'duplicated successfully!'. $item . 'times',
            ]);      
        
    
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $product = Product::with(['product_images','product_attributes','product_variants','product_sub_sub_categories','product_sub_categories','product_categories'])->find($id);
            $categories=$this->categories ;
            $attributes=$this->attributes ;
            $brands=$this->brands ;
            $shipment_infos= $this->shipment_infos;
        return view('admin.product.edit',compact(['product','categories','attributes','brands','shipment_infos']));

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
          // return $request->all();
          $validator = Validator::make($request->all(), [
            'name' => 'required',
            'categories' => 'required',
            'product_attributes' => 'required',
            'regular_price' => 'required',
            'sale_price' => 'required',
            'status' => 'required',
        ]);

        if (!$validator->fails()) {
            DB::transaction(function() use($request,$id){
            $product = Product::findOrFail($id);
            $product->name = $request->name;
            $product->slug = $this->slugCreator(strtolower($request->name)).'-'.$product->code ;
            $product->regular_price = $request->regular_price;
            $product->discount = $request->discount ?? 0;
            $product->sale_price = $request->sale_price;
            $product->details = $request->details;
            $product->status = $request->status ;
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
            if ($request->hasFile('images')) {
            $files = $request->file('images');

            //make thumnail image
            $filename = time() .$files[0]->getClientOriginalName();
            $image_resize = Image::make($files[0]->getRealPath());
            $image_resize->resize(400, 400, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image_resize->save(public_path('storage/images/thumbnail_img/'.$filename));
            $product->thumbnail_img = $filename;
            $product->save();

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
                //find product old categories
                $old_categories = ProductCategory::whereIn('product_id',[$id])->get();
                foreach ($old_categories as $c) {
                    $c->delete() ;
                }
                // re inserting categories
                foreach ($request->categories as $item) {                
                        $p_category = new ProductCategory();
                        $p_category->product_id = $product->id;
                        $p_category->category_id = $item;
                        $p_category->save();   
                }
            }

             //save the product sub categories
            if (isset($request->sub_categories) && !empty($request->sub_categories)) {
                //find product old categories
                $old_categories = ProductSubCategory::whereIn('product_id',[$id])->get();
                foreach ($old_categories as $c) {
                    $c->delete() ;
                }
                // re storing sub categories
                foreach ($request->sub_categories as $item) {
                        $p_sub_category = new ProductSubCategory();
                        $p_sub_category->product_id = $product->id;
                        $p_sub_category->sub_category_id = $item;
                        $p_sub_category->save();                 
                }
            }

            //save the product categories
            if (isset($request->sub_sub_categories) && !empty($request->sub_sub_categories)) {
                //find product old categories
                $old_categories = ProductSubSubCategory::whereIn('product_id',[$id])->get();
                foreach ($old_categories as $c) {
                    $c->delete() ;
                }
                // re storing sub sub categories
                foreach ($request->sub_sub_categories as $item) {
                        $p_sub_sub_category = new ProductSubSubCategory();
                        $p_sub_sub_category->product_id = $product->id;
                        $p_sub_sub_category->sub_sub_category_id = $item;
                        $p_sub_sub_category->save();
                }
            }

            //save the product properties
            if (isset($request->product_attributes) && !empty($request->product_attributes) ) {
                   //find product old categories
                   $old_attributes = ProductAttribute::whereIn('product_id',[$id])->get();
                   foreach ($old_attributes as $p) {
                       $p->delete() ;
                   }
                   // re storing attributes
                    foreach($request->product_attributes as $item) {
                        $p_attribute = new ProductAttribute();
                        $p_attribute->product_id = $product->id;
                        $p_attribute->attribute_id = $item;
                        $p_attribute->save();
                    }
            }
            //save the product variants
            if (isset($request->variants) && !empty($request->variants)) {
                 //find product old categories
                 $old_variants = ProductVariant::whereIn('product_id',[$id])->get();
                 foreach ($old_variants as $v) {
                     $v->delete() ;
                 }
                 // re storing attributes
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
                    'message' => 'product updated',
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


    public function productImageDelete($id){

          $product_image = ProductImage::findOrFail($id);
          $is_file_exists=file_exists('storage/'.$product_image->image) ;
          if ($is_file_exists) {
              unlink('storage/'.$product_image->image) ;
          }
          $product_image->delete();
          
          return response()->json([
              'status' => 'OK',
              'message' => 'removed this image',
          ]);
           
    }



     
    public function requestForProduct(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'product_one_link' => 'required',
            'product_one_variant' => 'required',
            'phone' => ['required', 'digits:11'],
            'email' => ['required', 'string', 'email'],
        ]);

        if (!$validator->fails()) {
            $product = new RequestProduct();
            $product->name = $request->name;
            $product->email = $request->email;
            $product->phone = $request->phone;
            $product->product_one_link = $request->product_one_link;
            $product->product_one_variant = $request->product_one_variant;
            $product->product_two_link = $request->product_two_link ?? null;
            $product->product_two_variant = $request->product_two_variant ?? null;
            $product->save();
            return response()->json([
                'status' => "OK",
                'message' => 'Thanks for request. we will contact with you as soon as possible',
            ]);
            
        }else{
            return response()->json([
                'status' => 'FAILD',
                'errors' => $validator->errors()->all(),
            ]);
        }
    }

    

    
    public function requestProductList(){

       $products = RequestProduct::orderBy('id','desc')->paginate(20);
       return view('admin.product.request_product',compact('products'));

    }


}
