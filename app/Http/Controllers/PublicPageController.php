<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Inertia\Inertia;

class PublicPageController extends Controller
{
    
    public function indexpage () {
        return Inertia::render('EditDialog', [
            "data" => "aaaaaaaaaaaa"
        ]);
    }
}
