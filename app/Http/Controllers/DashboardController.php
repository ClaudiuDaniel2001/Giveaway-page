<?php

namespace App\Http\Controllers;

use App\Models\categorii;

class DashboardController extends Controller
{
    public function index()
    {
        $categorii = categorii::with('produse.images')->get();

return view('dashboard', compact('categorii'));
    }
}
