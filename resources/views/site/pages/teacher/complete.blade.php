@extends('layouts.register')

@section('content')
    <div class="container" id="page_compte_etudiant"><br>
        <h3 class="text-center txt-titre">Postuler pour devenir professeur de TamTech</h3>
        <form method="POST" action="{{ route('store_complete') }}" id="frm_new_compte_etudiant">
            @csrf
            <input type="hidden" name="type_usr" value="prof">
            <div class="infos">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur eveniet labore magnam modi, quidem quod ratione reiciendis reprehenderit sint vitae?
            </div>
            <br>
            <button type="submit" class="btn btn-primary float-right">Bien Reçu</button>
            <br><br>
        </form>
    </div>
    <br><br><br>
@endsection
