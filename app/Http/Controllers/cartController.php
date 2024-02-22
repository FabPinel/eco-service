<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\shopController;
use App\Models\Product;
use App\Models\UserAddress;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderAddress;
use Illuminate\Support\Facades\Auth;

class cartController extends Controller
{
    public function panier()
    {
        $summaryData = $this->summary();

        return view('shop.panier', [
            'subtotal' => $summaryData['subtotal'],
            'total' => $summaryData['total'],
        ]);
    }

    public function checkout()
    {
        $summaryData = $this->summary();

        $user = auth()->user();

        $userAddress = null;
        if ($user) {
            $userAddress = UserAddress::where('id_user', $user->id)
                ->where('default', 1)
                ->first();
        }

        return view('shop.checkout', [
            'subtotal' => $summaryData['subtotal'],
            'total' => $summaryData['total'],
            'userAddress' => $userAddress,
        ]);
    }

    public function addToCart(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        if (!$product) {
            return abort(404);
        }

        $cart = session()->get('cart', []);

        $quantity = $request->input('quantity', 1);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                'product_id' => $productId,
                'quantity' => $quantity,
                'name' => $product->name,
                'price' => $product->price,
                'image_url' => asset('storage/images/' . $product->media),
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Article ajouté au panier.');
    }

    public function removeFromCart(Request $request)
    {
        if ($request->product_id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->product_id])) {
                unset($cart[$request->product_id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }

        return $this->panier();
    }

    public function updateCart(Request $request)
    {
        if ($request->isMethod('put')) {
            $productId = $request->input('product_id');
            $quantity = $request->input('quantity');
            $cart = session()->get('cart', []);

            if (isset($cart[$productId])) {
                $cart[$productId]['quantity'] = $quantity;
                session()->put('cart', $cart);
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false, 'message' => 'Product not found in cart.']);
            }
        } else {
            return response()->json(['success' => false, 'message' => 'Method not allowed.'], 405);
        }
    }


    public function summary()
    {
        $cart = session('cart', []);
        $subtotal = 0;

        foreach ($cart as $item) {
            $product = Product::find($item['product_id']);
            if ($product) {
                $subtotal += $product->price * $item['quantity'];
            }
        }

        $total = $subtotal + 4.99;

        return [
            'subtotal' => $subtotal,
            'total' => $total,
        ];
    }

    // Stripe 

    public function session(Request $request)
    {
        session()->put('order_address', [
            'first_name' => $request->input('first-name'),
            'last_name' => $request->input('last-name'),
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'country' => $request->input('country'),
            'postal_code' => $request->input('postal-code'),
            'phone' => $request->input('phone'),
        ]);

        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $cart = session('cart', []);

        $lineItems = [];

        foreach ($cart as $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency'     => 'eur',
                    'product_data' => [
                        'name' => $item['name'],
                    ],
                    'unit_amount'  => $item['price'] * 100,
                ],
                'quantity'   => $item['quantity'],
            ];
        }

        $lineItems[] = [
            'price_data' => [
                'currency'     => 'eur',
                'product_data' => [
                    'name' => 'Frais de livraison',
                ],
                'unit_amount'  => 499,
            ],
            'quantity'   => 1,
        ];

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items'  => $lineItems,
            'mode'        => 'payment',
            'success_url' => route('success'),
            'cancel_url'  => route('panier'),
        ]);

        return redirect()->away($session->url);
    }


    public function success(Request $request)
    {
        $user = Auth::user();
        $cart = session('cart', []);

        $summaryData = $this->summary();
        $subtotal = $summaryData['subtotal'];
        $total = $summaryData['total'];

        $order = Order::create([
            'total' => $total,
            'id_user' => $user->id,
        ]);

        $orderItems = [];
        foreach ($cart as $item) {
            $orderItem = OrderItem::create([
                'quantity' => $item['quantity'],
                'id_product' => $item['product_id'],
                'id_order' => $order->id,
            ]);

            $orderItems[] = $orderItem;

            $product = Product::find($item['product_id']);
            if ($product) {
                $product->quantity -= $item['quantity'];
                $product->save();
            }
        }

        $orderAddressData = session('order_address', []);

        $orderAddress = OrderAddress::create([
            'first_name' => $orderAddressData['first_name'],
            'last_name' => $orderAddressData['last_name'],
            'address' => $orderAddressData['address'],
            'city' => $orderAddressData['city'],
            'country' => $orderAddressData['country'],
            'postal_code' => $orderAddressData['postal_code'],
            'phone' => $orderAddressData['phone'],
            'id_order' => $order->id,
        ]);

        $orderDetails = [
            'order' => $order,
            'orderItems' => $orderItems,
            'orderAddress' => $orderAddress,
            'subtotal' => $subtotal,
            'total' => $total,
        ];

        return view('shop.order', compact('orderDetails'));
    }
}
