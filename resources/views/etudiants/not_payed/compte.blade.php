@extends('etudiants.layouts.not_payed')

@section('content')
    <div class="container" id="page_compte_etudiant"><br>
        <h3 class="text-center txt-titre">Créer votre compte !</h3>
        <form method="POST" action="{{ route('register') }}" id="frm_new_compte_etudiant">
            @csrf
            <input type="text" name="type_usr" value="etudiant" style="display:none">
            <div class="infos">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="civilite">Civilité</label>
                            <select class="form-control" name="civilite">
                                <option>Mr</option>
                                <option>Mme</option>
                                <option>Mlle</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" name="nom" placeholder="Enter votre nom">
                        </div>
                        <div class="form-group">
                            <label for="prenom">Prénom</label>
                            <input type="text" class="form-control" name="prenom" placeholder="Enter votre prénom">
                        </div>
                        <div class="form-group">
                            <label for="email">Address email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter votre address email">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="adresse">Adresse</label>
                            <textarea class="form-control" name="adresse" rows="4" placeholder="Enter votre adresse ..."></textarea>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Mot de passe</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter votre mot de passe">
                        </div>
                        <div class="form-group">
                            <label for="password-confirm">{{ __('Confirmer votre mot de passe') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmer votre mot de passe">
                        </div>
                    </div>
                </div>


            </div>
            <br>
            <button type="submit" class="btn btn-primary float-right">Suivant <i class="fas fa-angle-double-right"></i></button>
            <br><br>
        </form>
    </div>
    @if (count($errors) > 0)
    <div class = "alert alert-danger">
       <ul>
             @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
             @endforeach
       </ul>
    </div>
     @endif
    <br><br><br>

    @section('js')
    @stop
@endsection
