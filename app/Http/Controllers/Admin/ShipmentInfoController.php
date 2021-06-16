<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShipmentInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ShipmentInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $shipment_infos = ShipmentInfo::orderBy('id','desc')->get();
        return view('admin.shipment_info.index', compact('shipment_infos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $html = view('admin.shipment_info.create')->render();

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

            'name' => 'required|unique:shipment_infos',
            'description' => 'required',
        ]);

        if (!$validator->fails()) {
            $shipment_info = new ShipmentInfo();
            $shipment_info->name = $request->name;
            $shipment_info->status = 1;
            $shipment_info->description = $request->description;
            if ($shipment_info->save()) {
                return response()->json([
                    'status' => "OK",
                    'message' => 'shipment_info Created',
                ]);
            }
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
        $shipment_info=ShipmentInfo::findOrFail($id);
        $shipment_info->delete();
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
        $shipment_info = ShipmentInfo::find($id);
        $html = view('admin.shipment_info.edit', compact('shipment_info'))->render();

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

            'name' => 'required|unique:shipment_infos,name,'.$id,
            'description' => 'required',
        ]);

        if (!$validator->fails()) {
            $shipment_info = ShipmentInfo::find($id);
            $shipment_info->name = $request->name;
            $shipment_info->description = $request->description;
            if ($shipment_info->save()) {
                return response()->json([
                    'status' => "OK",
                    'message' => 'shipment_info Was Updated',
                ]);
            }
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
       
        $attribute = ShipmentInfo::findOrFail($id);
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
