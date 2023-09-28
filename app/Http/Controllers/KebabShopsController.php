<?php

namespace App\Http\Controllers;

use App\Models\KebabShops;
use Illuminate\Http\Request;

class KebabShopsController extends Controller
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
        return view('kebabShop.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        $description = $request->input('description');
        $address = $request->input('address');
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
        $phone = $request->input('phone');
        $is_open = $request->input('is_open');
        $open_time = $request->input('open_time');
        $close_time = $request->input('close_time');
        $image = $request->input('image');
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
