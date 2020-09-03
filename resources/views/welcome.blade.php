@extends('layouts.app')

@section('nav')
    @include('partials.navCategory')
@endsection

@section('content')
    <div class="flex flex-col lg:flex-row shadow bg-white">
        <div class="lg:w-1/2 px-8 lg:px-12 py-12 lg:py-24">
            <p class="text-xl text-gray-700">
                dev<span class="font-bold">Jobs</span>
            </p>

            <h1 class="mt-2 sm:mt-4 text-2xl font-bold text-gray-700 leading-tight">
                Encuentra trabajo remoto
                <span class="text-teal-500 block">Para desarrolladores y diseñadores web</span>
            </h1>

            @include('partials.searche')
        </div>

        <div class="block lg:w-1/2">
            <img class="inset-0 h-full w-full object-cover" src="{{ asset('img/4321.jpg') }}" alt="DevJobs">
        </div>
    </div>

    <div class="my-10 bg-gray-100 p-10 shadow">
        <h1 class="text-xl text-gray-700 m-0">
            Nuevas
            <span class="font-bold">Vacantes</span>
        </h1>

        @include('partials.cardVacancy')
    </div>
@endsection