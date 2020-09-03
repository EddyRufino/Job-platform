@extends('layouts.app')

@section('nav')
    @include('partials.navCategory')
@endsection

@section('content')
    <div class="my-10 bg-gray-100 p-10 shadow">
        <h1 class="text-xl text-gray-700 m-0">
            Categoría {{ $category->name }}
            <span class="font-bold">Vacantes</span>
        </h1>

        @include('partials.cardVacancy')
    </div>
@endsection