@extends('layouts.app')

@section('content')

<div class="card">
    <h5 class="card-header">Podgląd</h5>
    <div class="card-body">
        <table class="table text-break">
            <thead>
                <tr>
                    <th scope="col" style="min-width:100px;">id</th>
                    <th scope="col" style="min-width:90px;"></th>
                    <th scope="col" style="min-width:60px;"></th>
                    <th scope="col" style="min-width:100px;">category</th>
                    <th scope="col" style="min-width:100px;">name</th>
                    <th scope="col" style="min-width:100px;">photoUrls</th>
                    <th scope="col" style="min-width:100px;">tags</th>
                    <th scope="col" style="min-width:100px;">status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pets as $pet)
                <tr>
                    <th>
                        <a href="{{route('pets.show', ['pet' => $pet->id])}}">{{$pet->id}}</a>
                    </th>
                    <th>
                        <a href="{{route('pets.edit', ['pet' => $pet->id])}}" class="btn btn-info mt-2">Edycja</a>
                    </th>
                    <th>
                        <form action="{{ route('pets.destroy', ['pet' => $pet->id]) }}" method="post" enctype="multipart/form-data" class="mt-2">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <input name="id" type="hidden" value="{{ $pet->id}}">
                            <input type="submit" value="Usuń" class="btn btn-danger"/>
                        </form>
                    </th>
            @if(isset($pet->category))
            <th>
                @if(isset($pet->category->id))
                    {{$pet->category->id}}
                @endif
                -
                @if(isset($pet->category->name))
                    {{$pet->category->name}}
                @endif
                </th>
            @else
                    <th></th>
            @endif
            @if(isset($pet->name))
                    <th>{{$pet->name}}</th>
            @else
                    <th></th>
            @endif
                    <th>
                        @foreach ($pet->photoUrls as $key => $item)
                        <div>@if(isset($key)){{$key}}@endif - @if(isset($item)){{$item}}@endif</div>
                        @endforeach
                    </th>
                    <th>
                        @foreach ($pet->tags as $key => $item)
                        <div>@if(isset($item->id)){{$item->id}}@endif - @if(isset($item->name)){{$item->name}}@endif</div>
                        @endforeach
                    </th>
                    @if(isset($pet->status))
                    <th>{{$pet->status}}</th>
                    @else
                    <th></th>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
