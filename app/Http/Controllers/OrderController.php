<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\OrderStatus;
use App\Models\UserAddress;
use App\Models\ReviewToken;
use Illuminate\Support\Str;
use App\Mail\ReviewRequestMail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('status', 'user', 'discount')->orderBy('created_at', 'desc')->paginate(10);
        $status = OrderStatus::all();
        $totalOrders = Order::count();
        return view('admin.orders.index', compact('orders', 'status', 'totalOrders'));
    }

    public function toggleStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $request->validate([
            'id_status' => 'required'
        ]);
        $newStatus = OrderStatus::findOrFail($request->id_status);
        $order->update(['id_status' => $request->id_status]);
        return redirect()->route('admin.orders.index')->with('success', 'Le statut de la commande #' . $order->id . ' est désormais ' . $newStatus->status);
    }

    public function orderDetails($id)
    {
        $order = Order::with('status', 'user', 'orderItems.product', 'discount')->findOrFail($id);
        $orderItems = OrderItem::where('id_order', $order->id)->get();
        $user = $order->user;
        $userAddress = UserAddress::where('id_user', $user->id)->first();
        $totalUserOrders = Order::where('id_user', $user->id)->count();
        $totalItemOrder = OrderItem::where('id_order', $order->id)->count();
        return view('admin.orders.orderDetails', compact('order', 'orderItems', 'totalUserOrders', 'totalItemOrder', 'userAddress'));
    }

    public function sendReviewRequest($orderId)
    {
        $order = Order::find($orderId);
        $user = $order->user;
        $orderItems = OrderItem::where('id_order', $orderId)->get();

        // Générer un token d'accès unique pour l'URL
        $accessToken = Str::random(60);
        $reviewTokens = [];

        // Pour chaque article de la commande, créer un ReviewToken et l'ajouter au tableau
        foreach ($orderItems as $orderItem) {
            $token = Str::random(60);
            $expiresAt = Carbon::now()->addDays(3);
            $reviewToken = ReviewToken::create([
                'user_id' => $user->id,
                'order_id' => $orderId,
                'product_id' => $orderItem->id_product,
                'token' => $token,
                'expires_at' => $expiresAt,
            ]);

            // Ajouter le token au tableau
            $reviewTokens[] = $reviewToken->token;
        }
        session(['reviewTokens' => $reviewTokens]);
        // Générer l'URL pour l'avis avec le token d'accès général
        $reviewUrl = route('reviews.form', ['accessToken' => $accessToken]);

        // Envoyer un e-mail avec l'URL d'accès et les tokens des avis
        Mail::to($user->email)->send(new ReviewRequestMail($reviewUrl, $reviewTokens));
    }
}
