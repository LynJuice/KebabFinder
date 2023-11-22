<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\URL;
use App\Http\Requests\UpdateDinerRequest;
use App\Http\Requests\StoreDinerRequest;
use App\Models\Diner;
use App\Models\User;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DinerController extends Controller
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
            $kebab_list = Diner::paginate(10);
        } else if ($user->hasRole('kebabines administratorius')) {
            $kebab_list = $user->Diners()->paginate(10);
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
        $kebab_list = Diner::all();
        return view('table', compact("kebab_list"));
    }

    /**
     * Display a listing of the resource. kebabshops admin page
     *
     * @return \Illuminate\Http\Response
     */

     public function map()
     {
         $kebab_list = Diner::all();
         return view('map', compact("kebab_list"));
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
    public function store(StoreDinerRequest $request)
    {
        $kebab_shop_info = $request->validated();
        $kebab_shop_info['is_open'] = isset($_POST['is_open']);
        $kebab_shop_info['user_id'] = Auth::user()->id;
        $new_kebab_shop = Diner::create($kebab_shop_info);

        try {
            $name = $new_kebab_shop->id . '-' . time() . '-' . $request->image->getClientOriginalName();
            $name = str_replace(' ', '', $name);
            $request->image->storeAs('diners/photos', $name, 'public');
            $new_kebab_shop->image = $name;
            $new_kebab_shop->save();
        } catch (\Throwable $th) {
            $new_kebab_shop->image = null;
        }

        try {
            $name = $new_kebab_shop->id . '-' . time() . '-' . $request->logo->getClientOriginalName();
            $name = str_replace(' ', '', $name);
            $new_kebab_shop->logo = $name;
            $request->logo->storeAs('diners/logos', $name, 'public');
            $new_kebab_shop->save();
        } catch (\Throwable $th) {
            $new_kebab_shop->logo = null;
        }

        return back()->with('success', $new_kebab_shop->name . ' sėkmingai sukurtas');
    }

    /**
     * Display the specified resource.
     */
    public function show(Diner $shop)
    {
        $reviews = $shop->reviews()->paginate(3);
        return view('kebabShops.show', compact('shop', 'reviews'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Diner $shop)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDinerRequest $request, Diner $shop)
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

        try {
            $name = $shop->id . '-' . time() . '-' . $request->image->getClientOriginalName();
            $name = str_replace(' ', '', $name);
            $request->image->storeAs('diners/photos', $name, 'public');
            $shop->image = $name;
        } catch (\Throwable $th) {
            $shop->image = null;
        }

        try {
            $name = $shop->id . '-' . time() . '-' . $request->logo->getClientOriginalName();
            $name = str_replace(' ', '', $name);
            $request->logo->storeAs('diners/logos', $name, 'public');
            $shop->logo = $name;
        } catch (\Throwable $th) {
            $shop->logo = null;
        }

        $shop->save();

        return back()->with('success', $shop->name . ' sėkmingai atnaujintas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Diner $shop)
    {
        if (User::find(Auth::user()->id)->cannot('delete', $shop)) {
            abort(403);
        }


        // dd($shop->shopProducts()->get());

        // delete reviews
        $shop->reviews()->delete();
        $shop->shopProducts()->delete();
        $shop->delete();

        return back()->with('success', $shop->name . ' sėkmingai ištrintas');
    }

}
