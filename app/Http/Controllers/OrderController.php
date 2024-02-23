<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\OrderStatus;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('status', 'user')->paginate(10);
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
        $order = Order::with('status', 'user', 'orderItems.product')->findOrFail($id);
        $orderItems = OrderItem::where('id_order', $order->id)->get(); //Parcours la liste des orderItems qui on pour id_order = $id
        $user = $order->user;
        $totalUserOrders = Order::where('id_user', $user->id)->count();
        $totalItemOrder = OrderItem::where('id_order', $order->id)->count();
        return view('admin.orders.orderDetails', compact('order', 'orderItems', 'totalUserOrders', 'totalItemOrder'));
    }
}
