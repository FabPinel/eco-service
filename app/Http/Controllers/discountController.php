<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discount;

class discountController extends Controller
{
    public function index()
    {
        $discounts = Discount::all();
        return view('admin.products.index', compact('discounts'));
    }

    public function create()
    {
        $discounts = Discount::all();
        return view('admin.discounts.create', compact('discounts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        // dd($request);
        // die;
        Discount::create($request->post());

        return redirect()->route('admin.products.index')->with('success', 'Discount has been created successfully.');
    }

    public function destroy(string $id)
    {
        $discounts = Discount::findOrFail($id);

        $discounts->delete();

        session()->flash('notif.success', 'Discount deleted successfully!');

        return redirect()->route('admin.products.index');
    }
}
