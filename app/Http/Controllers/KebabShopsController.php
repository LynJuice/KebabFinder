<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\URL;
use App\Http\Requests\UpdateKebabShopsRequest;
use App\Http\Requests\StoreKebabShopsRequest;
use App\Models\KebabShops;
use App\Models\User;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KebabShopsController extends Controller
{
    // public function __construct()
    // {
    //     $this->authorizeResource(KebabShops::class, 'KebabShops');
    // }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::with("roles")->find(Auth::user()->id);
        if ($user->hasRole('svetaines administratorius')) {
            $kebab_list = KebabShops::all();
        } else if ($user->hasRole('kebabines administratorius')) {
            $kebab_list = $user->kebabShops;
        } else {
            abort(403);
        }
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
        // 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKebabShopsRequest $request)
    {
        $kebab_shop_info = $request->validated();
        $kebab_shop_info['is_open'] = isset($_POST['is_open']);
        $kebab_shop_info['user_id'] = Auth::user()->id;
        $new_kebab_shop = KebabShops::create($kebab_shop_info);

        return redirect()->route('shops.index')->with('success', $new_kebab_shop->name . ' sėkmingai sukurtas');
    }

    /**
     * Display the specified resource.
     */
    public function show(KebabShops $shop)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KebabShops $shop)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKebabShopsRequest $request, KebabShops $shop)
    {
        if (User::find(Auth::user()->id)->cannot('update', $shop)) {
            abort(403);
        }

        $kebab_shop_info = $request->validated();
        $shop->name = $kebab_shop_info['name'];
        $shop->description = $kebab_shop_info['description'];
        $shop->address = $kebab_shop_info['address'];
        $shop->latitude = $kebab_shop_info['latitude'];
        $shop->longitude = $kebab_shop_info['longitude'];
        $shop->phone = $kebab_shop_info['phone'];
        $shop->open_time = $kebab_shop_info['open_time'];
        $shop->close_time = $kebab_shop_info['close_time'];
        $shop->image = $kebab_shop_info['image'];

        $shop->save();

        return redirect()->route('shops.index')->with('success', $shop->name . ' sėkmingai atnaujintas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KebabShops $shop)
    {
        if (User::find(Auth::user()->id)->cannot('delete', $shop)) {
            abort(403);
        }


        // dd($shop->shopProducts()->get());

        // delete reviews
        $shop->shopReviews()->delete();
        $shop->shopProducts()->delete();
        $shop->delete();

        return redirect()->route('shops.index')->with('success', $shop->name . ' sėkmingai ištrintas');
    }

}
