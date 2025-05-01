@extends('layouts.modern')

@section('title', 'Browse Properties - EasyRent')

@section('page-content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Success Message -->
    @if(session('success'))
        <div class="mb-8 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
            <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.remove()">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <title>Close</title>
                    <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
                </svg>
            </button>
        </div>
    @endif

    <!-- Search Filters -->
    <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
        <form action="{{ route('properties.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                <select id="city" name="city" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="">All Cities</option>
                    @foreach($cities as $city)
                        <option value="{{ $city }}" {{ request('city') == $city ? 'selected' : '' }}>
                            {{ $city }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="min_price" class="block text-sm font-medium text-gray-700">Min Price</label>
                <input type="number" id="min_price" name="min_price" value="{{ request('min_price') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    placeholder="Min Price">
            </div>

            <div>
                <label for="max_price" class="block text-sm font-medium text-gray-700">Max Price</label>
                <input type="number" id="max_price" name="max_price" value="{{ request('max_price') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    placeholder="Max Price">
            </div>

            <div>
                <label for="rooms" class="block text-sm font-medium text-gray-700">Rooms</label>
                <select id="rooms" name="rooms" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="">Any</option>
                    @foreach(range(1, 5) as $room)
                        <option value="{{ $room }}" {{ request('rooms') == $room ? 'selected' : '' }}>
                            {{ $room }}+ Rooms
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="md:col-span-4 flex justify-end">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                    Apply Filters
                </button>
            </div>
        </form>
    </div>

    <!-- Results Count -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900">
            {{ $properties->total() }} Properties Found
        </h1>
        <div class="flex items-center space-x-4">
            @auth
            <a href="{{ route('properties.create') }}" 
                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                List New Property
            </a>
            @endauth
            <div class="flex items-center">
                <label for="sort" class="mr-2 text-sm text-gray-600">Sort by:</label>
                <select id="sort" name="sort" onchange="window.location.href = this.value"
                    class="rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="{{ request()->fullUrlWithQuery(['sort' => 'newest']) }}" 
                        {{ request('sort') == 'newest' ? 'selected' : '' }}>
                        Newest First
                    </option>
                    <option value="{{ request()->fullUrlWithQuery(['sort' => 'price_low']) }}"
                        {{ request('sort') == 'price_low' ? 'selected' : '' }}>
                        Price: Low to High
                    </option>
                    <option value="{{ request()->fullUrlWithQuery(['sort' => 'price_high']) }}"
                        {{ request('sort') == 'price_high' ? 'selected' : '' }}>
                        Price: High to Low
                    </option>
                </select>
            </div>
        </div>
    </div>

    <!-- Property Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($properties as $property)
            <div class="bg-white rounded-lg shadow-sm overflow-hidden transition-transform hover:scale-105">
                <a href="{{ route('properties.show', $property) }}" class="block">
                    <div class="relative pb-2/3">
                        <img class="absolute h-full w-full object-cover" 
                            src="{{ $property->photos->first()?->url ?? 'https://images.unsplash.com/photo-1564013799919-ab600027ffc6' }}" 
                            alt="{{ $property->title }}">
                        <div class="absolute top-4 right-4">
                            <span class="bg-blue-600 text-white px-3 py-1 rounded-full text-sm">
                                {{ $property->rooms }} Rooms
                            </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $property->title }}</h3>
                        <p class="text-gray-500 mb-4">{{ $property->address }}</p>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold text-blue-600">${{ number_format($property->price) }}</span>
                            @auth
                                @if($property->user_id === Auth::id())
                                    <div class="flex space-x-2">
                                        <a href="{{ route('properties.edit', $property) }}" 
                                            class="text-blue-600 hover:text-blue-800 font-medium">
                                            Edit
                                        </a>
                                        <form action="{{ route('properties.destroy', $property) }}" method="POST" 
                                            onsubmit="return confirm('Are you sure you want to delete this property?');"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 font-medium">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                @else
                                    <span class="text-blue-600 hover:text-blue-800 font-medium">View Details →</span>
                                @endif
                            @else
                                <span class="text-blue-600 hover:text-blue-800 font-medium">View Details →</span>
                            @endauth
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <div class="col-span-3 text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                        d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">No properties found</h3>
                <p class="mt-1 text-sm text-gray-500">Try adjusting your search filters.</p>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-8">
        {{ $properties->links() }}
    </div>
</div>
@endsection
