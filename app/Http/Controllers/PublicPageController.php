<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Inertia\Inertia;

class PublicPageController extends Controller
{
    public function indexpage () {
        return Inertia::render('Pizzas/EditPizzaStatus', [
            "pizza" => $pizza,
            "next_status" => $next_status,
            "isChef" => $isChef
        ]);
    }

    public function editpage () {
        return Inertia::render('Pizzas/EditPizzaStatus', [
            "pizza" => $pizza,
            "next_status" => $next_status,
            "isChef" => $isChef
        ]);
    }
}
