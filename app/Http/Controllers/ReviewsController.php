<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reviews;

class ReviewsController extends Controller
{
    public function reviewsProduct($id)
    {
        $reviews = Reviews::with('user')->where('id_product', $id)->orderBy('created_at', 'desc');
        $totalReviews = $reviews->count();
        $sumReviews = $reviews->sum('rating');
        $averageRating = $totalReviews > 0 ? $sumReviews / $totalReviews : 0;
        dd($totalReviews);
        return view('shop.index', compact('reviews', 'totalReviews', 'averageRating'));
    }
}
