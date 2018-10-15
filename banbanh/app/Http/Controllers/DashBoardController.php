<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashBoardController extends Controller
{
    public function getTrangChu(){
        
        $product = DB::table('products')->count();
        $product_type = DB::table('type_products')->count();
        $bills = DB::table('bills')->count();
        $customer = DB::table('customer')->count();
        $user = DB::table('users')->count();
        $slide = DB::table('slide')->count();
        return view('admin.trangchu',compact(['product','product_type','bills','customer','user','slide']));
    }
}
