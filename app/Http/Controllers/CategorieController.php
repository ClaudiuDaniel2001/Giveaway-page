<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categorii;

class CategorieController extends Controller
{
    public function index(){
    $categorie = Categorii::with('produse.images')
    ->get();

    return view('welcome' , compact('categorii'));
    }

    public function show(Categorii $categorie){
        return view('categorie.show', compact('categorie'));

    }
}
