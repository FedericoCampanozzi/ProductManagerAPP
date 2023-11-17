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

    public function insert(Product $product): RedirectResponse
    {
        $product->save();
        return Redirect::route('index');
    }

    public function update(Product $product): RedirectResponse
    {
        $product->update();
        return Redirect::route('index');
    }

    public function delete(Product $product): RedirectResponse
    {
        $product->delete();
        return Redirect::route('index');
    }
}