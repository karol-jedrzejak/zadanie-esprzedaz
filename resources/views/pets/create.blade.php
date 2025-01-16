@extends('layouts.app')

@section('content')

<div class="card">
    <h5 class="card-header">Dodanie</h5>
    <div class="card-body">
        <form action="{{ route('pets.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- X-XSRF-TOKEN -->
            <div class="form-group mb-2">
                <label for="cat_id" class="mb-2">Category ID</label>
                <input type="number" class="form-control" name="cat_id" id="cat_id">
                @error('cat_id')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="cat_name" class="mb-2">Category Name</label>
                <input type="text" class="form-control" name="cat_name" id="cat_name">
                @error('cat_name')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="name" class="mb-2">Name</label>
                <input type="text" class="form-control" name="name" id="name">
                @error('name')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="photo_url" class="mb-2">Photo URL</label>
                <input type="text" class="form-control" name="photo_url" id="photo_url">
            </div>
            <div class="form-group mb-2">
                <label for="tags_id" class="mb-2">Tags ID</label>
                <input type="number" class="form-control" name="tags_id" id="tags_id">
                @error('tags_id')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="tags_name" class="mb-2">Tags Name</label>
                <input type="text" class="form-control" name="tags_name" id="tags_name">
                @error('tags_name')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="status" class="mb-2">Status</label>
                <select class="form-select" id="status" name="status">
                    @foreach ($status_types as $item)
                        <option value="{{$item}}">{{$item}}</option>
                    @endforeach
                </select>
            </div>
            <input type="submit" value="Dodaj" class="btn btn-success"/>
        </form>
    </div>
</div>

@endsection
