<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyMessage;
use Illuminate\Http\Request;

class PropertyMessageController extends Controller
{
    public function store(Request $request, Property $property)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string|max:1000',
        ]);

        $message = PropertyMessage::create([
            'property_id' => $property->id,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'message' => $validated['message'],
        ]);

        // TODO: Send email notification to landlord

        return redirect()->back()
            ->with('success', 'Your message has been sent to the landlord. They will contact you soon!');
    }
}
