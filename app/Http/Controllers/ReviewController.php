<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::all();
        return view('reviews.index', compact('reviews'));
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
    public function store(StoreReviewRequest $request)
    {

        // check if user is logged in and is not the kebab shop owner and hasn't posted a comment yet
        if (auth()->check() && auth()->user()->id != $request->kebab_shop_id && !Review::where('user_id', auth()->user()->id)->where('kebab_shop_id', $request->kebab_shop_id)->exists()) {
            $review = Review::create([
                'user_id' => auth()->user()->id,
                'kebab_shop_id' => $request->kebab_shop_id,
                'rating' => $request->rating,
                'comment' => $request->comment
            ]);
            
            dd($review);
            return redirect()->back()->with('success', 'Atsiliepimas pridėtas sėkmingai.');
        } else {
            return redirect()->back()->with('error', 'Jūs jau palikote atsiliepimą šiai kebabinėi.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReviewRequest $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
}
