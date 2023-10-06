<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\URL;
use App\Http\Requests\UpdateKebabShopsRequest;
use App\Http\Requests\StoreKebabShopsRequest;
use App\Models\KebabShops;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KebabShopsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kebab_list = KebabShops::all();
        return view('kebabShops.index', compact("kebab_list"));
    }

    /**
     * Display a listing of the resource. kebabshops admin page
     *
     * @return \Illuminate\Http\Response
     */

     public function table()
     {
        $kebab_list = KebabShops::all();
        return view('table', compact("kebab_list"));
     }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kebabShops.create');

        // validation klaidos
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKebabShopsRequest $request)
    {
        // dd($request);
        $kebab_shop_info = $request->validated();
        $kebab_shop_info['is_open'] = isset($_POST['is_open']);
        $kebab_shop_info['user_id'] = Auth::user()->id;
        // dd($kebab_shop_info);
        $new_kebab_shop = KebabShops::create($kebab_shop_info);
        // peradresuoti i indeksa
        // dd($new_kebab_shop);
        // $name = $request->input('name');
        // $description = $request->input('description');
        // $address = $request->input('address');
        // $latitude = $request->input('latitude');
        // $longitude = $request->input('longitude');
        // $phone = $request->input('phone');
        // $is_open = $request->input('is_open');
        // $open_time = $request->input('open_time');
        // $close_time = $request->input('close_time');
        // $image = $request->input('image');
        return redirect()->route('shops.index')->with('success', 'Kebabine sėkmingai sukurtas');
    }

    /**
     * Display the specified resource.
     */
    public function show(KebabShops $kebabShop)
    {
        return view('kebabShops.show', compact('kebab'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KebabShops $kebabShop)
    {
        return view('kebab.edit',compact('kebab'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKebabShopsRequest $request, KebabShops $kebabShop)
    {
        $request->validate([
            'name' => 'required',
            'description' => '',
            'address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'phone' => 'required',
            'open_time' => 'required',
            'close_time' => 'required',
            'image' => '',
        ]);
        
        $kebabShop->update($request->all());
        
        return redirect()->route('kebab.index')
                        ->with('success','KebabShop updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KebabShops $kebabShop)
    {
        $kebabShop->delete();
         
        return redirect()->route('kebab.index')
                        ->with('success','KebabShop deleted successfully'); 
    }
}
