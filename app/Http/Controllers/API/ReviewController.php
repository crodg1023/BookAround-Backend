<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Models\Comercio;
use App\Events\NewReviewEvent;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ReviewResource::collection(Review::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReviewRequest $request)
    {
        $new_review = new Review();
        $new_review->comercio()->associate($request->comercio_id);
        $new_review->cliente()->associate($request->cliente_id);
        $new_review->score = $request->score;
        $new_review->content = $request->content;
        $new_review->save();

        $comercio = Comercio::findOrFail($request->comercio_id);
        $total_score = Review::where('comercio_id', $request->comercio_id)->sum('score');
        $review_count = Review::where('comercio_id', $request->comercio_id)->count();
        $comercio->score = $total_score/$review_count;
        $comercio->save();

        broadcast(new NewReviewEvent($new_review))->toOthers();

        return response()->json($new_review);
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        return new ReviewResource($review);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReviewRequest $request, Review $review)
    {
        $review->score = $request->score ?: $review->score;
        $review->content = $request->content ?: $review->content;
        $review->save();

        return response()->json($review);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        $review->delete();
        return response()->json($review);
    }

    public function getBusinessReviews($id)
    {
        $reviews = Review::where('comercio_id', $id)->orderBy('created_at', 'asc')->get();

        return ReviewResource::collection($reviews);
    }
}
