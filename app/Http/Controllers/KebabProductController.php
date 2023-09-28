<?php

namespace App\Http\Controllers;

use App\Models\KebabProduct;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKebab_ProductRequest;
use App\Http\Requests\UpdateKebab_ProductRequest;

class KebabProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreKebab_ProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(KebabProduct $kebab_Product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KebabProduct $kebab_Product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKebab_ProductRequest $request, KebabProduct $kebab_Product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KebabProduct $kebab_Product)
    {
        //
    }
}
