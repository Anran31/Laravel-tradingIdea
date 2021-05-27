<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <title>TradingIdeas</title>
    </head>
    <body class="bg-primary">
        <nav class="p-6 bg-primary border-b-8 border-white flex justify-between mb-6">
            <ul class="flex items-center">
                <li>
                    <a href="{{ route('home') }}" class="p-3 text-white text-3xl">TradingIdeas</a>
                </li>
                 {{-- <li>
                    <a href="{{ route('home') }}" class="p-6 text-white text-2xl">Home</a>
                </li> --}}
                {{-- <li>
                    <a href="#" class="p-3">Post</a>
                </li>  --}}
            </ul>
    
            <ul class="flex items-center">
                @auth
                    <li>
                        <a href="" class="p-3 text-white text-xl">{{ auth()->user()->name }}</a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="inline text-white text-xl">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </li>   
                @endauth
                
                @guest
                    <li>
                        <a href="{{ route('login') }}" class="p-3 text-white text-xl">Login</a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}" class="p-3 text-white text-xl">Register</a>
                    </li>    
                @endguest
                
            </ul>
        </nav>
        @yield('content')
    </body>
</html>