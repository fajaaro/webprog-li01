@extends('layouts.app')

@section('content')
    <div class="container-fluid ">
        <div class="container-fluid row justify-content-center">
            <div class="col-sm-6">
                @include('flash')

                <h1 class="py-4">Shopping Cart</h1>
                <ul class="list-group list-group-flush rounded">
                    @php
                        $totalPrice = 0;
                    @endphp

                    @forelse($foods as $food)
                        @php
                            $totalPrice += $food->price;
                        @endphp

                        <li class="card">
                            <div class="row g-0 flex-wrap p-3">
                                <div class="col-12">
                                    <div class="d-flex justify-content-between">
                                        <img src="{{ getFoodImageUrl($food->image_url) }}" class="img-fluid rounded-start col-md-3 w-25" alt="food-logo">
                                        <form action="{{ route('delete-cookie') }}" method="post">
                                            @csrf
                                            @method('delete')

                                            <input type="hidden" name="food_id" value="{{ $food->id }}">

                                            <button type="submit"
                                                    class="btn btn-danger d-flex align-items-center justify-content-between">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                     fill="currentColor" class="bi bi-trash me-1" viewBox="0 0 16 16">
                                                    <path
                                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                    <path fill-rule="evenodd"
                                                          d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-11">
                                    <div class="card-body">
                                        <h5 class="card-title d-flex align-items-baseline">
                                        <span class="justify-content-center">
                                            {{ $food->name }}
                                        </span>
                                        </h5>
                                        <p class="card-text">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                 fill="currentColor" class="bi bi-tag" viewBox="0 0 16 16">
                                                <path
                                                    d="M6 4.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm-1 0a.5.5 0 1 0-1 0 .5.5 0 0 0 1 0z" />
                                                <path
                                                    d="M2 1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 1 6.586V2a1 1 0 0 1 1-1zm0 5.586 7 7L13.586 9l-7-7H2v4.586z" />
                                            </svg>
                                            <small class="text-muted">{{ formatRupiah($food->price) }}</small>
                                        <p class="card-text">
                                    </div>
                                </div>
                            </div>
                        </li>
                    @empty
                        <p>There is no food in your carts.</p>
                    @endforelse
                </ul>

                <li class="card my-2">
                    <div class="row g-0 flex-wrap p-1">
                        <div class="card-body">
                            <p class="card-title d-flex align-items-baseline">
                                <span class="justify-content-center">
                                    Total Price
                                </span>
                                <span class="fw-bold justify-content-center ms-2 fs-5">
                                    {{ formatRupiah($totalPrice) }}
                                </span>
                            </p>
                            {{-- checkout button --}}
                            <div class="col-md-1 d-flex align-items-center"> <button type="button"
                                    class="btn btn-primary d-flex align-items-center justify-content-between mt-2" @if($totalPrice == 0) disabled @endif>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-truck" viewBox="0 0 16 16">
                                        <path
                                            d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                    </svg>
                                    <a href="{{ route('transactions.checkout') }}" class="text-decoration-none">
                                        <span class="ms-2 text-white">
                                            Checkout
                                        </span>
                                    </a>
                                </button>
                            </div>
                        </div>
                    </div>
                </li>
            </div>
        </div>
    </div>
    @endsection
