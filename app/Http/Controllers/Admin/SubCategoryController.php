<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\SubSubCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_categories = SubCategory::with('category')->orderBy('id','desc')->get();
        return view('admin.sub_category.index', compact('sub_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::where('status',1)->get();
        $html = view('admin.sub_category.create',compact('categories'))->render();

        return response()->json([
            'html' => $html,
        ]);
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
            'name' => 'required|unique:sub_categories',
            'category_id' => 'required',
        ]);
        if(!$validator->fails()){ 
        $subCategory = new SubCategory();
        $subCategory->name = $request->name;
        $subCategory->category_id = $request->category_id;
        $subCategory->status = 1;
        $subCategory->slug = Str::slug($request->name).'-'. rand(22,99);     //make category slug.

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images/subCategory', 'public');
            $subCategory->image = $path;
        }
        $subCategory->save();
            return response()->json([
                'status' => 'OK',
                'message' => 'sub category add successfully'
            ]);
        }else{

            return response()->json([
                'status' => 'FAILD',
                'errors' => $validator->errors()->all(),
            ]);
        }


        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sub_sub_categories=SubSubCategory::where('status',1)->where('sub_category_id',$id)->get();
        return response()->json([
            'sub_sub_categories' => $sub_sub_categories ,
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
        $sub_category = SubCategory::findOrFail($id);
        $categories=Category::where('status',1)->get();
        $html = view('admin.sub_category.edit', compact('sub_category','categories'))->render();

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
            'name' => 'required|unique:sub_categories,name,'.$id,
            'category_id' => 'required',
        ]);
        if(!$validator->fails()){ 
        //for slug
        $subCategory=SubCategory::findOrFail($id);
        $subCategory->name = $request->name;
        $subCategory->category_id = $request->category_id;
        $subCategory->slug = Str::slug($request->name).'-'. rand(22,99);   //make category slug.

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images/subCategory', 'public');
            $subCategory->image = $path;
        }
        $subCategory->save();
            return response()->json([
                'status' => 'OK',
                'message' => 'updated successfully'
            ]);
        }else{

            return response()->json([
                'status' => 'FAILD',
                'errors' => $validator->errors()->all(),
            ]);
        }


        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */




    public function destroy($id)
    {
        $sub_category = SubCategory::findOrFail($id);
        if ($sub_category->status== 1 ) {
            $sub_category->status= 0;
        }else {
            $sub_category->status = 1 ;
        }
        $sub_category->save();
         
        return response()->json([
                'status' => "OK",
                'message' => 'status changed',
            ]);      
        

    }





}
