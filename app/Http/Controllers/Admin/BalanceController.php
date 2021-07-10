<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Balance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $balances = Balance::orderBy('id','desc')->get();
        return view('admin.balance.index', compact('balances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $html = view('admin.balance.create')->render();

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
            'name' => 'required|unique:balances',
        ]);

        if (!$validator->fails()) {
            $balance = new Balance();
            $balance->name = $request->name;
            $balance->save();
                return response()->json([
                    'status' => "OK",
                    'message' => 'balance Was Created',
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
        $balance = Balance::find($id);
        $html = view('admin.balance.edit', compact('balance'))->render();

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

            'name' => 'required|unique:balances,name,' . $id,
        ]);

        if (!$validator->fails()) {
            $balance = Balance::find($id);
            $balance->name = $request->name;
            $balance->save();
                return response()->json([
                    'status' => "OK",
                    'message' => 'balance Was Updated',
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
        // $balance = Balance::findOrFail($id);
        // if ($balance->status== 1 ) {
        //     $balance->status= 0;
        // }else {
        //     $balance->status = 1 ;
        // }
        // $balance->save();
        //     return response()->json([
        //         'status' => "OK",
        //         'message' => 'status changed',
        //     ]);      
        
    
    }

    


}
