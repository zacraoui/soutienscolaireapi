@extends('etudiants.layouts.not_payed')

@section('content')
    <div class="container" id="page_compte_etudiant"><br>
        <h3 class="text-center txt-titre">Créer votre compte !</h3>
        <form method="POST" action="{{ route('register') }}" id="frm_new_compte_etudiant">
            @csrf
            <input type="hidden" name="type_usr" value="prof">
            <div class="infos">
                <div class="form-group">
                    <label for="civilite">Civilité</label>
                    <select class="form-control" name="civilite">
                        <option {{ old('civilite') == 'Mr' ? 'selected': ''}} value="Mr">Mr</option>
                        <option {{ old('civilite') == 'Mme' ? 'selected': ''}} value="Mme">Mme</option>
                        <option {{ old('civilite') == 'Mlle' ? 'selected': ''}} value="Mlle">Mlle</option>
                    </select>
                    @error('civilite')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" name="nom" placeholder="Enter votre nom" value="{{ old('nom') }}">
                    @error('nom')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" class="form-control" name="prenom" placeholder="Enter votre prénom" value="{{ old('prenom') }}">
                    @error('prenom')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Address email</label>
                    <input type="text" class="form-control" name="email" placeholder="Enter votre address email" value="{{ old('email') }}">
                    @error('email')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="pwd">Mot de passe</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter votre mot de passe">
                    @error('password')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password-confirm">Confirmez votre mot de passe</label>
                    <input id="password-confirm" autocomplete="new-password" type="password" class="form-control" name="password_confirmation" placeholder="Confirmez votre mot de passe">
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary float-right">Suivant <i class="fas fa-angle-double-right"></i></button>
            <br><br>
        </form>
    </div>
    <br><br><br>

@section('js')
@stop
@endsection
