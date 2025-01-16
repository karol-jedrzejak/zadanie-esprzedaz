@extends('layouts.app')

@section('content')

<div class="card">
    <h5 class="card-header">Dodanie</h5>
    <div class="card-body">
        <form action="{{ route('pets.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- X-XSRF-TOKEN -->
            <div class="form-group mb-2">
                <label for="name" class="mb-2">Name</label>
                <input type="text" class="form-control" name="name" id="name"
                value="{{ old('name', null) }}">
                @error('name')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="cat_id" class="mb-2">Category ID</label>
                <input type="number" class="form-control" name="cat_id" id="cat_id"
                value="{{ old('cat_id', null) }}">
                @error('cat_id')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="cat_name" class="mb-2">Category Name</label>
                <input type="text" class="form-control" name="cat_name" id="cat_name"
                value="{{ old('cat_name', null) }}">
                @error('cat_name')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="photo_url" class="mb-2">Photo URL</label>
                <input type="text" class="form-control" name="photo_url[0]" id="photo_url"
                value="{{ old('photo_url.0',null) }}">
                @error('photo_url.0')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="tags_id" class="mb-2">Tags ID</label>
                <input type="number" class="form-control" name="tags_id[0]" id="tags_id"
                value="{{ old('tags_id.0',null) }}">
                @error('tags_id.0')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="tags_name" class="mb-2">Tags Name</label>
                <input type="text" class="form-control" name="tags_name[0]" id="tags_name"
                value="{{ old('tags_name.0',null) }}">
                @error('tags_name.0')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="status" class="mb-2">Status</label>
                <select class="form-select" id="status" name="status">
                    @foreach ($status_types as $item)
                        <option value="{{$item}}" @if(old('status',null) == $item) selected="selected" @endif>{{$item}}</option>
                    @endforeach
                </select>
            </div>
            <input type="submit" value="Dodaj" class="btn btn-success"/>
        </form>
    </div>
</div>

@endsection
