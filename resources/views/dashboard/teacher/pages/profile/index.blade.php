@extends('layouts.admin')

@section('content')
    <div class="container-xl" id="app">
        <button class="btn btn-success" @click="editPersonnel">test</button>
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Mon Profile
                    </h2>
{{--                    <div class="text-muted mt-1">1-18 of 413 people</div>--}}
                </div>
                <!-- Page title actions -->
{{--                <div class="col-auto ms-auto d-print-none">--}}
{{--                    <div class="d-flex">--}}
{{--                        <input type="search" class="form-control d-inline-block w-9 me-3" placeholder="Search user…"/>--}}
{{--                        <a href="#" class="btn btn-primary">--}}
{{--                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->--}}
{{--                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>--}}
{{--                            New user--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-body p-4 text-center">
                            <span class="avatar avatar-xl mb-3 avatar-rounded" style="background-image: url({{ asset('files/images/'.Auth::user()->photo_profil) }})"></span>
                            <h3 class="m-0 mb-1">{{ Auth::user()->civilite .'. '.Auth::user()->nom . ' ' . Auth::user()->prenom }}</h3>
                            <div class="text-muted">{{ Auth::user()->age() }} {{ Auth::user()->civilite == 'Mme' ? 'Années' : 'Ans' }}</div>
                            <div class="mt-3">
                                <span class="badge bg-purple-lt">{{ Auth::user()->email }}</span>
                            </div>
                        </div>
{{--                        <div class="d-flex">--}}
{{--                            <a href="#" class="card-btn"><!-- Download SVG icon from http://tabler-icons.io/i/mail -->--}}
{{--                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="3" y="5" width="18" height="14" rx="2" /><polyline points="3 7 12 13 21 7" /></svg>--}}
{{--                                Email</a>--}}
{{--                            <a href="#" class="card-btn"><!-- Download SVG icon from http://tabler-icons.io/i/phone -->--}}
{{--                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" /></svg>--}}
{{--                                Call</a>--}}
{{--                        </div>--}}
                    </div>
                </div>
                <div class="col-md-6 col-lg-9">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Information personnel
                            </h3>
                            <div class="card-actions">
                                <button v-on:click="getUsers">
                                    Éditer mon profil<!-- Download SVG icon from http://tabler-icons.io/i/edit -->
{{--                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" /><path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" /><line x1="16" y1="5" x2="19" y2="8" /></svg>--}}
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <dl class="row">
                                <dt class="col-5">Carte d'identité nationale:</dt>
                                <dd class="col-7">{{ Auth::user()->enseignant->cin }}</dd>
                                <dt class="col-5">Situation Familiale:</dt>
                                <dd class="col-7">{{ Auth::user()->enseignant->situation_familiale }}</dd>
                                <dt class="col-5">Date de naissance:</dt>
                                <dd class="col-7">{{ formatDate(Auth::user()->date_naissance) }}</dd>
                                <dt class="col-5">Téléphone protable:</dt>
                                <dd class="col-7">{{ Auth::user()->tel }}</dd>
                                <dt class="col-5">Téléphone fix:</dt>
                                <dd class="col-7">
                                    {{ Auth::user()->fix }}
                                </dd>
                                <dt class="col-5">Adresse</dt>
                                <dd class="col-7">{{ Auth::user()->ville .', ' . Auth::user()->quartier }}</dd>
                            </dl>
                        </div>
                    </div>
                    <div class="card mt-2">
                        <div class="card-header">
                            <h3 class="card-title">
                                Information professionnelle
                            </h3>
                            <div class="card-actions">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#modal-professionnelle">
                                    Éditer mon profil<!-- Download SVG icon from http://tabler-icons.io/i/edit -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" /><path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" /><line x1="16" y1="5" x2="19" y2="8" /></svg>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <dl class="row">
                                <dt class="col-5">Année d’obtention du Bac:</dt>
                                <dd class="col-7">{{ Auth::user()->enseignant->annee_bac }}</dd>
                                <dt class="col-5">Niveau atteint dans les études:</dt>
                                <dd class="col-7">{{ Auth::user()->enseignant->niveau_etudes }}</dd>
                                <dt class="col-5">Situation Professionnelle:</dt>
                                <dd class="col-7">{{ Auth::user()->enseignant->situation_professionnelle }}</dd>
                                <dt class="col-5">Experience dans l'enseignement:</dt>
                                <dd class="col-7">{{ Auth::user()->enseignant->experience_enseignement }}</dd>
                                <dt class="col-5">Curriculum vitae:</dt>
                                <dd class="col-7"><a href="{{ route('teacher.view.cv') }}" target="_blank">{{ Auth::user()->enseignant->cv }}</a></dd>
                                <dt class="col-5">La lettre de motivation</dt>
                                <dd class="col-7"><a href="{{ route('teacher.view.lm') }}" target="_blank">{{ Auth::user()->enseignant->lettre_motivation }}</a></dd>
                                <dt class="col-5">Spécialité</dt>
                                <dd class="col-7">{{ Auth::user()->enseignant->specialite_etudes }}</dd>
                            </dl>
                        </div>
                    </div>
                    <div class="card mt-2">
                        <div class="card-header">
                            <h3 class="card-title">
                                Matière et Niveau
                            </h3>
{{--                            <div class="card-actions">--}}
{{--                                <a href="#">--}}
{{--                                    Éditer mon profil<!-- Download SVG icon from http://tabler-icons.io/i/edit -->--}}
{{--                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" /><path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" /><line x1="16" y1="5" x2="19" y2="8" /></svg>--}}
{{--                                </a>--}}
{{--                            </div>--}}
                        </div>
                        <div class="card-body">
                            <div class="policy-container">
                                <div class="policy-table">
                                    <div class="headings">
                                        <span class="heading">Matière</span>
                                        <span class="heading">Max Niveau</span>
                                        <span class="heading">Actions</span>
                                    </div>
                                    @foreach($matieres as $matiere)
                                    <div class="policy">
                                        <span>{{ $matiere->matiere->nom }}</span>
                                        <span>{{ $matiere->cycle_scolaire->nom }}</span>
                                        <span>
                                        <a class="btn btn-cyan editBtn" href="#"><i class="fas fa-edit"></i></a>
                                        <a class="btn btn-red" href="#"><i class="fas fa-trash-alt"></i></a>
                                      </span>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal-blur fade" id="modal-personnel" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modifier les informations personnelles</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Carte d'identité nationale</label>

                        <input v-model="profil.cin" type="text" value="{{ !is_null(old('cin')) ? old('cin') : Auth::user()->enseignant->cin }}" class="form-control" name="cin" placeholder="Carte d'identité nationale">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Situation Familiale</label>
                        <select class="form-select" name="situation_familiale" v-model="profil.situation_familiale">
                            <option value="">Situation Familiale</option>
                            <option {{ !is_null(old('cin')) ? 'selected' : (Auth::user()->enseignant->situation_familiale == 'Célibataire' ? 'selected' : '') }} value="Célibataire">Célibataire</option>
                            <option {{ !is_null(old('cin')) ? 'selected' : (Auth::user()->enseignant->situation_familiale == 'Marié' ? 'selected' : '') }} value="Marié">Marié</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Date de Naissance</label>
                        <input v-model="profil.date_naissance" type="text" name="date_naissance" value="{{ !is_null(old('cin')) ? old('cin') : formatDate(Auth::user()->date_naissance) }}" id="date_naissance" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Téléphone Portable</label>
                                <input v-model="profil.telephone_portable" type="text" name="telephone_portable" value="{{ Auth::user()->tel }}" id="telephone_portable" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Téléphone Fix</label>
                                <input v-model="profil.telephone_fix" type="text" name="telephone_fix" value="{{ Auth::user()->fix }}" id="telephone_fix" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Ville</label>
                                <select class="form-select" name="ville" id="city" v-model="profil.ville">
                                    <option value="">Choisir La Ville</option>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->name }}" @if($city->name == Auth::user()->ville) selected @endif>{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Quartier</label>
                                <select class="form-select" name="quartier" id="districts" v-model="profil.quartier">
                                    <option value="">Choisir La Quartier</option>
                                        <option value="">...</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Annuler
                    </a>
                    <a href="#" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                        <i class="fas fa-plus" style="margin-right: 0.5rem"></i>
                        Modifier
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal-blur fade" id="modal-professionnelle" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modifier les informations professionnelle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Année d’obtention du Bac</label>

                        <input type="text" value="{{ !is_null(old('annee_bac')) ? old('annee_bac') : Auth::user()->enseignant->annee_bac }}" class="form-control" placeholder="ex: 2015" name="annee_bac" id="annee_bac" value="{{ old('annee_bac') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Niveau atteint dans les études</label>
                        <select class="form-select" name="niveau_etudes">
                            <option disabled value="">Niveau atteint dans les études</option>
                            <option {{ !is_null(old('niveau_etudes')) && old('niveau_etudes') == 'Bac+3'? 'selected' : (Auth::user()->enseignant->niveau_etudes == 'Bac+3' ? 'selected' : '') }} value="Bac+3">Bac+3 / Licence</option>
                            <option {{ !is_null(old('niveau_etudes')) && old('niveau_etudes') == 'Bac+4'? 'selected' : (Auth::user()->enseignant->niveau_etudes == 'Bac+4' ? 'selected' : '') }} value="Bac+4">Bac+4 / Maîtrise</option>
                            <option {{ !is_null(old('niveau_etudes')) && old('niveau_etudes') == 'Bac+5'? 'selected' : (Auth::user()->enseignant->niveau_etudes == 'Bac+5' ? 'selected' : '') }} value="Bac+5">Bac+5 / Master</option>
                            <option {{ !is_null(old('niveau_etudes')) && old('niveau_etudes') == 'Bac+6'? 'selected' : (Auth::user()->enseignant->niveau_etudes == 'Bac+6' ? 'selected' : '') }} value="Bac+6">Bac+6</option>
                            <option {{ !is_null(old('niveau_etudes')) && old('niveau_etudes') == 'Doctorat'? 'selected' : (Auth::user()->enseignant->niveau_etudes == 'Doctorat' ? 'selected' : '') }} value="Doctorat">Doctorat</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Situation Professionnelle</label>
                        <select class="form-select" name="situation_professionnelle">
                            <option disabled value="">Situation Professionnelle</option>
                            <option {{ !is_null(old('situation_professionnelle')) && old('situation_professionnelle') == 'Étudiant'? 'selected' : (Auth::user()->enseignant->situation_professionnelle == 'Étudiant' ? 'selected' : '') }} value="Étudiant">Étudiant</option>
                            <option {{ !is_null(old('situation_professionnelle')) && old('situation_professionnelle') == 'Doctorat en cours'? 'selected' : (Auth::user()->enseignant->situation_professionnelle == 'Doctorat en cours' ? 'selected' : '') }} value="Doctorat en cours">Doctorat en cours</option>
                            <option {{ !is_null(old('situation_professionnelle')) && old('situation_professionnelle') == 'Professeur'? 'selected' : (Auth::user()->enseignant->situation_professionnelle == 'Professeur' ? 'selected' : '') }} value="Professeur">Professeur</option>
                            <option {{ !is_null(old('situation_professionnelle')) && old('situation_professionnelle') == 'Retraité'? 'selected' : (Auth::user()->enseignant->situation_professionnelle == 'Retraité' ? 'selected' : '') }} value="Retraité">Retraité</option>
                            <option {{ !is_null(old('situation_professionnelle')) && old('situation_professionnelle') == 'À la recherche d\'emploi'? 'selected' : (Auth::user()->enseignant->situation_professionnelle == 'À la recherche d\'emploi' ? 'selected' : '') }} value="À la recherche d'emploi">À la recherche d'emploi</option>
                            <option {{ !is_null(old('situation_professionnelle')) && old('situation_professionnelle') == 'Autre profession'? 'selected' : (Auth::user()->enseignant->situation_professionnelle == 'Autre profession' ? 'selected' : '') }} value="Autre profession">Autre profession</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Experience dans l'enseignement</label>
                        <select class="form-select" name="experience_enseignement">
                            <option disabled value="">Expérience dans l'enseignement</option>
                            <option {{ !is_null(old('experience_enseignement')) && old('experience_enseignement') == 'Je suis professeur depuis plus d\'un an'? 'selected' : (Auth::user()->enseignant->experience_enseignement == 'Je suis professeur depuis plus d\'un an' ? 'selected' : '') }} value="Je suis professeur depuis plus d\'un an">Je suis professeur depuis plus d'un an</option>
                            <option {{ !is_null(old('experience_enseignement')) && old('experience_enseignement') == 'J\'ai eu plusieurs expériences éducatives significatives'? 'selected' : (Auth::user()->enseignant->experience_enseignement == 'J\'ai eu plusieurs expériences éducatives significatives' ? 'selected' : '') }} value="J'ai eu plusieurs expériences éducatives significatives">J'ai eu plusieurs expériences éducatives significatives</option>
                            <option {{ !is_null(old('experience_enseignement')) && old('experience_enseignement') == 'Il m\'est arrivé de donner un cours ou deux'? 'selected' : (Auth::user()->enseignant->experience_enseignement == 'Il m\'est arrivé de donner un cours ou deux' ? 'selected' : '') }} value="Il m'est arrivé de donner un cours ou deux">Il m'est arrivé de donner un cours ou deux</option>
                            <option {{ !is_null(old('experience_enseignement')) && old('experience_enseignement') == 'Je n\'ai pas d\'expérience éducative significative'? 'selected' : (Auth::user()->enseignant->experience_enseignement == 'Je n\'ai pas d\'expérience éducative significative' ? 'selected' : '') }} value="Je n'ai pas d'expérience éducative significative">Je n'ai pas d'expérience éducative significative</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <div class="form-label">Téléchargez votre CV avec photo obligatoire (<a href="{{ route('teacher.view.cv') }}" target="_blank">{{ Auth::user()->enseignant->cv }}</a>)</div>
                        <input name="cv" type="file" class="form-control" value="dqfdqsdqs" />
                    </div>
                    <div class="mb-3">
                        <div class="form-label">Téléchargez votre lettre de motivation (<a href="{{ route('teacher.view.lm') }}" target="_blank">{{ Auth::user()->enseignant->lettre_motivation }}</a>)</div>
                        <input name="lettre_motivation" type="file" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Votre spécialité</label>
                        <textarea class="form-control" rows="3">{{ Auth::user()->enseignant->specialite_etudes }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Annuler
                    </a>
                    <a href="#" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                        <i class="fas fa-plus" style="margin-right: 0.5rem"></i>
                        Modifier
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal-blur fade" id="modal-matiere" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
{{--                <form action="{{ route('') }}" method="POST">--}}
{{--                    @method('PUT')--}}
                <div class="modal-header">
                    <h5 class="modal-title">Modifier le Niveau et Matière </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label  class="form-label">Matière</label>
                        <select class="form-select" name="matiere" id="matiere_value">
                            <option disabled value="">Matière</option>
                            @foreach($matieres_niveaux as $matiere)
                                <option value="{{ $matiere->id }}">{{ $matiere->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Niveau</label>
                        <select class="form-select" name="niveau" id="niveau_value">
                            <option disabled value="">Niveau</option>
                            @foreach($cycle_scolaires as $cycle_scolaire)
                                <option {{ !is_null(old('niveau')) && old('niveau') == $cycle_scolaire->id ? 'selected' : (Auth::user()->enseignant->niveau_etudes == $cycle_scolaire->id ? 'selected' : '') }} value="{{ $cycle_scolaire->id }}">{{ $cycle_scolaire->nom }}</option>
                            @endforeach
                            <option {{ !is_null(old('niveau_etudes')) && old('niveau_etudes') == 'Bac+3'? 'selected' : (Auth::user()->enseignant->niveau_etudes == 'Bac+3' ? 'selected' : '') }} value="Bac+3">Bac+3 / Licence</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Annuler
                    </a>
                    <a href="#" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                        <i class="fas fa-plus" style="margin-right: 0.5rem"></i>
                        Modifier
                    </a>
                </div>
{{--                </form>--}}
            </div>
        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('site/css/jquery.datetimepicker.min.css') }}">
@endsection
@section('js')
    <script src="{{ asset('admin/libs/vue.js') }}"></script>
    <script src="{{ asset('admin/libs/axios.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js"></script>
    <script src="{{ asset('site/js/jquery.datetimepicker.full.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            // $("input").on("change", function() {
            //     this.setAttribute(
            //         "data-date",
            //         moment(this.value, "YYYY-MM-DD")
            //             .format( this.getAttribute("data-date-format") )
            //     )
            // }).trigger("change");
            jQuery.datetimepicker.setLocale('fr');
            jQuery.datetimepicker.setDateFormatter('moment');
            $('#date_naissance').datetimepicker({
                timepicker: false,
                datepicker: true,
                format: 'DD-MM-YYYY',
                mask:true,
                lang:'fr',
                il8n: {
                    month: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Decembre'],
                    dayOfWeek: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi']
                }
            });
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
            if($('#city').val() != ''){

                // var select = $(this).attr("id");
                var value = $('#city').val();
                // var dependent = $(this).data('dependent');
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('teacher.districtsBy.index') }}",
                    method:"GET",
                    data:{value:value,_token:_token},
                    success:function (result){
                        $('#districts').html(result);
                    }
                })
            }

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
        $(document).ready(function() {
            $('.editBtn').on('click', function (){
                $('#modal-matiere').modal('show');

                // var $var = $(this).parent().parent().children().first().text();
                //
                // var options = document.querySelectorAll('#modal-matiere .modal-body .form-select option');
                // options.forEach((el) => {
                //     if(el.textContent === $var) {
                //         el.setAttribute('selected', '');
                //     } else {
                //         el.removeAttribute('selected');
                //     }
                // });


                $tr = $(this).closest('.policy');
                var data = $tr.children('span').map(function (){
                    return $(this).text();
                }).get();

                // console.log(getValue[1].text);
                // $("#matiere_value option").each(function(){
                //     if($(this).text() == data[0]){
                //         // console.log(index)
                //         $(this).attr("selected", "selected")
                //     }
                //
                // });
                //
                // $("#niveau_value option").each(function(){
                //     if($(this).text() == data[1]){
                //         // console.log(index)
                //         $(this).attr("selected", "selected")
                //     }
                //
                // });

                $("#matiere_value option:contains('" + data[0] + "')").each(function(){
                    if($(this).text() == data[0]){

                        $(this).attr("selected", "selected");
                        console.log($(this).text())
                        return false;
                    }
                    return true;
                });
                $("#niveau_value option:contains('" + data[1] + "')").each(function(){
                    if($(this).text() == data[1]){

                        $(this).attr("selected", "selected");
                        console.log($(this).text())
                        return false;
                    }
                    return true;
                });


            });

        });
    </script>
{{--    <script>--}}
{{--        window.Laravel = {!! json_encode([--}}
{{--                            'csrfToken' => csrf_token(),--}}
{{--                            'slug' => Auth::user()->slug,--}}
{{--                            'url' => url('/')--}}
{{--                        ]) !!}--}}
{{--    </script>--}}
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                open: false,
                personnel: {
                    cin: '',
                    situation_familiale: '',
                    date_naissance: '',
                    telephone_portable: '',
                    telephone_fix: '',
                    ville: '',
                    quartier: ''
                }
            },
            methods:{
                getUsers: function (){

                },
                editPersonnel: function (){
                    $('#modal-personnel').modal('show');
                    axios.get('http://soutien-scolaire.test/dashboard/get-users')
                        .then(response => {
                            this.personnel = {
                                cin: document.getElementById(''),
                            }
                            console.log('success :', this.personnel)
                        })
                        .catch(error => {
                            console.log('errors :', error)
                        })
                }
            },
            mounted: function (){
                // this.getUsers();
            }
        });
    </script>

@endsection
