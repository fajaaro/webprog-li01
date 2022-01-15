@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- form update fruit --}}
            <form action="{{ route('admin.foods.update') }}" method="post"
            enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="fruitName" class="form-label fw-bold">Fruit Name</label>
                    <input type="text" name="fruitName" class="form-control" id="fruitName"
                        placeholder="">
                </div>
                <div class="mb-3">
                    <label for="fruitDescription" class="form-label fw-bold">Fruit Description</label>
                    <textarea class="form-control" name="fruitDescription" id="fruitDescription" rows="3"
                        placeholder=""></textarea>
                    <div id="passwordHelpBlock" class="form-text mb-3">
                        Write a single sentence about the Fruit Description.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="fruitPrice" class="form-label fw-bold">Fruit Price</label>
                    <input type="text" name="fruitPrice" class="form-control" id="fruitPrice"
                        placeholder="">
                </div>
                <div class="mb-3">
                    <label for="fruitStock" class="form-label fw-bold">Fruit Stock</label>
                    <input type="text" name="fruitStock" class="form-control" id="fruitStock"
                        placeholder="">
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label fw-bold">Fruit Image</label>
                    <input class="form-control" type="file" name="gameCoverImage" id="formFile">
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{ route('admin.foods.index') }}">
                        <button class="btn btn-secondary me-md-2" type="button">Cancel</button>
                    </a>
                    <button class="btn btn-primary" type="submit">Update Fruit</button>
                </div>
            </form>
            {{-- end update fruit form --}}
        </div>
    </div>
</div>
@endsection
