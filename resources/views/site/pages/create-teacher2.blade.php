@extends('layouts.app')
@section('content')
    <div class="container-fluid gtco-testimonials soutien-testimonials">
        <div class="container">
            <h2>ESPACE ENSEIGNANT</h2>
        </div>
    </div>
    <div class="container-fluid gtco-features-list soutien-gtco-features-list">
        <div class="main">

            <div class="container">
                <h2>INSCRIVEZ-VOUS AU SUPER NOUVEAU COMPTE </h2>
                <form method="POST" id="signup-form" class="signup-form">
                    <h3>
                        <span class="title_text">Informations personnelles</span>
                    </h3>
                    <fieldset>
                        <div class="fieldset-content">
{{--                            <div class="row">--}}
{{--                                <div class="col-12">--}}
                                    <div class="form-row">
                                        <label for="civilite" class="form-label" style="margin-right: 2rem;">Civilité :</label>
                                        <div class="form-radio-item">
                                            <input type="radio" name="civilite" value="Mr" id="Mr" checked="checked" />
                                            <label for="Mr">Mr</label>

                                            <input type="radio" name="civilite" value="Mme" id="Mme" />
                                            <label for="Mme">Mme</label>

                                            <input type="radio" name="civilite" value="Mlle" id="Mlle" />
                                            <label for="Mlle">Mlle</label>
                                        </div>
                                    </div>
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="row">--}}
{{--                                <div class="col-6">--}}
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="prenom">Prénom</label>
{{--                                            <div class="col-sm-8">--}}
                                            <input class="form-control" type="text" name="prenom" id="first_name" placeholder="Prénom" />
{{--                                            </div>--}}
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="nom">Nom</label>
                                            <input class="form-control" type="text" name="nom" id="nom" placeholder="Nom" />
                                        </div>
                                    </div>

{{--                                </div>--}}
{{--                                <div class="col-6">--}}
{{--                                    <div class="form-group row">--}}
{{--                                        <label for="nom" class="col-sm-2 form-label">Nom</label>--}}
{{--                                        <div class="col-sm-8">--}}
{{--                                            <input class="input-step" type="text" name="nom" id="nom" placeholder="Nom" />--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                        <label for="situation_familiale">Situation Familiale</label>

                                        <select class="form-control" name="situation_familiale" id="situation_familiale">
                                            <option value="">Situation Familiale</option>
                                            <option value="Célibataire">Célibataire</option>
                                            <option value="Marié">Marié</option>
                                        </select>

                                </div>
                                <div class="form-group col-md-6">
                                    <label for="ville">Ville</label>
                                    <select class="form-control" name="ville" id="city">
                                        <option value="">Ville</option>
                                        @foreach($cities as $city)
                                            <option value="{{ $city->id }}" @if($city->id == old('ville')) selected @endif>{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="quartier">Quartier</label>
                                    <select class="form-control" name="quartier" id="districts">
                                        <option value="">Quartier</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="telephone_portable">Téléphone Portable</label>
                                    <input class="form-control" value="+212 (__) ____-____" pattern="^\+212(\s+)?\(?(06|07)\)?(\s+)?[0-9]{4}-?[0-9]{4}-?$" type="text" name="telephone_portable" id="telephone_portable" placeholder="Téléphone Portable" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="telephone_fix">Téléphone Fix</label>
                                    <input class="form-control" value="+212 (__) ____-____"  pattern="^\+212(\s+)?\(?(06|07|05)\)?(\s+)?[0-9]{4}-?[0-9]{4}-?$" type="text" name="telephone_fix" id="telephone_fix" placeholder="Téléphone Fix" />
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="expiry_date" style="white-space: nowrap">Expiration Date</label>
                                    <select class="form-control" id="expiry_date" name="expiry_date"></select>

                                    {{--                                        <div class="form-date-item">--}}
                                    {{--                                            <select id="expiry_month" name="expiry_month"></select>--}}
                                    {{--                                            <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>--}}
                                    {{--                                        </div>--}}
                                    {{--                                        <div class="form-date-item">--}}
                                    {{--                                            <select id="expiry_year" name="expiry_year"></select>--}}
                                    {{--                                            <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>--}}
                                    {{--                                        </div>--}}
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="expiry_month">&nbsp;</label>
                                    <select class="form-control" id="expiry_month" name="expiry_month"></select>
                                    {{--                                        <div class="form-date-item">--}}
                                    {{--                                            <select id="expiry_month" name="expiry_month"></select>--}}
                                    {{--                                            <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>--}}
                                    {{--                                          </div>--}}
                                    {{--                                        <div class="form-date-item">--}}
                                    {{--                                            <select id="expiry_year" name="expiry_year"></select>--}}
                                    {{--                                            <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>--}}
                                    {{--                                        </div>--}}
                                </div>
                                <div class="form-group col-md-2">
{{--                                    <select class="form-control" id="expiry_month" name="expiry_month"></select>--}}
                                    <label for="expiry_year">&nbsp;</label>
                                    <select class="form-control" id="expiry_year" name="expiry_year"></select>

                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="email">E-mail Adresse</label>
                                    <input class="form-control" type="text" name="email" id="email" placeholder="E-mail Adresse" />
                                </div>
{{--                                <div class="col-6">--}}
{{--                                </div>--}}
                            </div>
{{--                            <div class="form-group form-password">--}}
{{--                                <label for="password" class="form-label">Password</label>--}}
{{--                                <input type="password" name="password" id="password" data-indicator="pwindicator" />--}}
{{--                                <div id="pwindicator">--}}
{{--                                    <div class="bar-strength">--}}
{{--                                        <div class="bar-process">--}}
{{--                                            <div class="bar"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="label"></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="your_avatar" class="form-label">Select avatar</label>--}}
{{--                                <div class="form-file">--}}
{{--                                    <input type="file" name="your_avatar" id="your_avatar" class="custom-file-input" />--}}
{{--                                    <span id='val'></span>--}}
{{--                                    <span id='button'>Select File</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                        <div class="fieldset-footer">
                            <span>Step 1 of 3</span>
                        </div>
                    </fieldset>

                    <h3>
                        <span class="title_text">Informations personnelles</span>
                    </h3>
                    <fieldset>

                        <div class="fieldset-content">
                            <div class="form-group">
                                <label for="full_name" class="form-label">Full name</label>
                                <input type="text" name="full_name" id="full_name" placeholder="Full Name" />
                            </div>

                            <div class="form-select">
                                <label for="situation_familiale" class="form-label">Situation Familiale</label>
                                <select name="country" id="country">
                                    <option value="">Country</option>
                                    <option value="Australia">Australia</option>
                                    <option value="USA">America</option>
                                </select>
                            </div>

                            <div class="form-radio">
                                <label for="gender" class="form-label">Gender</label>
                                <div class="form-radio-item">
                                    <input type="radio" name="gender" value="male" id="male" checked="checked" />
                                    <label for="male">Male</label>

                                    <input type="radio" name="gender" value="female" id="female" />
                                    <label for="female">Female</label>
                                </div>
                            </div>

                            <div class="form-textarea">
                                <label for="about_us" class="form-label">About us</label>
                                <textarea name="about_us" id="about_us" placeholder="Who are you ..."></textarea>
                            </div>
                        </div>

                        <div class="fieldset-footer">
                            <span>Step 2 of 3</span>
                        </div>

                    </fieldset>

                    <h3>
                        <span class="title_text">Payment Details</span>
                    </h3>
                    <fieldset>
                        <div class="fieldset-content">
                            <div class="form-radio">
                                <label for="payment_type">Payment Type</label>
                                <div class="form-radio-flex">
                                    <input type="radio" name="payment_type" id="payment_visa" value="payment_visa" checked="checked" />
                                    <label for="payment_visa"><img src="images/icon-visa.png" alt=""></label>

                                    <input type="radio" name="payment_type" id="payment_master" value="payment_master" />
                                    <label for="payment_master"><img src="images/icon-master.png" alt=""></label>

                                    <input type="radio" name="payment_type" id="payment_paypal" value="payment_paypal" />
                                    <label for="payment_paypal"><img src="images/icon-paypal.png" alt=""></label>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="credit_card" class="form-label">Credit Card</label>
                                    <input type="text" name="credit_card" id="credit_card" />
                                </div>
                                <div class="form-group">
                                    <label for="cvc" class="form-label">CVC</label>
                                    <input type="text" name="cvc" id="cvc" />
                                </div>
                            </div>
                            <div class="form-date">
                                <label for="expiry_date">Expiration Date</label>
                                <div class="form-flex">
                                    <div class="form-date-item">
                                        <select id="expiry_date" name="expiry_date"></select>
                                        <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                    </div>
                                    <div class="form-date-item">
                                        <select id="expiry_year" name="expiry_year"></select>
                                        <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name_of_card" class="form-label">Name of card</label>
                                <input type="text" name="name_of_card" id="name_of_card" />
                            </div>
                        </div>

                        <div class="fieldset-footer">
                            <span>Step 3 of 3</span>
                        </div>
                    </fieldset>
                </form>
            </div>

        </div>
    </div>
{{--    <div class="container-fluid gtco-features-list soutien-gtco-features-list">--}}
{{--        <div class="container">--}}
{{--            <form class="needs-validation" novalidate>--}}
{{--                <div class="row">--}}
{{--                <div class="media soutien-media col-md-6 col-lg-6">--}}
{{--                    <div class="oval mr-4"><img class="align-self-start" src="images/quality-results.png" alt=""></div>--}}
{{--                    <div class="media-body">--}}
{{--                        <h5 class="mb-0">Informations Personnelles</h5>--}}
{{--                        Aliquam a nisl pulvinar, hendrerit arcu sed, dapibus velit. Duis ac quam id sapien vestibulum--}}
{{--                        fermentum ac eu eros. Aliquam erat volutpat.--}}
{{--                    </div>--}}

{{--                        <div class="form-row">--}}
{{--                            <div class="col-md-12 mb-3">--}}
{{--                                <label for="validationCustom01" class="d-block">Civilité : </label>--}}
{{--                                <div class="form-check form-check-inline">--}}
{{--                                    <input class="form-check-input" type="radio" name="civilite" id="inlineRadio1" value="Mr" checked>--}}
{{--                                    <label class="form-check-label" for="inlineRadio1">Mr</label>--}}
{{--                                </div>--}}
{{--                                <div class="form-check form-check-inline">--}}
{{--                                    <input class="form-check-input" type="radio" name="civilite" id="inlineRadio2" value="Mme">--}}
{{--                                    <label class="form-check-label" for="inlineRadio2">Mme</label>--}}
{{--                                </div>--}}
{{--                                <div class="form-check form-check-inline">--}}
{{--                                    <input class="form-check-input" type="radio" name="civilite" id="inlineRadio3" value="Mlle">--}}
{{--                                    <label class="form-check-label" for="inlineRadio3">Mlle</label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-12 mb-3">--}}
{{--                                <label for="validationCustom01">Nom</label>--}}
{{--                                <input name="nom" type="text" class="form-control" id="validationCustom01" value="{{ old('nom') }}">--}}
{{--                                <div class="valid-feedback">--}}
{{--                                    Looks good!--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-12 mb-3">--}}
{{--                                <label for="validationCustom02">Prénom</label>--}}
{{--                                <input name="prenom" type="text" class="form-control" id="validationCustom02" value="{{ old('prenom') }}">--}}
{{--                                <div class="valid-feedback">--}}
{{--                                    Looks good!--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-12 mb-3">--}}
    {{--                                <label for="situation_familiale">Situation Familiale</label>--}}
{{--                                <select name="situation_familiale" class="custom-select" id="situation_familiale">--}}
{{--                                    <option selected disabled value="">Choisir La Situation Familiale</option>--}}
{{--                                    <option value="Célibataire">Célibataire</option>--}}
{{--                                    <option value="Marié">Marié</option>--}}
{{--                                </select>--}}
{{--                                <div class="valid-feedback">--}}
{{--                                    Looks good!--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-row">--}}
{{--                            <div class="col-md-12 mb-3">--}}
{{--                                <label for="validationCustom04">Ville</label>--}}
{{--                                <select name="ville" class="custom-select" id="city">--}}
{{--                                    <option selected disabled value="">Choisir La Ville</option>--}}
{{--                                    @foreach($cities as $city)--}}
{{--                                        <option value="{{ $city->id }}" @if($city->id == old('ville')) selected @endif>{{ $city->name }}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                                <div class="invalid-feedback">--}}
{{--                                    Please select a valid state.--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-12 mb-3">--}}
{{--                                <label for="validationCustom04">Quartier</label>--}}
{{--                                <select name="quartier" class="custom-select" id="districts">--}}
{{--                                    <option selected disabled value="">Choisir La Quartier</option>--}}
{{--                                </select>--}}
{{--                                <div class="invalid-feedback">--}}
{{--                                    Please select a valid state.--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-row">--}}
{{--                            <div class="col-md-12 mb-3">--}}
    {{--                                <label for="validationCustom01">Téléphone Portable</label>--}}
{{--                                <input value="+212 (__) ____-____"  pattern="^\+212(\s+)?\(?(06|07)\)?(\s+)?[0-9]{4}-?[0-9]{4}-?$" name="telephone_portable" type="text" class="form-control" id="telephone_portable">--}}
{{--                                <div class="valid-feedback">--}}
{{--                                    Looks good!--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-row">--}}
{{--                            <div class="col-md-12 mb-3">--}}
{{--                                <label for="validationCustom01">Téléphone Fix</label>--}}
{{--                                <input value="+212 (__) ____-____"  pattern="^\+212(\s+)?\(?(06|07|05)\)?(\s+)?[0-9]{4}-?[0-9]{4}-?$" name="telephone_fix" type="text" class="form-control" id="telephone_fix" >--}}
{{--                                <div class="valid-feedback">--}}
{{--                                    Looks good!--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-row">--}}
{{--                            <div class="col-md-12 mb-3">--}}
{{--                                <label for="validationCustom01">Date de Naissance</label>--}}
{{--                                <div class="input-group mb-3">--}}
{{--                                    <div class="input-group-prepend">--}}
{{--                                        <button type="button" id="toggle" class="input-group-text">--}}
{{--                                            <i class="fa fa-calendar"></i>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                    <input  name="date_naissance"  type="text" class="form-control" id="date_naissance" value="{{ old('date_naissance') }}">--}}
{{--                                    <div class="valid-feedback">--}}
{{--                                        Looks good!--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-row">--}}
{{--                            <div class="col-md-12 mb-3">--}}
{{--                                <label for="email">E-mail Adresse</label>--}}
{{--                                <input name="email" type="text" class="form-control" id="email" placeholder="ex: xyz@gmail.com" value="{{ old('email') }}">--}}
{{--                                <div class="valid-feedback">--}}
{{--                                    Looks good!--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <button class="btn btn-primary" type="submit">Submit form</button>--}}


{{--                </div>--}}
{{--                <div class="media soutien-media col-md-6 col-lg-6">--}}
{{--                    <div class="oval mr-4"><img class="align-self-start" src="images/analytics.png" alt=""></div>--}}
{{--                    <div class="media-body">--}}
{{--                        <h5 class="mb-0">Informations Professionnelles</h5>--}}
{{--                        Aliquam a nisl pulvinar, hendrerit arcu sed, dapibus velit. Duis ac quam id sapien vestibulum--}}
{{--                        fermentum ac eu eros. Aliquam erat volutpat.--}}

{{--                        <div class="form-row">--}}
{{--                            <div class="col-md-12 mb-3">--}}
{{--                                <label for="validationCustom02">Année d’obtention du Bac</label>--}}
{{--                                <input placeholder="ex: 2015" name="annee_bac" type="text" class="form-control" id="annee_bac" value="{{ old('annee_bac') }}">--}}
{{--                                <div class="valid-feedback">--}}
{{--                                    Looks good!--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-row">--}}
{{--                            <div class="col-md-12 mb-3">--}}
{{--                                <label for="niveau_etudes">Niveau atteint dans les études</label>--}}
{{--                                <select name="niveau_etudes" class="custom-select" id="niveau_etudes">--}}
{{--                                    <option selected disabled value="">Niveau atteint dans les études</option>--}}
{{--                                    <option value="Bac+3">Bac+3 / Licence</option>--}}
{{--                                    <option value="Bac+4">Bac+4 / Maîtrise</option>--}}
{{--                                    <option value="Bac+5">Bac+5 / Master</option>--}}
{{--                                    <option value="Bac+6">Bac+6</option>--}}
{{--                                    <option value="Doctorat">Doctorat</option>--}}
{{--                                </select>--}}
{{--                                <div class="valid-feedback">--}}
{{--                                    Looks good!--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-row">--}}
{{--                            <div class="col-md-12 mb-3">--}}
{{--                                <label for="situation_professionnelle">Situation Professionnelle</label>--}}
{{--                                <select name="situation_professionnelle" class="custom-select" id="situation_professionnelle">--}}
{{--                                    <option selected disabled value="">Situation Professionnelle</option>--}}
{{--                                    <option value="Étudiant">Étudiant</option>--}}
{{--                                    <option value="Doctorat en cours">Doctorat en cours</option>--}}
{{--                                    <option value="Professeur">Professeur</option>--}}
{{--                                    <option value="Retraité">Retraité</option>--}}
{{--                                    <option value="À la recherche d'emploi">À la recherche d'emploi</option>--}}
{{--                                    <option value="Autre profession">Autre profession</option>--}}
{{--                                </select>--}}
{{--                                <div class="valid-feedback">--}}
{{--                                    Looks good!--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-row">--}}
{{--                            <div class="col-md-12 mb-3">--}}
{{--                                <label for="experience_enseignement">Experience dans l'enseignement</label>--}}
{{--                                <select name="experience_enseignement" class="custom-select" id="experience_enseignement">--}}
{{--                                    <option selected disabled value="">Expérience dans l'enseignement</option>--}}
{{--                                    <option value="Étudiant">Je suis professeur depuis plus d'un an</option>--}}
{{--                                    <option value="Doctorat en cours">J'ai eu plusieurs expériences éducatives significatives</option>--}}
{{--                                    <option value="Professeur">Il m'est arrivé de donner un cours ou deux</option>--}}
{{--                                    <option value="Retraité">Je n'ai pas d'expérience éducative significative</option>--}}
{{--                                </select>--}}
{{--                                <div class="valid-feedback">--}}
{{--                                    Looks good!--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-row">--}}
{{--                            <div class="col-md-12 mb-3">--}}
{{--                                <label for="situation_familiale">Téléchargez votre CV avec photo obligatoire</label>--}}
{{--                                <div class="input-group mb-3">--}}
{{--                                    <div class="input-group-prepend">--}}
{{--                                        <span class="input-group-text" id="inputGroupFileAddon01">Choose file</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="custom-file">--}}
{{--                                        <input name="cv" type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">--}}
{{--                                        <label class="custom-file-label upload-soutien cv" for="inputGroupFile01"> Aucun fichier choisi</label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-row">--}}
{{--                            <div class="col-md-12 mb-3">--}}
{{--                                <label for="situation_familiale">Téléchargez votre lettre de motivation</label>--}}
{{--                                <div class="input-group mb-3">--}}
{{--                                    --}}{{--                                    <div class="input-group-prepend">--}}
{{--                                    --}}{{--                                        <span class="input-group-text" id="inputGroupFileAddon01">Choose file</span>--}}
{{--                                    --}}{{--                                    </div>--}}
{{--                                    <div class="custom-file">--}}
{{--                                        <input name="cv" type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">--}}
{{--                                        <label class="custom-file-label upload-soutien cv" for="inputGroupFile01"> Aucun fichier choisi</label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-row">--}}
{{--                            <div class="col-md-12 mb-3">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="specialite_etudes">Votre spécialité</label>--}}
{{--                                    <textarea name="specialite_etudes" class="form-control" id="specialite_etudes" rows="3"></textarea>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('site/css/jquery.datetimepicker.min.css') }}">
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js"></script>
{{--    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>--}}
    <script src="{{ asset('site/js/jquery.datetimepicker.full.min.js') }}"></script>
{{--    <script src="{{ asset('site/steps/jquery-validation/dist/jquery.validate.min.js') }}"></script>--}}
{{--    <script src="{{ asset('site/steps/jquery-validation/dist/additional-methods.min.js') }}"></script>--}}
{{--    <script src="{{ asset('site/steps/jquery-steps/jquery.steps.min.js') }}"></script>--}}
{{--    <script src="{{ asset('site/steps/minimalist-picker/dobpicker.js') }}"></script>--}}
{{--    <script src="{{ asset('site/steps/nouislider/nouislider.min.css') }}"></script>--}}
{{--    <script src="{{ asset('site/steps/wnumb/wNumb.js') }}"></script>--}}
{{--    <script src="{{ asset('site/steps/main.js') }}"></script>--}}
    <script src="{{ asset('site/steps/16/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('site/steps/16/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('site/steps/16/jquery-validation/dist/additional-methods.min.js') }}"></script>
    <script src="{{ asset('site/steps/16/jquery-steps/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('site/steps/16/minimalist-picker/dobpicker.js') }}"></script>
    <script src="{{ asset('site/steps/16/jquery.pwstrength/jquery.pwstrength.min.js') }}"></script>
    <script src="{{ asset('site/steps/16/main.js') }}"></script>

    <script>
        $(document).ready(function() {
            // $("input").on("change", function() {
            //     this.setAttribute(
            //         "data-date",
            //         moment(this.value, "YYYY-MM-DD")
            //             .format( this.getAttribute("data-date-format") )
            //     )
            // }).trigger("change");
            // jQuery.datetimepicker.setLocale('fr');
            // jQuery.datetimepicker.setDateFormatter('moment');
            // $('#date_naissance').datetimepicker({
            //     timepicker: false,
            //     datepicker: true,
            //     format: 'DD-MM-YYYY',
            //     mask:true,
            //     lang:'fr',
            //     il8n: {
            //         month: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Decembre'],
            //         dayOfWeek: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi']
            //     }
            // });
            $('#toggle').on('click', function (){
                $('#date_naissance').datetimepicker('toggle');
            });
            // $(":input").inputmask();
            // $("#telephone_fix").inputmask({"mask": "(999) 999-9999"});
            $('#city').change(function (){

                if($(this).val() != ''){
                    // var select = $(this).attr("id");
                    var value = $(this).val();
                    // var dependent = $(this).data('dependent');
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('districts.index') }}",
                        method:"GET",
                        data:{value:value,_token:_token},
                        success:function (result){
                            $('#districts').html(result);
                        }
                    })
                }
            });

        });
    </script>
    <script>
        window.onload = function() {
            MaskedInput({
                elm: document.getElementById('telephone_portable'), // select only by id
                format: '+212 (__) ____-____',
                separator: '+212 (   )-'
            });
            MaskedInput({
                elm: document.getElementById('telephone_fix'), // select only by id
                format: '+212 (__) ____-____',
                separator: '+212 (   )-'
            });
        };





        // masked_input_1.4-min.js
        // angelwatt.com/coding/masked_input.php
        (function(a){a.MaskedInput=function(f){if(!f||!f.elm||!f.format){return null}if(!(this instanceof a.MaskedInput)){return new a.MaskedInput(f)}var o=this,d=f.elm,s=f.format,i=f.allowed||"0123456789",h=f.allowedfx||function(){return true},p=f.separator||"/:-",n=f.typeon||"_YMDhms",c=f.onbadkey||function(){},q=f.onfilled||function(){},w=f.badkeywait||0,A=f.hasOwnProperty("preserve")?!!f.preserve:true,l=true,y=false,t=s,j=(function(){if(window.addEventListener){return function(E,C,D,B){E.addEventListener(C,D,(B===undefined)?false:B)}}if(window.attachEvent){return function(D,B,C){D.attachEvent("on"+B,C)}}return function(D,B,C){D["on"+B]=C}}()),u=function(){for(var B=d.value.length-1;B>=0;B--){for(var D=0,C=n.length;D<C;D++){if(d.value[B]===n[D]){return false}}}return true},x=function(C){try{C.focus();if(C.selectionStart>=0){return C.selectionStart}if(document.selection){var B=document.selection.createRange();return -B.moveStart("character",-C.value.length)}return -1}catch(D){return -1}},b=function(C,E){try{if(C.selectionStart){C.focus();C.setSelectionRange(E,E)}else{if(C.createTextRange){var B=C.createTextRange();B.move("character",E);B.select()}}}catch(D){return false}return true},m=function(D){D=D||window.event;var C="",E=D.which,B=D.type;if(E===undefined||E===null){E=D.keyCode}if(E===undefined||E===null){return""}switch(E){case 8:C="bksp";break;case 46:C=(B==="keydown")?"del":".";break;case 16:C="shift";break;case 0:case 9:case 13:C="etc";break;case 37:case 38:case 39:case 40:C=(!D.shiftKey&&(D.charCode!==39&&D.charCode!==undefined))?"etc":String.fromCharCode(E);break;default:C=String.fromCharCode(E);break}return C},v=function(B,C){if(B.preventDefault){B.preventDefault()}B.returnValue=C||false},k=function(B){var D=x(d),F=d.value,E="",C=true;switch(C){case (i.indexOf(B)!==-1):D=D+1;if(D>s.length){return false}while(p.indexOf(F.charAt(D-1))!==-1&&D<=s.length){D=D+1}if(!h(B,D)){c(B);return false}E=F.substr(0,D-1)+B+F.substr(D);if(i.indexOf(F.charAt(D))===-1&&n.indexOf(F.charAt(D))===-1){D=D+1}break;case (B==="bksp"):D=D-1;if(D<0){return false}while(i.indexOf(F.charAt(D))===-1&&n.indexOf(F.charAt(D))===-1&&D>1){D=D-1}E=F.substr(0,D)+s.substr(D,1)+F.substr(D+1);break;case (B==="del"):if(D>=F.length){return false}while(p.indexOf(F.charAt(D))!==-1&&F.charAt(D)!==""){D=D+1}E=F.substr(0,D)+s.substr(D,1)+F.substr(D+1);D=D+1;break;case (B==="etc"):return true;default:return false}d.value="";d.value=E;b(d,D);return false},g=function(B){if(i.indexOf(B)===-1&&B!=="bksp"&&B!=="del"&&B!=="etc"){var C=x(d);y=true;c(B);setTimeout(function(){y=false;b(d,C)},w);return false}return true},z=function(C){if(!l){return true}C=C||event;if(y){v(C);return false}var B=m(C);if((C.metaKey||C.ctrlKey)&&(B==="X"||B==="V")){v(C);return false}if(C.metaKey||C.ctrlKey){return true}if(d.value===""){d.value=s;b(d,0)}if(B==="bksp"||B==="del"){k(B);v(C);return false}return true},e=function(C){if(!l){return true}C=C||event;if(y){v(C);return false}var B=m(C);if(B==="etc"||C.metaKey||C.ctrlKey||C.altKey){return true}if(B!=="bksp"&&B!=="del"&&B!=="shift"){if(!g(B)){v(C);return false}if(k(B)){if(u()){q()}v(C,true);return true}if(u()){q()}v(C);return false}return false},r=function(){if(!d.tagName||(d.tagName.toUpperCase()!=="INPUT"&&d.tagName.toUpperCase()!=="TEXTAREA")){return null}if(!A||d.value===""){d.value=s}j(d,"keydown",function(B){z(B)});j(d,"keypress",function(B){e(B)});j(d,"focus",function(){t=d.value});j(d,"blur",function(){if(d.value!==t&&d.onchange){d.onchange()}});return o};o.resetField=function(){d.value=s};o.setAllowed=function(B){i=B;o.resetField()};o.setFormat=function(B){s=B;o.resetField()};o.setSeparator=function(B){p=B;o.resetField()};o.setTypeon=function(B){n=B;o.resetField()};o.setEnabled=function(B){l=B};return r()}}(window));
    </script>
    <script>
        $('input[type="file"]').on('change',function(e){
            //get the file name
            var fileName = e.target.files[0].name;
            //replace the "Choose a file" label
            $('.cv').html(' '+fileName);
        })
    </script>
@endsection
