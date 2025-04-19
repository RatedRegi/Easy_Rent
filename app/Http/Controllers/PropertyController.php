<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    public function create()
    {
        return view('landlord.properties.create');
    }

    public function index()
{
    $properties = Property::where('user_id', Auth::user()->id)->latest()->get();
    return view('landlord.properties_index', compact('properties'));
}

    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required',
            'city' => 'required',
            'address' => 'required',
            'price' => 'required|numeric',
            'rooms' => 'required|integer',
            'photos.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        $property = Property::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'city' => $request->city,
            'address' => $request->address,
            'price' => $request->price,
            'rooms' => $request->rooms,
        ]);
    
        // Save photos
        if($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('properties', 'public');
                $property->photos()->create(['path' => $path]);
            }
        }
    
        return redirect()->route('landlord.dashboard')->with('success', 'Property added successfully!');
    }
    
}
