<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\OrderStatus;
class OrderController extends Controller
{
    public function index() {
        $orders = Order::with('status', 'user')->get();
        $status = OrderStatus::all();
        $totalOrders = Order::count();
        return view('admin.orders.index', compact('orders', 'status', 'totalOrders'));
    }

    public function toggleStatus(Request $request, $id) {
        $order = Order::findOrFail($id);
        $request->validate([
            'id_status' => 'required'
        ]);
        $order->update(['id_status' => $request->id_status]);
        return redirect()->route('admin.orders.index')->with('success', 'Le statut de la commande a été mis à jour avec succès');
    }
}
