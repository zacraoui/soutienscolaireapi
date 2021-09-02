<nav class="navbar navbar-expand-lg navbar-light bg-light bg-transparent @if(Request::is('/')) gtco-main-nav @endif" id="gtco-main-nav">
    <div class="container"><a href="{{ route('site.home') }}" class="navbar-brand">Soutien Scolaire</a>
        <button class="navbar-toggler" data-target="#my-nav" onclick="myFunction(this)" data-toggle="collapse"><span
                class="bar1"></span> <span class="bar2"></span> <span class="bar3"></span></button>
        <div id="my-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('site.home') }}">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#news">News</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
            </ul>
            <div class="form-inline my-2 my-lg-0 form">
                @guest
                @if (Route::has('login'))
{{--                <a href="{{ route('login') }}" class="btn btn-outline-dark my-2 my-sm-0 mr-3 text-uppercase">Connexion</a>--}}
                    <a href="{{ route('login') }}" class="btn btn-info my-2 my-sm-0 text-uppercase">{{ __('Login') }}</a>
{{--                <a href="#" class="btn btn-info my-2 my-sm-0 text-uppercase">sign up</a>--}}
                @endif
                @else
                    <a href="{{ route('logout') }}" class="btn btn-info my-2 my-sm-0 text-uppercase" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endif
            </div>
        </div>
    </div>
</nav>
