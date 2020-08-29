@extends('layouts.app')

@section('styles')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous" />
@endsection

@section('content')
	<h1 class="text-2xl text-center font-bold text-gray-700">{{ $vacancy->name }}</h1>

	<div class="mt-10 mb-20 md:flex items-start">
		<div class="md:w-3/5">
			<p class="block text-gray-700 font-bold my-2">
				Publicado: <span class="font-normal">{{ $vacancy->created_at->diffForHumans() }}</span>
				por: <span class="font-normal">{{ $vacancy->user->name }}</span>
			</p>
			<p class="block text-gray-700 font-bold my-2">
				Categoría: <span class="font-normal">{{ $vacancy->category->name }}</span>
			</p>
			<p class="block text-gray-700 font-bold my-2">
				Salario: <span class="font-normal">{{ $vacancy->salary->name }}</span>
			</p>
			<p class="block text-gray-700 font-bold my-2">
				Ubicación: <span class="font-normal">{{ $vacancy->location->name }}</span>
			</p>
			<p class="block text-gray-700 font-bold my-2">
				Experiencia: <span class="font-normal">{{ $vacancy->experience->name }}</span>
			</p>


			<h2 class="text-xl text-center mt-10 text-gray-700 mb-5">Conocimientos y Tecnologías</h2>

			@php
				$arraySkills = explode(",", $vacancy->skills)
			@endphp

			@foreach ($arraySkills as $skill)
				<p class="inline-block rounded text-gray-700 border border-gray-500 py-2 px-8 my-2">
					{{ $skill }}
				</p>
			@endforeach
<br>
			@foreach ($vacancy->photos as $photo)
				<a href="{{ $photo->url }}" data-lightbox="imagen" data-title="{{ $vacancy->name }}">
					<img src="{{ $photo->url }}"
					  alt="foto {{ $vacancy->name }}"
					  class="inline-block w-40 mt-10">
				</a>
			@endforeach



			<div class="mt-10 mb-5">
				{!! $vacancy->description !!}
			</div>



		</div>
		<aside class="md:w-2/5">
			
		</aside>
	</div>
@endsection