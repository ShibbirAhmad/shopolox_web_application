<?php

namespace App\Http\Controllers\Admin;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){

        return view('admin.index');
    }

    public function login(Request $request){
        
      
        return  view('admin.auth.login');
    }
  
}
