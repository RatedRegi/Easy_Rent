@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">My Properties</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @forelse($properties as $property)
        <div class="card mb-3">
            <div class="card-body">
                <h5>{{ $property->title }}</h5>
                <p>{{ $property->description }}</p>
                <p><strong>City:</strong> {{ $property->city }}</p>
                <p><strong>Rent:</strong> ${{ $property->price }}</p>

                <a href="{{ route('landlord.properties.edit', $property->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('landlord.properties.destroy', $property->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this property?')">Delete</button>
                </form>
            </div>
        </div>
    @empty
        <p>You haven’t added any properties yet.</p>
    @endforelse
</div>
@endsection
