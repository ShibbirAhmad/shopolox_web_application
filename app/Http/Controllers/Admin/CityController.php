<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::orderBy('id','desc')->get();
        return view('admin.city.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $html = view('admin.city.create')->render();

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
            'name' => 'required|unique:cities',
            'delivery_charge' => 'required'
        ]);

        if (!$validator->fails()) {
            $city = new City();
            $city->name = $request->name;
            $city->delivery_charge = $request->delivery_charge;
            $city->status = 1;
            $city->save();
                return response()->json([
                    'status' => "OK",
                    'message' => 'city was created',
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
        $city = city::findOrFail($id);
        $city->delete();
            return response()->json([
                'status' => "OK",
                'message' => 'Deleted',
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
        $city = city::find($id);
        $html = view('admin.city.edit', compact('city'))->render();

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

            'name' => 'required|unique:cities,name,' . $id,
        ]);

        if (!$validator->fails()) {
            $city = city::find($id);
            $city->name = $request->name;
            $city->delivery_charge = $request->delivery_charge;
            $city->save();
                return response()->json([
                    'status' => "OK",
                    'message' => 'city Was Updated',
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
        $city = city::findOrFail($id);
        if ($city->status== 1 ) {
            $city->status= 0;
        }else {
            $city->status = 1 ;
        }
        $city->save();
            return response()->json([
                'status' => "OK",
                'message' => 'status changed',
            ]);      
        
    
    }

    


}
