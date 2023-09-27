<?php

namespace App\Http\Controllers;

use App\Models\KebabShops;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $kebab_list = KebabShops::all()->random(3);
        return view('index', compact("kebab_list"));
    }
}
