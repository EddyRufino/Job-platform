@extends('layouts.app')

@section('nav')
	@include('partials.navBar-admin')
@endsection

@section('content')

<div class="flex flex-wrap justify-center">
    
    <div class="w-full max-w-sm">
        <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">

            <div class="font-semibold bg-gray-300 text-gray-700 py-3 px-6 mb-0">
                Nueva vacante
            </div>

            <form class="w-full p-6" method="POST" action="">
                @csrf

                <div class="flex flex-wrap mb-6">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                        Título vacante:
                    </label>

                    <input id="name" type="text" class="form-input w-full bg-gray-200 p-2 rounded @error('name') border-red-500 @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <p class="bg-red-100 border-l-4 border-red-500 p-4 w-full text-red-500 text-xs italic mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="flex flex-wrap mb-6">
                    <label for="category" class="block text-gray-700 text-sm font-bold mb-2">
                        Categoría:
                    </label>

                    <select id="category" name="category" 
                    	class="block appearance-none w-full border border-gray-200 text-gray-700 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-200">
                    	<option value="">Selecciona</option>
                    	@foreach ($categories as $category)
                    		<option value="{{ $category->id }}">{{ $category->name }}</option>
                    	@endforeach
                    </select>

                    @error('category')
                        <p class="bg-red-100 border-l-4 border-red-500 p-4 w-full text-red-500 text-xs italic mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="flex flex-wrap mb-6">
                    <label for="category" class="block text-gray-700 text-sm font-bold mb-2">
                        Experiencia:
                    </label>

                    <select id="category" name="category" 
                    	class="block appearance-none w-full border border-gray-200 text-gray-700 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-200">
                    	<option value="">Selecciona</option>
                    	@foreach ($experiences as $experience)
                    		<option value="{{ $experience->id }}">{{ $experience->name }}</option>
                    	@endforeach
                    </select>

                    @error('category')
                        <p class="bg-red-100 border-l-4 border-red-500 p-4 w-full text-red-500 text-xs italic mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>



              {{--   <div class="flex flex-wrap mb-6">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">
                        {{ __('Password') }}:
                    </label>

                    <input id="password" type="password" class="form-input w-full bg-gray-200 p-2 rounded @error('password') border-red-500 @enderror" name="password" required>

                    @error('password')
                        <p class="bg-red-100 border-l-4 border-red-500 p-4 w-full text-red-500 text-xs italic mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div> --}}


                <div class="flex flex-wrap items-center">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-gray-100 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Guardar
                    </button>

                </div>
            </form>

        </div>
    </div>

</div>
@endsection