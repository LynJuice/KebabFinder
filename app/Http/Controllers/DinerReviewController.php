<?php

namespace App\Http\Controllers;

use App\Models\DinerReview;
use App\Http\Requests\StoreDinerReviewRequest;
use App\Http\Requests\UpdateDinerReviewRequest;

class DinerReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = DinerReview::all();
        return view('reviews.Dinerindex', compact('reviews'));
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
    public function store(StoreDinerReviewRequest $request)
    {
        $review_info = $request->validated();

        // if the review hasnt been posted on this product by this user and the user does not own the diner then create a review
        if (!DinerReview::where('user_id', auth()->user()->id)->where('diner_id', $review_info['diner_id'])->exists()) {
            $review = DinerReview::create([
                'user_id' => auth()->user()->id,
                'diner_id' => $review_info['diner_id'],
                'rating' => $review_info['rating'],
                'comment' => $review_info['comment'],
            ]);

            return redirect()->back()->with('success', 'Atsiliepimas pridėtas sėkmingai.');
        } else {
            return redirect()->back()->with('error', 'Jūs jau palikote atsiliepimą šiai kebabinėi.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(DinerReview $dinerReview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DinerReview $dinerReview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDinerReviewRequest $request, DinerReview $dinerReview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DinerReview $dinerReview)
    {
        if ($dinerReview->user_id != auth()->user()->id)
            return redirect()->back()->with('error', 'Jūs negalite ištrinti šio atsiliepimo.');
        
        $dinerReview->delete();
        return redirect()->back()->with('success', 'Atsiliepimas ištrintas sėkmingai.');
    }
}
