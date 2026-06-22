<?php

namespace App\Http\Controllers;
use App\Models\Produse;

use Illuminate\Http\Request;

class ProduseController extends Controller
{
    public function index()
    {
        $produses = Produse::with('images')
        ->latest()
        ->get();

        return view(
            'produse.index',
            compact('produse')
        );
    }

    public function show($id)
{
    $produs = Produse::with('images')->findOrFail($id);

    return view('produse.show', compact('produs'));
}
}
