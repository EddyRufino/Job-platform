@extends('layouts.app')

@section('nav')
    @include('partials.navCategory')
@endsection

@section('content')
    <div class="my-10 bg-gray-100 p-10 shadow">
        <h1 class="text-xl text-gray-700 m-0">
            <span class="font-bold">Resultado de la busqueda</span>
        </h1>
        @if (count($vacancies) > 0)
            @include('partials.cardVacancy')
        @else
            <h1>No hay vacantes</h1>
        @endif
        
    </div>
@endsection