@extends('etudiants.layouts.not_payed')

@section('content')
    <div class="container" id="page_compte_etudiant"><br>
        <form method="POST" action="{{ route('etudiant.paiement.recu.eng') }}" id="frm_new_compte_etudiant" enctype="multipart/form-data">
            @csrf
            <div class="col-md-10" style="margin: auto; border:3px solid #eeeeee; border-radius:10px; padding: 0px 30px 35px 30px;">
                <h3 class="text-center txt-titre">Info de paiement</h3>
                <p>{{$msg}}</p>
            </div>

            <br><br>
        </form>
    </div>
@endsection
