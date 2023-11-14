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
        $review_info = $request->validated();
        // if review hasnt been posted on this product by this user and the user does not own the diner then create a review
        if (!Review::where('user_id', auth()->user()->id)->where('product_id', $review_info->product_id)->exists()) {
        $review = Review::create([
                'user_id' => auth()->user()->id,
                'diner_id' => $review_info->kebab_shop_id,
                'rating' => $review_info->rating,
                'comment' => $review_info->comment,
                'product_id' => $review_info->product_id,
            ]);
            
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
        $review->delete();
        return redirect()->back()->with('success', 'Atsiliepimas ištrintas sėkmingai.');
    }
}
