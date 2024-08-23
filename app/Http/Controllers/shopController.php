<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Reviews;

class shopController extends Controller
{
    public function getProductById($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return abort(404);
        }

        $categoryId = $product->id_category;

        $relatedProducts = Product::where('id_category', $categoryId)
            ->where('id', '!=', $product->id)
            ->take(5)
            ->get();

            $reviews = Reviews::with('user')->where('product_id', $id)->orderBy('created_at', 'desc')->get();
            $totalReviews = $reviews->count();
            $sumReviews = $reviews->sum('rating');
            $averageRating = $totalReviews > 0 ? $sumReviews / $totalReviews : 0;

        return view('shop.product', compact('product', 'relatedProducts', 'reviews', 'totalReviews', 'averageRating'));
    }
}
