<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Produse;
use App\Models\Img;
use App\Models\categorii;

use Illuminate\Support\Facades\Storage;

class ProduseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produses = Produse::with('images')
        ->latest()
        ->get();
        return view(
            'admin.produse.index',
            compact('produses')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $categorii = categorii::all();

    return view(
        'admin.produse.create',
        compact('categorii')
    );
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'price' => 'required|numeric',
        'discount' => 'nullable|numeric|min:0|max:100',
        'tickets' => 'required|integer',
        'categoriis_id' => 'required',
        'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:10240',
    ]);

    $produses = Produse::create([
        'categoriis_id' => $request->categoriis_id,
        'title' => $request->title,
        'description' => $request->description,
        'price' => $request->price,
        'discount' => $request->discount ?? 0,
        'tickets' => $request->tickets,
        'tickets_sold' => 0,
    ]);

        if ($request->hasFile('images')){
            foreach (
                $request->file('images')
                as $image
            ){
                $path = $image->store(
                    'produse',
                    'public'
                );
                Img::create([
                    'produses_id' => $produses->id,
                    'image' => $path
                ]);
            }
        }
        return redirect('/admin/produse')
        ->with(
            'success',
            'Produs creata cu succes'
        );

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $produs = Produse::with([
            'images',
            'category'
        ])->findOrFail($id);

        return view(
            'admin.produse.show',
            compact('produs')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $produs = Produse::findOrFail($id);
    $categorii = categorii::all();

    return view(
        'admin.produse.edit',
        compact('produs', 'categorii')
    );
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $produs = Produse::findOrFail($id);

    $produs->update([
        'categoriis_id' => $request->categoriis_id,
        'title' => $request->title,
        'description' => $request->description,
        'price' => $request->price,
        'discount' => $request->discount ?? 0,
        'tickets' => $request->tickets,
    ]);

    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $path = $image->store('produse', 'public');

            Img::create([
                'produses_id' => $produs->id,
                'image' => $path,
            ]);
        }
    }

    return redirect('/admin/produse')
        ->with('success', 'Produs actualizat cu succes');
}
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $produs = Produse::with('images')->findOrFail($id);

    foreach ($produs->images as $image) {
        if (Storage::disk('public')->exists($image->image)) {
            Storage::disk('public')->delete($image->image);
        }

        $image->delete();
    }

    $produs->delete();

    return redirect('/admin/produse')
        ->with('success', 'Produsul a fost sters');
}
}
