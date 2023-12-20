<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class productController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->paginate(5);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'media' => 'image|max:10000'
        ]);

        $data = $request->except('media');

        // Vérifiez si une image a été téléchargée avant de tenter de la stocker
        if ($request->hasFile('media')) {
            $image = $request->file('media');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $data['media'] = $imageName;
        }

        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Product has been created successfully.');
    }

    public function show(Product $product)
    {
        return view('admin.products.show', compact('Product'));
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('Product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);

        $product->fill($request->post())->save();

        return redirect()->route('admin.products')->with('success', 'Product Has Been updated successfully');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products')->with('success', 'Product has been deleted successfully');
    }
}
