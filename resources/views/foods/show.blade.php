@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="m-3">Detail Fruits</h2>
        <div class="card mb-3 w-100">
            <div class="row g-0 d-flex align-items-center">
                <div class="col-md-5">
                    @if (Str::contains($food->image_url, 'http'))
                        <img src="{{ $food->image_url }}" alt="food-photo" title="{{ $food->name }}"
                            class="img-fluid rounded-start">
                    @else
                        <img src="/images/{{ $food->image_url }}" alt="food-photo" title="{{ $food->name }}"
                            class="img-fluid rounded-star">
                    @endif
                </div>
                <div class="col-md-7">
                    <div class="card-body">
                        <h3 class="card-title">{{ $food->name }}</h3>
                        <span class="fw-bold">Food description: </span>
                        <p class="card-text">{{ $food->description }}</p>
                        <p class="card-text">
                            <span class="fw-bold">Price : </span> Rp.{{ $food->price }}
                        </p>
                        <p class="card-text">
                            <span class="fw-bold">Stock :</span>
                            {{ $food->stock }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
