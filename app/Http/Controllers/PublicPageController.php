<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Inertia\Inertia;
use DateTime;

class PublicPageController extends Controller
{
    /**
     * @OA\Get(
     *      path="/",
     *      summary="Get table with all products",
     *      tags={"PublicPageController"},
     *      @OA\Response(
     *          response=200,
     *          description="OK",
     *          @OA\MediaType(
     *              mediaType="application/json"
     *          )
     *      )
     * )
     */
    public function index(){
        return Inertia::render("Product/Index",[
            "products" => Product::all()
        ]);
    }
    
    /**
     * @OA\Get(
     *      path="/edit/{id}",
     *      summary="Get the edit page. In there you can update or delete product",
     *      tags={"PublicPageController"},
     *      @OA\Parameter(
     *          name="id",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *           type="int"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="OK",
     *          @OA\MediaType(
     *              mediaType="application/json"
     *          )
     *      )
     * )
     */
    public function edit_product_page(int $id){
        return Inertia::render("Product/CRUD", [
            "product" =>  Product::find($id),
            "canEdit" => true,
            "canInsert" => false
        ]);
    }
    
    /**
     * @OA\Get(
     *      path="/create",
     *      summary="Get the create page. In there you can create product",
     *      tags={"PublicPageController"},
     *      @OA\Response(
     *          response=200,
     *          description="OK",
     *          @OA\MediaType(
     *              mediaType="application/json"
     *          )
     *      )
     * )
     */
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
    
    /**
     * @OA\Get(
     *      path="/show/{id}",
     *      summary="Get the detail page. In there you only show the product",
     *      tags={"PublicPageController"},
     *      @OA\Parameter(
     *          name="id",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *           type="int"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="OK",
     *          @OA\MediaType(
     *              mediaType="application/json"
     *          )
     *      )
     * )
     */
    public function show_product_page(int $id){
        return Inertia::render("Product/CRUD",[
            "product" => Product::find($id),
            "canEdit" => false,
            "canInsert" => false
        ]);
    }
}