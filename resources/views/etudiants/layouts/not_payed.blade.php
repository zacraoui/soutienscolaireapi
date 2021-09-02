<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- awesone fonts css-->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- <link href="{{ asset('site/css/font-awesome.css') }}" rel="stylesheet" type="text/css"> -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('site/css/bootstrap.min.css') }}">
    <!-- Style css -->
    <link rel="stylesheet" href="{{ asset('etudiants/css/style-zineb.css') }}">
    <title>Soutien scolaire</title>
</head>
<body>
<div class="container">
    <ul class="steps" id="layout-etudiant-not-payed">
        <li id="add-compte">
          <div>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span>Création de compte</span>
          </div>
        </li>
        <li id="info_personnel">
          <div>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span>Information Personnel</span>
          </div>
        </li>
        <li id="formation">
          <div>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span>Formation</span>
          </div>
        </li>
        <li id="disponibilite">
          <div>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span>Disponibilité</span>
          </div>
        </li>
        <li id="paiement">
          <div>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span>Paiement</span>
          </div>
        </li>
      </ul>
   </div>
    <div class="content">
        @yield('content')
    </div>
</body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
    <script src="{{ asset('site/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('site/js/popper.min.js') }}"></script>
    <script src="{{ asset('site/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('etudiants/js/script-zineb.js') }}"></script>
    @yield('js')
</html>
