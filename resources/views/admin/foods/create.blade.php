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
                {{-- form create fruit --}}
                <form action="{{ route('admin.foods.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="fruitName" class="form-label fw-bold">Fruit Name</label>
                        <input type="text" name="name" class="form-control" id="fruitName" required>
                    </div>
                    <div class="mb-3">
                        <label for="fruitDescription" class="form-label fw-bold">Fruit Description</label>
                        <textarea class="form-control" name="description" id="fruitDescription" rows="3" required></textarea>
                        <div id="passwordHelpBlock" class="form-text mb-3">
                            Write a single sentence about the Fruit Description.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="fruitPrice" class="form-label fw-bold">Fruit Price</label>
                        <input type="number" name="price" class="form-control" id="fruitPrice" min="0" required>
                    </div>

                    <div class="mb-3">
                        <label for="formFile" class="form-label fw-bold">Fruit Image</label>
                        <input class="form-control" type="file" name="image" id="formFile" required>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('admin.foods.index') }}">
                            <button class="btn btn-secondary me-md-2" type="button">Cancel</button>
                        </a>
                        <button class="btn btn-primary" type="submit">Create</button>
                    </div>
                </form>
                {{-- end create fruit form --}}
            </div>
        </div>
    </div>
@endsection
