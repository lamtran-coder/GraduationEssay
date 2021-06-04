<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Ordercontroller extends Controller
{
    public function all_order_product(){
        return view('admin.order_product_all');
    }
}
