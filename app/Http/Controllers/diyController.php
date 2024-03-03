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
        ], [
            'title.required' => 'Le titre est requis',
            'description.required' => 'La description est requise',
            'image.required' => "une image est requise pour créer le DIY",
            'text.required' => "Il faut entrer du contenu",
        ]);

        $data = $request->except('image ');



        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $data['image'] = $imageName;
        }
        $diy = DIY::create($data);

        $selectedProducts = json_decode($request->input('selectedProducts'), true);

        if ($selectedProducts) {
            foreach ($selectedProducts as $productId) {
                $product = new DiyProduct();
                $product->id_DIY = $diy->id;
                $product->id_product = $productId;
                $product->save();
            }
        }

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
            'image' => 'image|mimes:jpeg,png,jpg,svg,webp|max:10000',
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
        $diy->diyProducts()->delete(); // Cela supprimera tous les enregistrements liés dans DIYproducts

        $diy->delete();

        session()->flash('notif.success', 'La catégorie à bien été supprimée');

        return redirect()->route('admin.diy.index');
    }

    public function getDiyById($id)
    {
        $diy = Diy::with('diyProducts.product')->find($id);

        return view('diy.diy', compact('diy'));
    }
}
