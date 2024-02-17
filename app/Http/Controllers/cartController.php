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
        return view('shop.panier');
    }

    public function addToCart(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        if (!$product) {
            return abort(404);
        }

        $cart = session()->get('cart', []);

        // Vérifier si l'article est déjà dans le panier
        if (isset($cart[$productId])) {
            // Si oui, augmenter la quantité de l'article
            $cart[$productId]['quantity'] += 1;
        } else {
            // Sinon, ajouter un nouvel élément au panier
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

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
}
