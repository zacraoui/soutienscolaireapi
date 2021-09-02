<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- awesone fonts css-->
    <link href="{{ asset('site/css/font-awesome.css') }}" rel="stylesheet" type="text/css">
    <!-- owl carousel css-->
    <link rel="stylesheet" href="{{ asset('site/owl-carousel/assets/owl.carousel.min.css') }}" type="text/css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('site/css/4-2/bootstrap.min.css') }}">
    <!-- custom CSS -->
    @yield('css')
    <link rel="stylesheet" href="{{ asset('site/css/style.css') }}">
    <title>Soutien Scolaire</title>
    <style>

    </style>
</head>
<body>
    <header class="header-section">
        <div class="header__info">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__info-left">
                            <ul>
                                <li><span class="fa fa-envelope"></span> +1 123-456-7890</li>
                                <li><span class="fa fa-envelope"></span> Support@gmail.com</li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="header__info-right">
                            <ul>
                                @guest
{{--                                <li><a href="#"><span class="fa fa-user"></span> Live chat</a></li>--}}
                                <li><a href="{{ route('create.etudiant') }}"> ESPACE ÉTUDIANT</a></li>/
                                <li><a href="{{ route('site.accountTeacher') }}"> ESPACE ENSEIGNANT</a></li>
                                @else
                                <li>
                                    <div class="dropdown">
                                        <a class=" dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{ Auth::user()->nom.' '.Auth::user()->prenom }}
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            @can('teacher-status')
                                            <a class="dropdown-item" href="{{ route('teacher.profils.index') }}">Mon Compte</a>
                                            <div class="dropdown-divider"></div>
                                            @endcan
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </li>
{{--                                <li>{{ Auth::user()->nom.' '.Auth::user()->prenom }}</li>--}}
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @include('site.partials.navbar')

        @yield('content')

    @include('site.partials.footer')
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
    <script src="{{ asset('site/js/4-2/jquery-3.3.1.slim.min.js') }}"></script>
    <script src="{{ asset('site/js/4-2/popper.min.js') }}"></script>
    <script src="{{ asset('site/js/4-2/bootstrap.min.js') }}"></script>
<!-- owl carousel js-->
<script src="{{ asset('site/owl-carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('site/js/main.js') }}"></script>

    @yield('js')
</body>
</html>
