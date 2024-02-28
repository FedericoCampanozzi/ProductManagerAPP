<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{    
    /**
    * @OA\Get(
    *      path="/select-product",
    *      summary="Select all products",
    *      tags={"ProductPageController"},
    *      @OA\Response(
    *          response=200,
    *          description="OK",
    *          @OA\MediaType(
    *              mediaType="application/json"
    *          )
    *      )
    * )
    */
    public function get()
    {
        return response()->json(['products' => Product::all()->toArray()]);
    }

    /**
    * @OA\Post(
    *      path="/insert-product",
    *      summary="Store the product into database",
    *      tags={"ProductPageController"},
    *      @OA\Response(
    *          response=200,
    *          description="OK",
    *          @OA\MediaType(
    *              mediaType="application/json"
    *          )
    *      )
    * )
    */
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

    /**
    * @OA\Post(
    *      path="/update-product",
    *      summary="Update the product",
    *      tags={"ProductPageController"},
    *      @OA\Response(
    *          response=200,
    *          description="OK",
    *          @OA\MediaType(
    *              mediaType="application/json"
    *          )
    *      )
    * )
    */
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

    /**
    * @OA\Delete(
    *      path="/delete-product",
    *      summary="Delete the product",
    *      tags={"ProductPageController"},
    *      @OA\Response(
    *          response=200,
    *          description="OK",
    *          @OA\MediaType(
    *              mediaType="application/json"
    *          )
    *      )
    * )
    */
    public function delete(Request $request)
    {
        $product = Product::find($request['product']['id']);
        $product->delete();
        return response()->json(['new_location' => '/index']);
    }
}