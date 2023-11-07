<?php

namespace App\Http\Controllers;

use App\Models\Diner;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $kebab_list = Diner::all()->random(3);
        $product_list = Product::all()->random(12);
        return view('index', compact("kebab_list", "product_list"));
    }
}
