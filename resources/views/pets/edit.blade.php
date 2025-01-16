@extends('layouts.app')

@section('content')

<div class="card">
    <h5 class="card-header">Edycja</h5>
    <div class="card-body">
        <form action="{{ route('pets.update', $pet->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <input name="_method" type="hidden" value="PUT">
            <input name="id" type="hidden" value="{{$pet->id}}">
            <!-- X-XSRF-TOKEN -->
            <div class="form-group mb-2">
                <label for="name" class="mb-2">Name</label>
                <input type="text" class="form-control" name="name" id="name"
                value="{{ old('name', $pet->name ?? null) }}"
                >
                @error('name')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="cat_id" class="mb-2">Category ID</label>
                <input type="number" class="form-control" name="cat_id" id="cat_id"
                value="{{ old('cat_id', $pet->category->id ?? null) }}">
                @error('cat_id')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="cat_name" class="mb-2">Category Name</label>
                <input type="text" class="form-control" name="cat_name" id="cat_name"
                value="{{ old('cat_name', $pet->category->name ?? null) }}"
                >
                @error('cat_name')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            @foreach ($pet->photoUrls as $key => $item)
            <div class="form-group mb-2" id="photos{{$key}}">
                <label for="photo_url{{$key}}" class="mb-2">Photo URL [{{$key}}]</label>
                <input type="text" class="form-control" name="photo_url[{{$key}}]" id="photo_url{{$key}}"
                value="{{ old('photo_url.'.$key, $item ?? null) }}"
                >
                @error('photo_url.'.$key )
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            @endforeach
            @foreach ($pet->tags as $key => $tag)
            <div class="d-flex" id="tags_id{{$key}}">
                <div class="form-group mb-2 me-2">
                    <label for="tags_id{{$key}}" class="mb-2">Tags[{{$key}}] ID</label>
                    <input type="number" class="form-control" name="tags_id[{{$key}}]" id="tags_id{{$key}}"
                    value="{{ old('tags_id.'.$key, $tag->id ?? null) }}">
                    @error('tags_id[{{$key}}]')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-2 w-100">
                    <label for="tags_name{{$key}}" class="mb-2">Tags[{{$key}}] Name</label>
                    <input type="text" class="form-control" name="tags_name[{{$key}}]" id="tags_name{{$key}}"
                    value="{{ old('tags_name.'.$key, $tag->name ?? null) }}">
                    @error('tags_name[{{$key}}]')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            @endforeach
            <div class="form-group mb-2">
                <label for="status" class="mb-2">Status</label>
                <select class="form-select" id="status" name="status">
                    @foreach ($status_types as $item)
                        <option @if(old('status',$pet->status) == $item) selected="selected" @endif value="{{$item}}">{{$item}}</option>
                    @endforeach
                </select>
            </div>
            <input type="submit" value="Zmień" class="btn btn-success"/>
        </form>
    </div>
</div>

@endsection
