<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\KebabShops;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::with("roles")->find(Auth::user()->id);
        if ($user->hasRole('svetaines administratorius')) {
            $products = Product::all();
        } else if ($user->hasRole('kebabines administratorius')) {
            $products = $user->products;
        } else {
            abort(403);
        }
        return view('products.index', compact("products"));
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
    public function store(StoreProductRequest $request)
    {
        $product_info = $request->validated();
        $product_info['user_id'] = Auth::user()->id;
        $product = Product::create($product_info);

        return redirect()->route('products.index')->with('success', 'Produktas pridėtas sėkmingai.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product_info = $request->validated();
        $product->name = $product_info['name'];
        $product->price = $product_info['price'];
        $product->description = $product_info['description'];
        $product->image = $product_info['image'];
     
        $product->update($product_info);

        return redirect()->route('products.index')->with('success', $product_info['name'] . ' atnaujintas sėkmingai.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $productName = $product->name;
        $product->delete();

        return redirect()->route('products.index')->with('success', $productName . ' ištrintas sėkmingai.');
    }
}