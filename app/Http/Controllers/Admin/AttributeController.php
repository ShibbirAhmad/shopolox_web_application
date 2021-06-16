<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = Attribute::orderBy('id','desc')->get();
        return view('admin.attribute.index', compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $html = view('admin.attribute.create')->render();

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
            'name' => 'required|unique:attributes',
        ]);

        if (!$validator->fails()) {
            $attribute = new Attribute();
            $attribute->name = $request->name;
            $attribute->status = 1;
            $attribute->save();
                return response()->json([
                    'status' => "OK",
                    'message' => 'attribute was Created',
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
          
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attribute = Attribute::find($id);
        $html = view('admin.attribute.edit', compact('attribute'))->render();

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

            'name' => 'required|unique:attributes,name,' . $id,
        ]);

        if (!$validator->fails()) {
            $attribute = Attribute::find($id);
            $attribute->name = $request->name;
            $attribute->save();
                return response()->json([
                    'status' => "OK",
                    'message' => 'attribute Was Updated',
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
        $attribute = Attribute::findOrFail($id);
        if ($attribute->status== 1 ) {
            $attribute->status= 0;
        }else {
            $attribute->status = 1 ;
        }
        $attribute->save();
            return response()->json([
                'status' => "OK",
                'message' => 'status changed',
            ]);      
        
    
    }

    


}
