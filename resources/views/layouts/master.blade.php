<!-- resources/views/layouts/app.blade.php -->

<html>
    <head>
        <title>eAsistent - strokovna naloga - @yield('title')</title>

        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="{{asset('css/materialize.min.css')}}">

        <!-- Compiled and minified JavaScript -->
        <script src="{{asset('js/materialize.min.js')}}"></script>

        <link rel="stylesheet" href="{{asset('css/custom.css')}}">

        @vite('resources/js/app.js')
    </head>
    <body>
        @section('navigation')
            <nav class="custom-color-main" role="navigation">
                <div class="container">
                    <ul class="left ">
                        <li><a href="/">DOMOV</a></li>
                        <li><a href="/shopping-list">Nakupovalni listek</a></li>
                        <li><a href="/test-page">Testna stran</a></li>
                    </ul>

                    @guest
                        <ul class="right ">
                            <li><a class="bold-text" href="/login">PRIJAVA</a></li>
                        </ul>
                    @else
                        <ul class="right ">
                            <li>Prijavljen/a kot: {{ Auth::user()->email }}</li>
                            <li><a class="bold-text" href="/logout">ODJAVA</a></li>
                        </ul>
                    @endguest


                </div>
            </nav>
        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
