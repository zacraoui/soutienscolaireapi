@extends('etudiants.layouts.not_payed')

@section('content')
    <div class="container" id="page_compte_etudiant"><br>
        <h3 class="text-center txt-titre">Information personnel !</h3>
        <form method="POST" action="{{ route('etudiants.suite.inscription') }}" id="frm_new_compte_etudiant">
            @csrf
            <div class="infos">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nom">Date Naissance :</label>
                            <input type="date" class="form-control" name="date_naissance" placeholder="Enter votre date de naissance">
                        </div>
                        <div class="form-group">
                            <label for="prenom">Ville :</label>
                            <select name="city" class="custom-select" id="city">
                                <option selected disabled value="">Choisir La Ville</option>
                                @foreach(App\Models\City::where('country_code','MAR')->get() as $city)
                                    <option value="{{ $city->name }}" @if($city->name == old('ville')) selected @endif>{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="validationCustom04">Quartier</label>
                            <select name="quartier" class="custom-select" id="districts">
                                <option selected disabled value="">Choisir La Quartier</option>
                             </select>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="adresse">Tel :</label>
                            <input type="tel" class="form-control" name="tel" placeholder="Exemple: +212 (6) 1234-5678">
                        </div>
                        <div class="form-group">
                            <label for="adresse">Tel fix :</label>
                            <input type="tel" class="form-control" name="fix" placeholder="Exemple: +212 (5) 1234-5678">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Tel de responsable :</label>
                            <input type="tel" class="form-control" name="tel_responsable" placeholder="Exemple: +212 (6) 1234-5678">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="adresse">Nom complet de responsable :</label>
                        <input type="text" class="form-control" name="nom_responsable" placeholder="Enter le nom de votre résponsable">
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
@endsection
