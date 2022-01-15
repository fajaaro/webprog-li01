@extends('layouts.app')

@section('content')
    <div class="container">
        @include('flash')
        <h2 class="m-3">Detail Fruits</h2>
        <div class="card mb-3 w-100">
            <div class="row g-0 d-flex align-items-center">
                <div class="col-md-5">
                    <img src="{{ getFoodImageUrl($food->image_url) }}" alt="food-photo" title="{{ $food->name }}" class="img-fluid rounded-start">
                </div>
                <div class="col-md-7">
                    <div class="card-body">
                        <h3 class="card-title">{{ $food->name }}</h3>
                        <span class="fw-bold">Food Description: </span>
                        <p class="card-text">{{ $food->description }}</p>
                        <p class="card-text">
                            <span class="fw-bold">Price : </span> {{ formatRupiah($food->price) }}
                        </p>
                        @auth
                            <form action="{{ route('set-cookie') }}" method="post">
                                @csrf

                                <input type="hidden" name="food_id" value="{{ $food->id }}">
                                <button type="submit" class="btn btn-primary btn-sm">Add to Cart</button>
                            </form>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
