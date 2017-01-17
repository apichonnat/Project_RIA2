<html>
    <head>
        <title>Projet driver</title>
        <link rel="icon" href="{{ URL::asset('img/camion.png') }}">
        <script src="{{ URL::asset('js/jquery-3.1.1.js') }}"></script>
        <link href="https://cdn.auth0.com/styleguide/4.8.10/index.min.css" rel="stylesheet" />
    </head>
    <body>
        <header class="site-header">
            <nav role="navigation" class="navbar navbar-inverse">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" data-toggle="collapse" data-target="#navbar-collapse" class="navbar-toggle collapsed">
                            <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span>
                            <span class="icon-bar"></span><span class="icon-bar"></span>
                        </button>
                        <h4 class=""><a href="/">Gestion des tournées</a></h4>
                    </div>
                    <div id="navbar-collapse" class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            @if(!$isLoggedIn)
                                <li><a href="{{ route('login') }}" class="signin-button login">Login</a></li>
                            @else
                                <li><a href="{{ route('logout') }}" class="signin-button login">Logout</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

    <div class="container">
        @yield('content')
    </div>

    </body>
</html>