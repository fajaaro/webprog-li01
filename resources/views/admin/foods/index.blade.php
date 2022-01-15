@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-2">Manage Fruits Page</h2>
        <div class="mb-4 text-end">
            <a href="{{ route('admin.foods.create') }}" class="btn btn-success">
                Create Fruit
            </a>
        </div>
        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach ($foods as $food)
                <div class="col">
                    <div class="card h-100">
                        @if (Str::contains($food->image_url, 'http'))
                            <img src="{{ $food->image_url }}" alt="food-photo" title="{{ $food->name }}"
                                class="card-img-top" style="height: 16rem;">
                            {{-- @else --}}
                            {{-- <img src="{{ $food->image_url }}" alt="food-photo" title="{{ $food->name }}"
                                class="card-img-top"> --}}
                        @endif
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $food->name }}</h5>
                            <p class="card-text">{{ $food->description }}</p>
                            <div
                                class="text-center d-flex justify-content-around card-footer bg-transparent border-success">
                                <a href="{{ route('admin.foods.edit', $food->id) }}" class="btn btn-primary">Update</a>
                                <form action="{{ route('admin.foods.destroy', $food->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
