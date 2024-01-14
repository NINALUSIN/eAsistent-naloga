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
    </head>
    <body>
        @section('navigation')
            <nav class="navigation-custom" role="navigation">
                <div class="container">
                    <ul class="left ">
                        <li><a href="/">DOMOV</a></li>
                        <li><a href="/shopping-list">Nakupovalni listek</a></li>
                        <li><a href="/test-page">Testna stran</a></li>
                    </ul>
                    <ul class="right ">
                        <li><a href="/login">PRIJAVA</a></li>
                    </ul>
                </div>
            </nav>
        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
