@extends('layouts.app')

@section('nav')
	@include('partials.navBar-admin')
@endsection

@section('content')
	<h1 class="text-2xl text-center text-gray-700">Notificaciones</h1>

	<ul class="max-w-md mx-auto mt-10">
		@forelse($notifications as $notify)

			@php
				$data = $notify->data
			@endphp

			<li class="p-5 border border-gray-400 mb-5">
				<p class="mb-4">
					Tienes un nuevo candidato en 
					<span class="font-bold text-gray-700">
						{{ $data['vacancy'] }}
					</span>
				</p>
				<p class="mb-4">
					<span class="font-bold text-gray-700 txt-sm">
						{{ $notify->created_at->diffForHumans() }}
					</span>
				</p>
				<a href="{{ route('candidates.index', ['candidate' => $data['vacancyID']]) }}"
					class="bg-teal-500 p-3 inline-block text-xs font-bold rounded text-white" 
					>Ver Candidatos
				</a>
			</li>

	
		@empty
			<p class="text-center text-gray-700">No tienes notificaciones</p>
		@endforelse
	</ul>
@endsection