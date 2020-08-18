@extends('layouts.app')

@section('content')
    <div class="container pt-6 mx-auto">
        <div class="flex flex-wrap justify-center">
            <div class="md:w-1/2 lg:w-1/3 order-2 md:order-1">
                <div class="w-full max-w-sm">
                    <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">

                        <div class="font-semibold bg-gray-300 text-gray-700 py-3 px-6 mb-0">
                            {{ __('Register') }}
                        </div>

                        <form class="w-full p-6" method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="flex flex-wrap mb-6">
                                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                                    {{ __('Name') }}:
                                </label>

                                <input id="name" type="text" class="form-input w-full bg-gray-200 p-2 rounded @error('name')  border-red-500 @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <p class="bg-red-100 border-l-4 border-red-500 p-4 w-full text-red-500 text-xs italic mt-1">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="flex flex-wrap mb-6">
                                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                                    {{ __('E-Mail Address') }}:
                                </label>

                                <input id="email" type="email" class="form-input w-full bg-gray-200 p-2 rounded @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <p class="bg-red-100 border-l-4 border-red-500 p-4 w-full text-red-500 text-xs italic mt-1">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="flex flex-wrap mb-6">
                                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">
                                    {{ __('Password') }}:
                                </label>

                                <input id="password" type="password" class="form-input w-full bg-gray-200 p-2 rounded @error('password') border-red-500 @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <p class="bg-red-100 border-l-4 border-red-500 p-4 w-full text-red-500 text-xs italic mt-1">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="flex flex-wrap mb-6">
                                <label for="password-confirm" class="block text-gray-700 text-sm font-bold mb-2">
                                    {{ __('Confirm Password') }}:
                                </label>

                                <input id="password-confirm" type="password" class="form-input w-full bg-gray-200 p-2 rounded" name="password_confirmation" required autocomplete="new-password">
                            </div>

                            <div class="flex flex-wrap">
                                <button type="submit" class="inline-block align-middle text-center select-none border font-bold whitespace-no-wrap py-2 px-4 rounded text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700">
                                    {{ __('Register') }}
                                </button>

                                <p class="w-full text-xs text-center text-gray-700 mt-8 -mb-4">
                                    {{ __('Already have an account?') }}
                                    <a class="text-blue-500 hover:text-blue-700 no-underline" href="{{ route('login') }}">
                                        {{ __('Login') }}
                                    </a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="md:w-1/2 lg:w-1/3 order-1 md:order-2 text-center flex flex-col justify-center mb-5">
                <h1 class="text-blue-500 text-3xl">¿Eres reclutador?</h1>
                <p class="text-xl mt-5 leading-7 text-gray-700">Crea una cuenta totalmente gratis y comienza a publicar hasta 10 ofertas por día.</p>
            </div>
        </div>
    </div>
@endsection