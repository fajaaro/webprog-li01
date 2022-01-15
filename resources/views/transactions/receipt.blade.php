@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid row justify-content-center">
            <div class="col-sm-6">
                <h1 class="mb-3 py-3">Transaction Receipt</h1>
                <ul class="list-group list-group-flush rounded">
                    <li class="card p-2">
                        <span class="fs-5 mx-3">
                            Transaction ID: {{ $transaction->key }}
                        </span>
                        <span class="fs-5 mx-3">
                            Shipping Address: {{ $transaction->shipping_address }}
                        </span>
                        <span class="fs-5 mx-3">
                            Order Time: {{ $transaction->created_at }}
                        </span>
                    </li>
                    @php
                        $totalPrice = 0;
                    @endphp
                    @foreach($transaction->details as $detail)
                        @php
                            $totalPrice += $detail->price;
                        @endphp
                        <li class="card">
                            <div class="row g-0 flex-wrap p-3">
                                <img src="{{ getFoodImageUrl($detail->food->image_url) }}" class="img-fluid rounded-start col-md-3 w-25" alt="food-logo">
                                {{-- card info --}}
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title d-flex align-items-baseline">
                                            <span class="justify-content-center">
                                                {{ $detail->food->name }}
                                            </span>
                                        </h5>
                                        <p class="card-text">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                                class="bi bi-tag" viewBox="0 0 16 16">
                                                <path
                                                    d="M6 4.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm-1 0a.5.5 0 1 0-1 0 .5.5 0 0 0 1 0z" />
                                                <path
                                                    d="M2 1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 1 6.586V2a1 1 0 0 1 1-1zm0 5.586 7 7L13.586 9l-7-7H2v4.586z" />
                                            </svg>
                                            <small class="text-muted">{{ formatRupiah($detail->price) }}</small>
                                        <p class="card-text">
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                    <li class="card">
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
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
