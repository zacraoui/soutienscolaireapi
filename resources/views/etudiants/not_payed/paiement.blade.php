@extends('etudiants.layouts.not_payed')

@section('content')
    <div class="container" id="page_compte_etudiant"><br>
        <h3 class="text-center txt-titre">Paiement</h3>
        <div class="row">
            <div class="card col-md-5 card-paiement">
                <img class="card-img-top" src="https://www.cnil.fr/sites/default/files/styles/contenu-generique-visuel/public/thumbnails/image/le_paiement_a_distance_par_carte_bancaire.jpg?itok=ps19WLjM" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Carte bancaire</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="{{route('etudiant.paiement.cmi')}}" class="btn btn-primary">Payer</a>
                </div>
            </div>
            <div class="card col-md-5 card-paiement">
                <img class="card-img-top" src="https://www.nerdwallet.com/assets/blog/wp-content/uploads/2016/09/late-payment-affect-credit-1440x864.jpg" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Reçu</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="{{route('etudiant.paiement.recu')}}" class="btn btn-primary">Payer</a>
                </div>
            </div>
        </div>
        <br>
    </div>
@endsection
