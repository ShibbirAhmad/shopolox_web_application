<?php

namespace App\Http\Controllers\Admin;

use App\Models\sub_city;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\SubCity;
use Illuminate\Support\Facades\Validator;

class SubCityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_cities = SubCity::with('city')->orderBy('id','desc')->get();
        return view('admin.sub_city.index', compact('sub_cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities=city::where('status',1)->orderBy('name')->get();
        $html = view('admin.sub_city.create',compact('cities'))->render();

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
            'name' => 'required|unique:sub_cities',
            'city_id' => 'required',
        ]);
        if(!$validator->fails()){ 
        $sub_city = new SubCity();
        $sub_city->name = $request->name;
        $sub_city->city_id = $request->city_id;
        $sub_city->status = 1;
        $sub_city->save();
            return response()->json([
                'status' => 'OK',
                'message' => 'added successfully'
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
        $sub_city=SubCity::findOrFail($id);
        $sub_city->delete();
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
        $sub_city = SubCity::findOrFail($id);
        $cities=city::where('status',1)->orderBy('name')->get();
        $html = view('admin.sub_city.edit', compact('sub_city','cities'))->render();

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
            'name' => 'required|unique:sub_cities,name,'.$id,
            'city_id' => 'required',
        ]);
        if(!$validator->fails()){ 
        //for slug
        $sub_city=SubCity::findOrFail($id);
        $sub_city->name = $request->name;
        $sub_city->city_id = $request->city_id;
        $sub_city->save();
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
        $sub_city = SubCity::findOrFail($id);
        if ($sub_city->status== 1 ) {
            $sub_city->status= 0;
        }else {
            $sub_city->status = 1 ;
        }
        $sub_city->save();
            return response()->json([
                'status' => "OK",
                'message' => 'status changed',
            ]);      
        
    
    }





}
