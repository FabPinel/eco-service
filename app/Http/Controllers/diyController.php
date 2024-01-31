<?php

namespace App\Http\Controllers;

use App\Models\DIY;
use App\Models\DiyProduct;
use Illuminate\Http\Request;
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
            'text' => 'required',
            //'id_product' => 'required|array',
        ]);

        $data = $request->except('image ');


        dd($request);
        foreach ($request->id_product as $productIds) {
            $products = new DiyProduct();
            $products->id_DIY = $request->id;
            $products->id_product = $productIds;
            $products->save();
        }

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
        $diy = DIY::find($id);
        return view(('admin.diy.edit'), compact('diy'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:10000',
            'text' => 'required',
        ]);
        $product = DIY::find($id);

        $input = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $input['image'] = $imageName;
            if ($product->image) {
                Storage::delete('public/images/' . $product->image);
            }
        }
        $product->update($input);
        //dd($product);
        return redirect()->route('admin.diy.index')->with('success', 'Le DIY a été mis à jour avec succès');
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
