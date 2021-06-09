<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Show_productcontroller extends Controller
{
    public function show_product(){
        return view('pages.shop');
    }
}
