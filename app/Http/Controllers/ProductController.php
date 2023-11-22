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
            $products = Product::paginate(10);
        } else if ($user->hasRole('kebabines administratorius')) {
            $products = $user->products()->paginate(10);
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
        $product_info['images'] = "";
        $product = Product::create($product_info);

        try {
            $name = $product->id . '-' . time() . '-' . $request->image->getClientOriginalName();
            $request->image->storeAs('products', $name, 'public');
            $product->image = $name;
            $product->save();
        } catch (\Throwable $th) {
            $product->image = null;
        }



        return redirect()->route('products.index')->with('success', 'Produktas pridėtas sėkmingai.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $reviews = $product->reviews()->paginate(3);
        // dd($reviews);
        return view('products.show', compact('product', 'reviews'));
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
        if (User::find(Auth::user()->id)->cannot('update', $product)) {
            abort(403);
        }

        $product_info = $request->validated();
        $product->name = $product_info['name'];
        $product->price = $product_info['price'];
        $product->description = $product_info['description'];
        // $product->image = $product_info['image'];
        if ($request->image) {
            try {
                $name = $product->id . '-' . time() . '-' . $request->image->getClientOriginalName();
                $request->image->storeAs('products', $name, 'public');
                $product->image = $name;
            } catch (\Throwable $th) {
                $product->image = null;
            }
        }

        $product->save();


        // // return redirect()->route('products.index')->with('success', $product_info['name'] . ' atnaujintas sėkmingai.');
        return back()->with('success', $product_info['name'] . ' atnaujintas sėkmingai.');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if (User::find(Auth::user()->id)->cannot('delete', $product)) {
            abort(403);
        }

        $productName = $product->name;
        $product->reviews()->delete();
        $product->kebabProducts()->delete();
        $product->delete();

        // // return redirect()->route('products.index')->with('success', $productName . ' ištrintas sėkmingai.');
        return back()->with('success', $productName . ' ištrintas sėkmingai.');
    }
}
