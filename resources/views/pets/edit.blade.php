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

            {{--
            https://laravel.io/forum/04-23-2015-validation-form-with-dynamic-inputs

            <div class="mb-3 col-12">
                <label for="company" class="form-label">Firma</label>
                <select class="form-select" id="company" name="company" onchange="updateEmployeesList();" required>
                        <option value=''>--- Wybierz Firmę ---</option>
                    @foreach ($companies as $company)
                        <option
                        @if(old('company') == $company->id) selected='selected' @endif
                        value={{$company->id}}>{{$company->name_short}} [{{$company->name_complete}}]</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3 col-10" id="employee_col_0">
                <label for="employee_0" id="employee_label_0" class="form-label">Pracownik 1</label>
                <select class="form-select" id="employee_0" name="employee_[0]" required>
                    <option value=''>--- Wybierz Pracownika ---</option>
                    @foreach ($employees as $employee)
                        <option
                        @if(old('employee_[0]') == $employee->id) selected='selected' @endif
                        value={{$employee->id}} data-company={{$employee->company}}>{{$employee->name}} {{$employee->surname}}</option>
                    @endforeach
                </select>
            </div>



            <div class="mb-3 col-2">
                <label for="employee_add" class="form-label">&nbsp;</label>
                <button id="employee_add" type="button" class="btn btn-primary w-100" onclick="addEmployee();">Dodaj</button>
            </div>

            <div class="mb-3 col-2" id="employess_col_del_0" hidden>
                <label for="employee_del_0" id="employee_del_label_0" class="form-label">&nbsp;</label>
                <button id="employee_del_0" type="button" class="btn btn-danger w-100" onclick="">Usuń</button>
            </div>
            --}}



            <div class="form-group mb-2">
                <label for="cat_id" class="mb-2">Category ID</label>
                <input type="number" class="form-control" name="cat_id" id="cat_id" value="{{$pet->category->id}}">
                @error('cat_id')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="cat_name" class="mb-2">Category Name</label>
                <input type="text" class="form-control" name="cat_name" id="cat_name" value="{{$pet->category->name}}">
                @error('cat_name')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="name" class="mb-2">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{$pet->name}}">
                @error('name')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="photo_url" class="mb-2">Photo URL</label>
                <input type="text" class="form-control" name="photo_url" id="photo_url" @if($pet->photoUrls) value="{{ $pet->photoUrls[0]}}" @else value="" @endif>
            </div>
            <div class="form-group mb-2">
                <label for="tags_id" class="mb-2">Tags ID</label>
                <input type="number" class="form-control" name="tags_id" id="tags_id" value="{{$pet->tags[0]->id}}">
                @error('tags_id')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="tags_name" class="mb-2">Tags Name</label>
                <input type="text" class="form-control" name="tags_name" id="tags_name" value="{{$pet->tags[0]->name}}">
                @error('tags_name')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="status" class="mb-2">Status</label>
                <select class="form-select" id="status" name="status">
                    @foreach ($status_types as $item)
                        <option @if($pet->status == $item) selected="selected" @endif value="{{$item}}">{{$item}}</option>
                    @endforeach
                </select>
            </div>
            <input type="submit" value="Zmień" class="btn btn-success"/>
        </form>
    </div>
</div>

@endsection
