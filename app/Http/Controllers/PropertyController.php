<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $query = Property::with('photos');

        // Apply filters
        if ($request->city) {
            $query->where('city', $request->city);
        }

        if ($request->min_price) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->max_price) {
            $query->where('price', '<=', $request->max_price);
        }

        if ($request->rooms) {
            $query->where('rooms', '>=', $request->rooms);
        }

        // Apply sorting
        switch ($request->sort) {
            case 'price_low':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('price', 'desc');
                break;
            default:
                $query->latest();
                break;
        }

        $properties = $query->paginate(9)->withQueryString();
        $cities = Property::distinct()->pluck('city');

        return view('properties.index', compact('properties', 'cities'));
    }

    public function create()
    {
        return view('properties.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'rooms' => 'required|integer|min:1',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $property = Property::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'city' => $request->city,
            'address' => $request->address,
            'price' => $request->price,
            'rooms' => $request->rooms,
        ]);

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('property-photos', 'public');
                PropertyPhoto::create([
                    'property_id' => $property->id,
                    'path' => $path
                ]);
            }
        }

        return redirect()->route('properties.index')
            ->with('success', 'Property listed successfully! Your property is now visible to potential renters.');
    }

    public function show(Property $property)
    {
        $property->load('photos');
        return view('properties.show', compact('property'));
    }

    public function edit(Property $property)
    {
        if ($property->user_id !== Auth::id()) {
            abort(403);
        }

        return view('properties.edit', compact('property'));
    }

    public function update(Request $request, Property $property)
    {
        if ($property->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'rooms' => 'required|integer|min:1',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $property->update([
            'title' => $request->title,
            'description' => $request->description,
            'city' => $request->city,
            'address' => $request->address,
            'price' => $request->price,
            'rooms' => $request->rooms,
        ]);

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('property-photos', 'public');
                PropertyPhoto::create([
                    'property_id' => $property->id,
                    'path' => $path
                ]);
            }
        }

        return redirect()->route('properties.show', $property)
            ->with('success', 'Property updated successfully! All changes have been saved.');
    }

    public function destroy(Property $property)
    {
        if ($property->user_id !== Auth::id()) {
            abort(403);
        }

        // Delete all photos first
        foreach ($property->photos as $photo) {
            Storage::delete('public/' . $photo->path);
            $photo->delete();
        }

        $property->delete();

        return redirect()->route('properties.index')
            ->with('success', 'Property deleted successfully.');
    }

    public function destroyPhoto(PropertyPhoto $photo)
    {
        if ($photo->property->user_id !== Auth::id()) {
            abort(403);
        }

        // Delete file
        Storage::delete('public/' . $photo->path);

        // Delete DB record
        $photo->delete();

        return back()->with('success', 'Photo deleted successfully.');
    }
}
