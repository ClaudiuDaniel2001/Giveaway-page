<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\categorii;

class CategorieController extends Controller
{
    public function index(){
        $categorii = categorii::latest()->get();

        return view(
            'admin.categorii.index',
            compact('categorii')
        );
    }
    public function create(){
        return view(
            'admin.categorii.create'
        );
    }
    public function edit(){
        $categorii = categorii::all();
        return view(
            'admin.categorii.edit',
            compact('categorii')
        );

    }
  
    public function store(Request $request){
        $request->validate([
            'nameCategory' => 'required|max:255'
        ]);
        categorii::create([
            'nameCategory' => $request->nameCategory
        ]);
        return redirect('/admin/categorii')
        ->with(
            'success',
            'Categorie creata cu succes'
        );
    }
    public function destroy($id)
{
    categorii::findOrFail($id)->delete();

    return redirect()
        ->route('categorii.edit')
        ->with('success', 'Categorie stearsa cu succes');
}
}