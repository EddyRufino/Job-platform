@extends('layouts.app')

@section('content')
	<h1 class="text-xl text-center text-gray-800">Candidatos de la vacante: {{ $vacancy->name }}</h1>
	<ul class="max-w-md mx-auto mt-10">
		@forelse($vacancy->candidates as $candidate)
			<li class="p-5 border border-gray-400 mb-5">
				<p class="mb-4">Nombre:
					<span class="font-bold text-gray-700">{{ $candidate->name }}</span>
				</p>
				<p class="mb-4">Email:
					<span class="font-bold text-gray-700">{{ $candidate->email }}</span>
				</p>
				<a class="bg-teal-500 p-3 inline-block text-xs font-bold rounded text-white" 
					href="/storage/{{ $candidate->cv }}">
				Ver CV</a>

			</li>

		@empty

		@endforelse
	</ul>
@endsection