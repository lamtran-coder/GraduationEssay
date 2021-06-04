<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Productcontroller extends Controller
{
    public function add_product(){
        return view('admin.product_add');
    }
    public function all_product(){
        return view('admin.product_all');
    }
}
