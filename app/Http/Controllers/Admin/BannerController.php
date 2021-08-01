<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class bannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners= Banner::orderBy('id','desc')->get();
        return view('admin.banner.index',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $html= view('admin.banner.create')->render();
          return response()->json([
              'html' => $html ,
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
            'image' => 'required',
        ]);

        if (!$validator->fails()) {
            $banner = new Banner();
            $banner->url = $request->url ?? '#';
            $banner->status = 1 ;
            $path=$request->file('image')->store('images/banner','public');
            $banner->image=$path;
            $banner->save();
                return response()->json([
                    'status' => "OK",
                    'message' => 'Banner Was Created',
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        $html = view('admin.banner.edit', compact('banner'))->render();

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
        
            $banner = Banner::findOrFail($id);
            $banner->url = $request->url ?? '#';
            if ($request->hasFile('image')) {
                $path=$request->file('image')->store('images/banner','public');
                $banner->image=$path;
            }
            $banner->save();
                return response()->json([
                    'status' => "OK",
                    'message' => 'Banner was updated',
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
        $banner = Banner::findOrFail($id);
        if ($banner->status== 1 ) {
            $banner->status= 0;
        }else {
            $banner->status = 1 ;
        }
        $banner->save();
         
        return response()->json([
                'status' => "OK",
                'message' => 'status changed',
            ]);      
        
    }
}
