@extends('layouts.app')

@section('content')
    <div class="container">
        @include('flash')

        <form action="{{ route('transactions.checkout') }}" method="post">
            @csrf

            <div class="row">
                <div class="col-12">
                    <label for="shipping_address">Shipping Address</label>
                    <textarea name="shipping_address" id="shipping_address" class="form-control mt-2 @error('shipping_address') is-invalid @enderror" cols="30" rows="3" required>{{ old('shipping_address', Auth::user()->address) }}</textarea>

                    {!! errorMessage($errors, 'shipping_address') !!}
                </div>

                <div class="col-12 mt-2">
                    <button type="submit" class="btn btn-primary">Checkout Now!</button>
                </div>
            </div>
        </form>
    </div>
@endsection
