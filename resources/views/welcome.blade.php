@extends('layouts.app')

@section('content')

<div class="card">
    <h5 class="card-header">Powitanie</h5>
    <div class="card-body">
        <p class="card-text">Witam na stronie powitalnej. Zadadnie przygotował Karol Jędrzejak.</p>
        <div>Lista dostępnych opcji
            <ul>
                <li>Przycisk Dodaj - Dodawanie nowego peta,</li>
                <li>Pole numeru [domyślnie 1]- pozwala wpisać numer peta z którym chcemy wykonac operację,</li>
                <li>Zobacz - pozwala podejrzeć peta o wpisanym przez nas numerze,</li>
                <li>Edycja - edytuje peta o wpisanym przez nas numerze,</li>
                <li>Usuń - usuwa peta o wpisanym przez nas numerze,</li>
                <li>Pole wyboru statusu - pozwala wybrać status wg. którego chcemy filtrować pety,</li>
                <li>Wyszukaj - pokazuje peta w wybranym przez nas statusem,</li>
            </ul>
        </div>
    </div>
</div>

@endsection
