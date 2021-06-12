<?php

namespace App\Http\Controllers\Admin;

use App\Models\Variant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Attribute;
use Illuminate\Support\Facades\Validator;

class VariantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $variants = Variant::with('attribute')->orderBy('id','desc')->get();
        return view('admin.variant.index', compact('variants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $attributes=Attribute::where('status',1)->get();
        $html = view('admin.variant.create',compact('attributes'))->render();

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
            'name' => 'required|unique:variants',
            'attribute_id' => 'required',
        ]);
        if(!$validator->fails()){ 
        $variant = new Variant();
        $variant->name = $request->name;
        $variant->attribute_id = $request->attribute_id;
        $variant->status = 1;
        $variant->save();
            return response()->json([
                'status' => 'OK',
                'message' => 'added successfully'
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
        $variant=Variant::findOrFail($id);
        $variant->delete();
        return response()->json([
            'status' => "OK",
            'message' => 'deleted',
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
        $variant = Variant::findOrFail($id);
        $attributes=Attribute::where('status',1)->get();
        $html = view('admin.variant.edit', compact('variant','attributes'))->render();

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
            'name' => 'required|unique:variants,name,'.$id,
            'attribute_id' => 'required',
        ]);
        if(!$validator->fails()){ 
        //for slug
        $variant=Variant::findOrFail($id);
        $variant->name = $request->name;
        $variant->attribute_id = $request->attribute_id;
        $variant->save();
            return response()->json([
                'status' => 'OK',
                'message' => 'updated successfully'
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
        $variant = Variant::findOrFail($id);
        if ($variant->status== 1 ) {
            $variant->status= 0;
        }else {
            $variant->status = 1 ;
        }
        $variant->save();
            return response()->json([
                'status' => "OK",
                'message' => 'status changed',
            ]);      
        
    
    }





}
