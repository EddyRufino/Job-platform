<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 

    @yield('styles')

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-200 min-h-screen leading-none">
    <div >
        <nav class="bg-gray-800 shadow-md">
            <div class="container mx-auto px-2 md:px-0 py-3">
                <div class="flex items-center justify-around">
                    <a class="text-2xl text-white" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>

                    <nav class="flex-1 text-right">
                        <!-- Authentication Links -->
                        @guest
                            <a class="text-white no-underline hover:underline hover:text-gray-300 p-3" href="{{ route('login') }}">{{ __('Login') }}</a>

                            @if (Route::has('register'))
                                
                                <a class="text-white no-underline hover:underline hover:text-gray-300 p-3" href="{{ route('register') }}">{{ __('Register') }}</a>
                                
                            @endif
                        @else
                            <span class="text-white text-gray-300 text-md pr-4">
                                {{ Auth::user()->name }}
                            </span>

                            <a href="{{ route('notifications') }}"
                                class="bg-teal-500 rounded-full px-2 py-1 font-bold text-sm text-white" 
                            >
                                {{ Auth::user()->unreadNotifications->count() }}
                            </a>

                            <a class="text-white no-underline hover:underline hover:text-gray-300 p-3" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            
                        @endguest

                    </nav>
                </div>
            </div>
        </nav>              
    </div>
        
    <div class="bg-gray-700">
        <nav class="container mx-auto flex flex-col md:flex-row space-x-1">
            @yield('nav')
        </nav>
    </div>

    @if (session('state'))
        <div class="bg-teal-500 p-5 text-center text-white font-bold uppercase">
            {{ session('state') }}
        </div>
    @endif

    <main id="app" class="mt-10 container mx-auto">
        @yield('content')
    </main> 

    @include('partials.modal')

    @yield('scripts')
</body>
</html>
