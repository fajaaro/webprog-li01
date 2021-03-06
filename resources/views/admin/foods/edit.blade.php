@extends('layouts.app')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fixed-top mt-4 position-fixed top-0 start-50 translate-middle-x"
            role="alert" style="max-width: 45%;">
            <p><b>There were errors in your input</b></p>
            <ul>
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('admin.foods.update', $food->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="fruitName" class="form-label fw-bold">Fruit Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ $food->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="fruitDescription" class="form-label fw-bold">Fruit Description</label>
                        <textarea class="form-control" name="description" id="fruitDescription" rows="3" required>{{ $food->description }}</textarea>
                        <div id="passwordHelpBlock" class="form-text mb-3">
                            Write a single sentence about the Fruit Description.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="fruitPrice" class="form-label fw-bold">Fruit Price</label>
                        <input type="text" name="price" class="form-control" id="fruitPrice" value="{{ $food->price }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="formFile" class="form-label fw-bold">Fruit Image</label>
                        <input class="form-control" type="file" name="image" id="formFile">
                        @if($food->image_url)
                            <p class="mt-3"><b>WARNING: </b>If you upload new fruit image, then this photo will be replaced.</p>
                            <img src="{{ getFoodImageUrl($food->image_url) }}" alt="food img" class="w-50">
                        @endif
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('admin.foods.index') }}">
                            <button class="btn btn-secondary me-md-2" type="button">Cancel</button>
                        </a>
                        <button class="btn btn-primary" type="submit">Update Fruit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
