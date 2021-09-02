@extends('layouts.login')

@section('content')
    <div class="container mt-5" id="page_compte_etudiant"><br>
        <h3 class="text-center txt-titre">{{ __('Login') }}</h3>
        <form method="POST" action="{{ route('login') }}" id="frm_new_compte_etudiant">
            @csrf
            <input type="hidden" name="type_usr" value="prof">
            <div class="infos">

                <div class="form-group">
                    <label for="email">Address email</label>
                    <input type="text" class="form-control" name="email" placeholder="Enter votre address email" value="{{ old('email') }}" autocomplete="email" autofocus>
                    @error('email')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="pwd">Mot de passe</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter votre mot de passe" autocomplete="current-password">
                    @error('password')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary float-right">{{ __('Login') }}</button>
            <br><br>
        </form>
    </div>
@endsection
