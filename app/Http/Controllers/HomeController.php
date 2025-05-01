<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProperties = Property::with('photos')
            ->latest()
            ->take(6)
            ->get();

        return view('home.modern', compact('featuredProperties'));
    }
}
