@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
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
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
