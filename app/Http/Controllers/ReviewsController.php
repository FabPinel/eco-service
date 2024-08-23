<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reviews;
use App\Models\OrderItem;
use App\Models\ReviewToken;
use App\Models\SubmittedReviews;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class ReviewsController extends Controller
{
    public function showReviewForm($accessToken)
    {
        $reviewTokens = session('reviewTokens');

        if (!$reviewTokens) {
            abort(404, 'Tokens not found');
        }
        $order = null;
        $orderItems = [];

        foreach ($reviewTokens as $token) {
            $reviewToken = ReviewToken::with('order')
                ->where('token', $token)
                ->where('expires_at', '>', Carbon::now())
                ->firstOrFail();

            if (!$order) {
                $order = $reviewToken->order;
            }

            $userId = auth()->id();
            $orderItem = OrderItem::where('id_order', $order->id)
                ->where('id_product', $reviewToken->product_id)
                ->first();

            // Vérifier si l'avis a déjà été soumis
            $orderItem->reviewSubmitted = SubmittedReviews::where('user_id', $userId)
                ->where('product_id', $orderItem->product_id)
                ->exists();

            // Ajouter le ReviewToken au bon produit
            $orderItem->reviewToken = $reviewToken->token;
            $orderItems[] = $orderItem;
        }

        return view('reviews.form', compact('order', 'orderItems', 'accessToken'));
    }


public function submitReview(Request $request, $token)
{
    $validated = $request->validate([
        'rating' => 'required|integer|min:0|max:5',
        'comment' => 'required|string',
        'user_id' => 'required|integer',
        'product_id' => 'required|integer',
    ]);
    $reviewToken = ReviewToken::where('token', $token)
    ->where('expires_at', '>', Carbon::now())
    ->firstOrFail();

    $existingReview = SubmittedReviews::where('user_id', $request->user_id)
    ->where('product_id', $request->product_id)
    ->where('order_id', $reviewToken->order_id)
    ->exists();

    if ($existingReview) {
        return response()->json(['message' => 'Vous avez déjà soumis un avis pour ce produit.'], 400);
    }

    Reviews::create([
        'rating' => $validated['rating'],
        'comment' => $validated['comment'],
        'user_id' => $validated['user_id'],
        'product_id' => $validated['product_id'],
    ]);

    SubmittedReviews::create([
        'user_id' => $validated['user_id'],
        'product_id' => $validated['product_id'],
        'order_id' => $reviewToken->order_id,
    ]);

    // Invalider le token
    $reviewToken->delete();

    return redirect()->back()->with('success', 'Merci pour votre avis ! Votre avis a bien été pris en compte.');
}
}
