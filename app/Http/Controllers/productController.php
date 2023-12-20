<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class productController extends Controller
{
    public function index()
    {
        $products = Product::all();
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
            'quantity' => 'required|numeric',
            'media' => 'required|image|mimes:jpeg,,png,jpg,gif,svg|max:2048',
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
        return view('shop.category', compact('product'));
    }

    public function edit(string $id)
    {
        $product = Product::find($id);
        return view(('admin.products.edit'), compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'media' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($request->hasFile('media')) {
            $image = $request->file('media');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $input['media'] = $imageName; // Ajoutez cette ligne pour mettre à jour le nom du fichier dans $input
        }

        $product->update($input);

        return redirect()->route('admin.products.index')->with('success', 'Le produit a été mis à jour avec succès');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.index')->with('success', 'Product has been deleted successfully');
    }
}
