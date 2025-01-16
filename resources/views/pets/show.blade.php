@extends('layouts.app')

@section('content')

<div class="card">
    <h5 class="card-header">Podgląd</h5>
    <div class="card-body">
        @if($error)
        <div class="text-danger">{{$error}}</div>
        @endif
        @if($pet)
        <ul>
            <li>PET ID = {{$pet->id}}</li>
            <li>PET category:
                @if(isset($pet->category))
                <ul>
                    <li>id= @if(isset($pet->category->id)){{$pet->category->id}}@endif</li>
                    <li>name= @if(isset($pet->category->name)){{$pet->category->name}}@endif</li>
                </ul>
                @endif
            </li>
            <li>PET name = @if(isset($pet->name)){{$pet->name}}@endif</li>
            <li>PET photoUrls:
                <ul>
                    @foreach ($pet->photoUrls as $key => $item)
                    <li>@if(isset($key)){{$key}}@endif - @if(isset($item)){{$item}}@endif</li>
                    @endforeach
                </ul>
            </li>
            <li>PET tags:
                <ul>
                    @foreach ($pet->tags as $key => $item)
                    <li>@if(isset($item->id)){{$item->id}}@endif - @if(isset($item->name)){{$item->name}}@endif</li>
                    @endforeach
                </ul>
            </li>
            <li>PET status = @if(isset($pet->status)){{$pet->status}}@endif</li>
        </ul>
        @endif
    </div>
</div>

@endsection
