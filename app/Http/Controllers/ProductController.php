<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public function get()
    {
        return response()->json(['products' => Product::all()->toArray()]);
    }

    public function insert(Request $request)
    {
        $product = new Product();
        $product->name = $request['product']['name'];
        $product->qty = $request['product']['qty'];
        $product->price = $request['product']['price'];
        $product->description = $request['product']['description'];
        $product->created_at = new \DateTime();
        $product->updated_at = new \DateTime();
        $product->save();
        return response()->json(['new_location' => '/index']);
    }

    public function update(Request $request)
    {
        $product = Product::find($request['product']['id']);
        $product->name = $request['product']['name'];
        $product->qty = $request['product']['qty'];
        $product->price = $request['product']['price'];
        $product->description = $request['product']['description'];
        $product->updated_at = new \DateTime();
        $product->update();
        return response()->json(['new_location' => '/index']);
    }

    public function delete(Request $request)
    {
        $product = Product::find($request['product']['id']);
        $product->delete();
        return response()->json(['new_location' => '/index']);
    }
}