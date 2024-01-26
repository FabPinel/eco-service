<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class shopController extends Controller
{
    public function getProductById($id)
    {
        $product = Product::find($id);
        return view('shop.product', compact('product'));
    }
}
