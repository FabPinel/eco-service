<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reviews;
use App\Models\OrderItem;
use App\Models\ReviewToken;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class ReviewsController extends Controller
{
    public function showReviewForm($token)
{
    $reviewToken = ReviewToken::with('order')->where('token', $token)
                ->where('expires_at', '>', Carbon::now())
                ->firstOrFail();
    $order = $reviewToken->order;
    $orderItems = OrderItem::where('id_order', $order->id)->get();
    return view('reviews.form', compact('order', 'orderItems'));
}

public function submitReview(Request $request, $token)
{
    $reviewToken = ReviewToken::where('token', $token)
                ->where('expires_at', '>', Carbon::now())
                ->firstOrFail();

    // Valider et stocker l'avis
    // ...

    // Supprimer le token après soumission de l'avis
    $reviewToken->delete();

    return redirect()->route('home')->with('message', 'Merci pour votre avis !');
}
}
