@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid row justify-content-center">
            <div class="col-sm-6">
                <h1 class="mb-3 py-3">Transaction Receipt</h1>
                <ul class="list-group list-group-flush rounded">
                    <li class="card p-2">
                        <span class="fs-5 mx-3">
                            Transaction ID:
                        </span>
                    </li>
                    {{-- @foreach () --}}
                        <li class="card">
                            <div class="row g-0 flex-wrap p-3">
                                {{-- foto buah kalau pake link dan local --}}
                                {{-- @if (Str::contains(, 'http'))
                                    <img src="" class="img-fluid rounded-start col-md-3"
                                        style="width: 250px; height: 120px;" alt="game-logo">
                                @else
                                    <img src="{{ asset('storage/' . ) }}"
                                        style="width: 250px; height: 120px;" class="img-fluid rounded-start col-md-3"
                                        alt="game-logo">
                                @endif --}}
                                {{-- card info --}}
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title d-flex align-items-baseline">
                                            <span class="justify-content-center">
                                                nama buah
                                            </span>
                                            <span
                                                class="bg-warning px-1 pb-1 fs-6 text-white rounded-pill justify-content-center ms-2">
                                                stok buah
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
                                            <small class="text-muted">Rp. harga total per buah</small>
                                        <p class="card-text">
                                    </div>
                                </div>
                            </div>
                        </li>
                    {{-- @endforeach --}}
                    <li class="card">
                        <div class="row g-0 flex-wrap p-1">
                            <div class="card-body">
                                <p class="card-title d-flex align-items-baseline">
                                    <span class="justify-content-center">
                                        Total Price
                                    </span>
                                    <span class="fw-bold justify-content-center ms-2 fs-5">
                                        Rp. ini total harga semua
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
