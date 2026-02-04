<!-- resources/views/layout.blade.php -->
<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        </head>
    <body>
        <header class="header">
            <h1 class="header-title">My ToDo App</h1>
            <nav class="header-nav">
                @auth
                <a href="/todos">My Pages</a>
                <form method="POST" action="{{route('logout')}}">
                    @csrf
                    <button type="submit" class="logout-button">Log out</button>
                </form>
                @else
                <a href="/login">Log in</a>
                <a href="/register">Sign up</a>
                @endauth
            </nav>
        </header>

        @auth
        <p class="welcome-message">{{Auth::user()->name}}さん、ようこそ！</p>
        @endauth

        <main>
            @yield('content')
        </main>

        <footer>
            <p>&copy; 2025 My ToDo App</p>
        </footer>
    </body>
</html>