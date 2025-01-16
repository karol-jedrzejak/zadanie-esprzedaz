<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Scripts -->
        @vite(['resources/scss/app.scss', 'resources/js/app.js'])

        <title>{{ $page_title }}</title>

    </head>
    <body>
        <nav class="navbar navbar-expand-sm bg-body-tertiary">
            <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <h1 class="nav-item me-3">PET</h1>
                <ul class="navbar-nav">
                    <li class="nav-item me-3 ">
                        <a class="btn btn-success" href="{{ route('pets.create') }}">Dodaj</a>
                    </li>
                    <li class="nav-item">
                        <div class="form-group">
                            <input type="number" onchange="urlchange()" class="form-control" id="link_id" value="{{$id}}" placeholder="Wpisz ID">
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="link_show" href="{{ route('pets.show', ['pet' => $id]) }}">Zobacz</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pets.edit', ['pet' => $id]) }}">Edycja</a>
                    </li>
                    <li class="nav-item me-5">
                        <form action="{{ route('pets.destroy', ['pet' => $id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <input type="submit" value="Usuń" class="btn btn-danger"/>
                        </form>
                    </li>


                    <form action="{{ route('petsbystatus') }}" class="d-flex" method="post" enctype="multipart/form-data">
                        @csrf
                    <li class="nav-item me-1">
                        <select class="form-select" id="status_select" name="status_select">
                            @foreach ($status_types as $item)
                                <option value="{{$item}}">{{$item}}</option>
                            @endforeach
                        </select>
                    </li>
                    <li class="nav-item me-2">
                        <input type="submit" value="Wyszukaj" class="btn btn-primary"/>
                    </li>
                    </form>

                </ul>

                @vite(['resources/js/urlchange.js'])
            </div>
            </div>
        </nav>
        <main>

            @if ($message = Session::get('success'))
                    <div class="container-fluid">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" style="width:1rem" class="mb-1 me-1">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" fill="green"/>
                            </svg>
                            <strong>{{ $message }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
            @endif

            @if ($message = Session::get('info'))
                    <div class="container-fluid">
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" style="width:1rem" class="mb-1 me-1">
                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" fill="blue"/>
                            </svg>
                            <strong>{{ $message }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
            @endif

            @if ($message = Session::get('warning'))
                    <div class="container-fluid">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" style="width:1rem" class="mb-1 me-1">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" fill="orange"/>
                            </svg>
                            <strong>{{ $message }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
            @endif

            @if ($message = Session::get('error'))
                    <div class="container-fluid">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" style="width:1rem" class="mb-1 me-1">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" fill="red"/>
                            </svg>
                            <strong>{{ $message }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
            @endif
            <div class="p-3">
                @yield('content')
            </div>
            </main>
    </body>
</html>
