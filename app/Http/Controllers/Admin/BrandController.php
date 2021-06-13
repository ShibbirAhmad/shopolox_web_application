<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderBy('id','desc')->get();
        return view('admin.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $html = view('admin.brand.create')->render();

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
            'name' => 'required|unique:brands',
        ]);

        if (!$validator->fails()) {
            $brand = new Brand();
            $brand->name = $request->name;
            $brand->status = 1 ;
            $brand->slug = Str::slug($request->name);
            if ($request->hasFile('image')) {
                $path=$request->file('image')->store('images/brand','public');
                $brand->image=$path;
            }
            $brand->save();
                return response()->json([
                    'status' => "OK",
                    'message' => 'brand Was Created',
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
        $brand = Brand::find($id);
        $html = view('admin.brand.edit', compact('brand'))->render();

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

            'name' => 'required|unique:brands,name,' . $id,
        ]);

        if (!$validator->fails()) {
            $brand = Brand::find($id);
            $brand->name = $request->name;
            $brand->slug = Str::slug($request->name);
            if ($request->hasFile('image')) {
                $path=$request->file('image')->store('images/brand','public');
                $brand->image=$path;
            }
            $brand->save();
                return response()->json([
                    'status' => "OK",
                    'message' => 'brand Was Updated',
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
        $brand = Brand::findOrFail($id);
        if ($brand->status== 1 ) {
            $brand->status= 0;
        }else {
            $brand->status = 1 ;
        }
        $brand->save();
            return response()->json([
                'status' => "OK",
                'message' => 'status changed',
            ]);      
        
    
    }

    


}
