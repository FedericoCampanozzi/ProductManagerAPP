<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Inertia\Inertia;
use DateTime;

class PublicPageController extends Controller
{
    public function index(){
        return Inertia::render("Product/Index",[
            "products" => Product::all()
        ]);
    }

    public function edit_product_page(int $id){
        return Inertia::render("Product/CRUD", [
            "product" =>  Product::find($id),
            "canEdit" => true,
            "canInsert" => false
        ]);
    }

    public function create_product_page(){
        $p = new Product();
        $p->id = -1;
        $p->name = "insert a name";
        $p->qty = -1;
        $p->price = -1;
        $p->description= "insert some text";
        $p->created_at = new DateTime();
        $p->updated_at = new DateTime();
        return Inertia::render("Product/CRUD",[
            "product" => $p,
            "canEdit" => false,
            "canInsert" => true
        ]);
    }

    public function show_product_page(int $id){
        return Inertia::render("Product/CRUD",[
            "product" => Product::find($id),
            "canEdit" => false,
            "canInsert" => false
        ]);
    }
}