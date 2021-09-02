@extends('etudiants.layouts.not_payed')

@section('content')
    <div class="container" id="page_compte_etudiant"><br>
        <form method="POST" action="{{ route('etudiant.paiement.recu.eng') }}" id="frm_new_compte_etudiant" enctype="multipart/form-data">
            @csrf
            <div class="col-md-10" style="margin: auto; border:3px solid #eeeeee; border-radius:10px; padding: 0px 30px 35px 30px;">
                <h3 class="text-center txt-titre">Paiement par reçu</h3>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquam cumque vero accusamus labore voluptatum ipsum voluptatem.
                </p>

               <div align="center">
                   <input type="file" name="lien_recu" id="">
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
