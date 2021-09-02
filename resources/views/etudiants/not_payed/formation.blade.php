@extends('etudiants.layouts.not_payed')

@section('content')
    <div class="container" id="page_compte_etudiant"><br>
        <h3 class="text-center txt-titre">Information personnel !</h3>
        <form method="POST" action="{{ route('etudiants.suite.inscription') }}" id="frm_new_compte_etudiant">
            @csrf
            <div class="infos">
                <h4 align="center">info formation</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="prenom">Formation :</label>
                            <select name="ville" class="custom-select" id="nom_formation">
                                <option selected disabled value="">Veuillez choisir votre formation</option>
                                @foreach(App\Models\Formation::all() as $formation)
                                    <option value="{{ $formation->id }}" @if($formation->id == old('formation')) selected @endif>{{ $formation->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="prenom">Cycle scolaire :</label>
                            <select name="cycle_scolaire" class="custom-select" id="cycle_scolaire">
                                <option selected disabled value="">Veuillez choisir votre cycle scolaire</option>
                                @foreach(App\Models\Cycle_scolaire::all() as $cycle)
                                    <option value="{{ $cycle->id }}" @if($cycle->id == old('cycle_scolaire')) selected @endif>{{ $cycle->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="validationCustom04">Niveau d'étude :</label>
                            <select name="niveau-etude" class="custom-select" id="niveau-etude">
                                <option selected disabled value="">Veuillez choisir votre niveau d'étude</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="validationCustom04">Rythme :</label>
                            <select name="duree_formation" class="custom-select" id="rythme">
                                <option selected>Veuillez choisir un rythme</option>
                                <option>Mensuel</option>
                                <option>3 mois</option>
                                <option>12 mois</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="validationCustom04">Pack :</label>
                            <select name="pack" class="custom-select" id="pack">
                                <option selected>Veuillez choisir votre pack</option>
                                @foreach(App\Models\Pack::all() as $cycle)
                                    <option value="{{ $cycle->id }}" @if($cycle->id == old('pack')) selected @endif>{{ $cycle->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nb-heure-semaine-pack">nb Heure par semaine :</label>
                              <input type="text" name="nb-heure-semaine-pack" class="form-control" id="nb-heure-semaine-pack" disabled>
                        </div>
                    </div>
                </div>

                <hr>
                <h3 align="center">info matiéres</h3>
                <table class="table" id="tab-matiere">
                    <thead>
                      <tr>
                        <th scope="col">Matier</th>
                        <th scope="col">Nombre d'heure</th>
                        <th scope="col" style="width:100px"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="matiere" id="1">
                        <td>
                            <select class="custom-select" id="id-matiere">
                                <option selected disabled value="">Choisir une matiere</option>
                                @foreach(App\Models\Matiere::all() as $matiere)
                                    <option value="{{ $matiere->id }}" @if($matiere->id == old('matier')) selected @endif>{{ $matiere->nom }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="form-control" type="text" placeholder="Nombre d'heure" id="nbre-heure">
                        </td>
                      </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5">
                                <button type="button" class="btn btn-success float-right" id="ajouter-matiere">Ajouter <i class="fas fa-plus"></i></button>
                            </td>
                        </tr>
                    </tfoot>
                  </table>
            </div>
            <br>
            <button type="button" class="btn btn-primary float-right" id="btn-enregister-formation">Suivant <i class="fas fa-angle-double-right"></i></button>
            <br><br>
        </form>
    </div>
    <br><br><br>
@endsection
