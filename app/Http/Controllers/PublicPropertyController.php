<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PublicPropertyController extends Controller
{
    public function index()
    {
        $properties = Property::with(['photos', 'user'])->latest()->paginate(9);
        return view('home.houses', compact('properties'));
    }

    public function show(Property $property)
    {
        $property->load('photos', 'user'); // 'user' to show landlord if needed
        return view('public.properties.show', compact('property'));
    }
}
