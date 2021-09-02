@extends('etudiants.layouts.not_payed')

@section('content')
	@php
        $orgClientId  = "600002165";
  		$orgAmount = "10.25";
  		$orgOkUrl = "http://".$_SERVER['HTTP_HOST']."/etudiant/Ok_Fail";
  		$orgFailUrl = "http://".$_SERVER['HTTP_HOST']."/etudiant/Ok_Fail";
  		$shopurl = "http://".$_SERVER['HTTP_HOST'];
  		$orgTransactionType = "PreAuth";
  		$orgRnd =  microtime();
  		$orgCallbackUrl = "https://".$_SERVER['HTTP_HOST']."/paiement/callback.php";
  		$orgCurrency = "504";
        $AutoRedirect="true";
        $idUsr=Auth::user()->id;
    @endphp

    <div class="container" id="page_compte_etudiant"><br>
        <h3 class="text-center txt-titre">Paiemant par CMI</h3>
        <form method="post" action="{{ asset('paiement/2.SendData.php') }}" id="frm_new_compte_etudiant">
            <input type="hidden" name="idUsr" value="{{ $idUsr }}">
            <input type="hidden" name="AutoRedirect" value="{{ $AutoRedirect }}">
            <input type="hidden" name="clientid" value="{{ $orgClientId }}">

            <input type="hidden" name="okUrl" value="{{$orgOkUrl}}">
            <input type="hidden" name="failUrl" value="{{$orgFailUrl}}">
            <input type="hidden" name="TranType" value="{{$orgTransactionType}}">
            <input type="hidden" name="callbackUrl" value="{{$orgCallbackUrl}}">
            <input type="hidden" name="shopurl" value="{{$shopurl}}">
            <input type="hidden" name="currency" value="{{$orgCurrency}}">
            <input type="hidden" name="rnd" value="{{$orgRnd}}">
            <input type="hidden" name="storetype" value="3D_PAY_HOSTING">
            <input type="hidden" name="hashAlgorithm" value="ver3">
            <input type="hidden" name="lang" value="fr">
            <input type="hidden" name="refreshtime" value="5">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nom">Montant :</label>
                        <input class="form-control" name="amount" value="{{$orgAmount}}">
                    </div>
                    <div class="form-group">
                        <label for="nom">Nom :</label>
                        <input class="form-control" name="BillToName" value="{{Auth::user()->civilite.' '.Auth::user()->nom .' '.Auth::user()->prenom}}">
                    </div>

                    <div class="form-group">
                        <label for="nom">Email :</label>
                        <input class="form-control" name="email" value="{{Auth::user()->email}}">
                    </div>
                    <div class="form-group">
                        <label for="nom">Tel :</label>
                        <input class="form-control" name="tel" value="{{Auth::user()->tel}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nom">Code postale :</label>
                        <input class="form-control" name="BillToPostalCode">
                    </div>
                    <div class="form-group">
                        <label for="nom">Adresse :</label>
                        <input class="form-control" name="BillToStreet1" value="{{Auth::user()->adresse}}">
                    </div>
                    <div class="form-group">
                        <label for="nom">Ville :</label>
                        <input class="form-control" name="BillToCity" value="{{Auth::user()->ville}}">
                    </div>
                    <div class="form-group">
                        <label for="nom">Quartier :</label>
                        <input class="form-control" name="BillToStateProv" value="{{Auth::user()->quartier}}">
                    </div>
                </div>
            </div>


            <input type="hidden" name="BillToCompany" value="billToCompany">

            <input type="hidden" name="BillToCountry" value="504">
            <input type="hidden" name="encoding" value="UTF-8">
            <input type="hidden" name="oid" value="{{uniqid()}}"> <!-- La valeur du paramètre oid doit être unique par transaction -->
            {{-- <table>
                <tr>
                    <td align="center" colspan="2"><input type="submit"
                        value="Complete Payment" /></td>
                </tr>
            </table> --}}
            <button type="submit" class="btn btn-primary float-right">Suivant <i class="fas fa-angle-double-right"></i></button>
            <br><br><br>
        </form>
    </div>
    <br><br><br>

    @section('js')
    @stop
@endsection
