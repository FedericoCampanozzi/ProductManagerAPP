<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function get(){
        return response()->json(['products' => Product::all()->toArray()]);
    }
}