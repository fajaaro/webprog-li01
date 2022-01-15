@extends('layouts.app')

@section('content')
    <div class="container">
        @include('flash')

        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach ($foods as $food)
                <div class="col">
                    <div class="card h-100">
                        <a href="{{ route('foods.show', $food->id) }}">
                            @if (Str::contains($food->image_url, 'http'))
                                <img src="{{ $food->image_url }}" alt="food-photo" title="{{ $food->name }}"
                                     class="card-img-top" style="height: 16rem;">
                            @else
                                <img src="/images/{{ $food->image_url }}" alt="food-photo" title="{{ $food->name }}"
                                     class="card-img-top" style="height: 16rem;">
                            @endif
                        </a>
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $food->name }}</h5>
                            <p class="card-text">{{ $food->description }}</p>
                            <p class="card-text">Harga Satuan: {{ formatRupiah($food->price) }}</p>
                        </div>
                        @auth
                            <div class="card-footer">
                                <form action="{{ route('set-cookie') }}" method="post">
                                    @csrf

                                    <input type="hidden" name="food_id" value="{{ $food->id }}">
                                    <button type="submit" class="btn btn-primary btn-sm">Add to Cart</button>
                                </form>
                            </div>
                        @endauth
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-4">{{ $foods->links() }}</div>
    </div>
@endsection
