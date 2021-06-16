<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id','desc')->get();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $html = view('admin.category.create')->render();

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
            'name' => 'required|unique:categories',
        ]);

        if (!$validator->fails()) {
            $category = new Category();
            $category->name = $request->name;
            $category->status = 1 ;
            $category->slug = Str::slug($request->name);
            if ($request->hasFile('image')) {
                $path=$request->file('image')->store('images/category','public');
                $category->image=$path;
            }
            $category->save();
                return response()->json([
                    'status' => "OK",
                    'message' => 'Category Was Created',
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
            $sub_categories=SubCategory::where('category_id',$id)->where('status',1)->get();
            return response()->json([
                'sub_categories' =>$sub_categories
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
        $category = Category::find($id);
        $html = view('admin.category.edit', compact('category'))->render();

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

            'name' => 'required|unique:categories,name,' . $id,
        ]);

        if (!$validator->fails()) {
            $category = Category::find($id);
            $category->name = $request->name;
            $category->slug = Str::slug($request->name);
            if ($request->hasFile('image')) {
                $path=$request->file('image')->store('images/category','public');
                $category->image=$path;
            }
            $category->save();
                return response()->json([
                    'status' => "OK",
                    'message' => 'Category Was Updated',
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
        $category = Category::findOrFail($id);
        if ($category->status== 1 ) {
            $category->status= 0;
        }else {
            $category->status = 1 ;
        }
        $category->save();
            return response()->json([
                'status' => "OK",
                'message' => 'status changed',
            ]);      
        
    
    }

    


}
