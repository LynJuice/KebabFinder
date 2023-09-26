<?php

namespace App\Http\Controllers;

use App\Models\KebabShops;
use Illuminate\Http\Request;

class KebabShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kebab_list = KebabShops::all();
        return view('kebab', compact("kebab_list"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(KebabShops $kebabShop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KebabShops $kebabShop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KebabShops $kebabShop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KebabShops $kebabShop)
    {
        //
    }
}
