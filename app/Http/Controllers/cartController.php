<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\shopController;
use App\Models\Product;

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

    public function addToCart(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        if (!$product) {
            return abort(404);
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += 1;
        } else {
            $cart[$productId] = [
                'product_id' => $productId,
                'quantity' => 1,
                'name' => $product->name,
                'price' => $product->price,
            ];
        }

        session()->put('cart', $cart);
        // dd(session('cart'));
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
}
