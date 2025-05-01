@extends('layouts.modern')

@section('title', 'EasyRent - Find Your Perfect Home')

@section('page-content')
<!-- Hero Section with Video Background -->
<div class="relative h-[600px] overflow-hidden">
    <video autoplay loop muted playsinline class="absolute w-full h-full object-cover">
        <source src="https://assets.mixkit.co/videos/preview/mixkit-living-room-with-a-modern-tv-setup-4925-large.mp4" type="video/mp4">
    </video>
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="relative h-full flex items-center justify-center text-center">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold text-white mb-8">
                Find Your Perfect Home
            </h1>
            <p class="text-xl sm:text-2xl text-white mb-12">
                Discover the best rental properties in your area
            </p>
            
            <!-- Search Form -->
            <form action="{{ route('properties.index') }}" method="GET" class="max-w-3xl mx-auto">
                <div class="flex flex-col sm:flex-row gap-4">
                    <div class="flex-1">
                        <input type="text" name="city" placeholder="Enter city or location" 
                            class="w-full px-6 py-4 rounded-lg text-lg focus:ring-2 focus:ring-blue-500">
                    </div>
                    <button type="submit" class="bg-blue-600 text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-blue-700 transition-colors">
                        Search
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Featured Properties Section -->
<div class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-900 mb-8">Featured Properties</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($featuredProperties as $property)
            <div class="bg-white rounded-lg shadow-sm overflow-hidden transition-transform hover:scale-105">
                <div class="relative pb-2/3">
                    <img class="absolute h-full w-full object-cover" src="{{ $property->photos->first()?->url ?? 'https://images.unsplash.com/photo-1564013799919-ab600027ffc6' }}" alt="{{ $property->title }}">
                    <div class="absolute top-4 right-4">
                        <span class="bg-blue-600 text-white px-3 py-1 rounded-full text-sm">
                            {{ $property->rooms }} Rooms
                        </span>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $property->title }}</h3>
                    <p class="text-gray-500 mb-4">{{ $property->address }}, {{ $property->city }}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-2xl font-bold text-blue-600">${{ number_format($property->price) }}</span>
                        <a href="{{ route('properties.show', $property) }}" class="text-blue-600 hover:text-blue-800 font-medium">
                            View Details →
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <p>No featured properties found.</p>
            @endforelse
        </div>
    </div>
</div>

<!-- Why Choose Us Section -->
<div class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-900 text-center mb-12">Why Choose EasyRent</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="bg-blue-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Easy Search</h3>
                <p class="text-gray-600">Find your perfect rental property with our powerful search tools.</p>
            </div>
            <div class="text-center">
                <div class="bg-blue-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Secure Platform</h3>
                <p class="text-gray-600">Your data and transactions are always protected.</p>
            </div>
            <div class="text-center">
                <div class="bg-blue-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Fast Process</h3>
                <p class="text-gray-600">Quick and efficient rental process from start to finish.</p>
            </div>
        </div>
    </div>
</div>

<!-- Call to Action -->
<div class="bg-blue-600 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-white mb-4">Ready to Find Your New Home?</h2>
        <p class="text-xl text-blue-100 mb-8">Join thousands of happy renters who found their perfect home with us.</p>
        <a href="{{ route('properties.index') }}" class="inline-block bg-white text-blue-600 px-8 py-4 rounded-lg text-lg font-semibold hover:bg-gray-100 transition-colors">
            Browse Properties
        </a>
    </div>
</div>
@endsection
