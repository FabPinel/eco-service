<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DIY;
use Illuminate\Support\Facades\Storage;

class diyController extends Controller
{
    public function index()
    {
        $diy = DIY::paginate(10);

        return view('admin.diy.index', compact('diy'));
    }

    public function create()
    {
        $diy = DIY::all();
        return view('admin.diy.create', compact('diy'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:10000',
            'video' => 'string',
            'text' => 'required',
            'recipe' => 'required',
            'ustensils' => 'string',
        ]);

        $data = $request->except('image ');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $data['image'] = $imageName;
        }
        DIY::create($data);

        return redirect()->route('admin.diy.index')->with('success', ' Votre DIY a été créé avec succes.');
    }

    public function edit(string $id)
    {
        $product = DIY::find($id);
        return view(('admin.products.edit'), compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
        ]);
        $product = DIY::find($id);

        $input = $request->all();

        if ($request->hasFile('media')) {
            $image = $request->file('media');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $input['media'] = $imageName;
            if ($product->media) {
                Storage::delete('public/images/' . $product->media);
            }
        }
        $product->update($input);
        //dd($product);
        return redirect()->route('admin.products.index')->with('success', 'Le produit a été mis à jour avec succès');
    }

    public function destroy(string $id)
    {
        $diy = DIY::findOrFail($id);

        if (!is_null($diy->featured_image)) {
            Storage::disk('public')->delete($diy->featured_image);
        }

        $diy->delete();

        session()->flash('notif.success', 'Category deleted successfully!');

        return redirect()->route('admin.diy.index');
    }
}
