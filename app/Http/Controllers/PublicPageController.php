<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Inertia\Inertia;

class PublicPageController extends Controller
{
    public function index(){
        return Inertia::render("Product/Index",[
            "products" => Product::all()
        ]);
    }

    public function edit_product_page(int $id){
        $product = Product::find($id);
        if ($product == null){
            return $this->index();
        } else {
            return Inertia::render("Product/Edit",[
                "product" =>  $product
            ]);
        }
    }

    public function create_product_page(){
        return Inertia::render("Product/Create",[
            "product" => new Product()
        ]);
    }
}