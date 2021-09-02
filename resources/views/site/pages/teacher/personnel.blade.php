@extends('layouts.register')

@section('content')
    <div class="container" id="page_compte_etudiant"><br>
        <h3 class="text-center txt-titre">Postuler pour devenir professeur de TamTech</h3>
        <form method="POST" action="{{ route('store_info_personnel.prof') }}" id="frm_new_compte_etudiant" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="type_usr" value="prof">
            <div class="infos">
                <div class="form-group">
                    <label for="annee_bac">Carte d'identité nationale</label>
                    <input placeholder="Carte d'identité nationale" name="cin" type="text" class="form-control" id="cin" value="{{ old('cin') }}">
                    @error('cin')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="situation_familiale">Situation Familiale</label>
                    <select class="form-control" name="situation_familiale">
                        <option value="">Situation Familiale</option>
                        <option {{ old('situation_familiale') == 'Célibataire' ? 'selected': ''}} value="Célibataire">Célibataire</option>
                        <option {{ old('situation_familiale') == 'Marié' ? 'selected': ''}} value="Marié">Marié</option>
                    </select>
                    @error('situation_familiale')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="city">Ville</label>
                    <select id="city" class="form-control" name="ville">
                        <option value="">Choisir La Ville</option>
                        @foreach($cities as $city)
                            <option value="{{ $city->name }}" @if($city->name == old('ville')) selected @endif>{{ $city->name }}</option>
                        @endforeach
                    </select>
                    @error('ville')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="quartier">Quartier</label>
                    <select id="districts" class="form-control" name="quartier">
                        <option value="">Choisir La Quartier</option>
                        <option value="">...</option>
                    </select>
                    @error('quartier')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="telephone_portable">Téléphone Portable</label>
                    <input name="telephone_portable" id="telephone_portable" type="text" value="{{ old('telephone_portable') == null ? '+212 (__) ____-____' : old('telephone_portable') }}"  class="form-control">
                    @error('telephone_portable')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="telephone_fix">Téléphone Fix</label>
                    <input id="telephone_fix" type="text" value="{{ old('telephone_fix') == null ? '+212 (__) ____-____' : old('telephone_portable') }}" class="form-control" name="telephone_fix">
                    @error('telephone_fix')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="validationCustom01">Date de Naissance</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <button type="button" id="toggle" class="input-group-text">
                                <i class="fa fa-calendar"></i>
                            </button>
                        </div>
                        <input  name="date_naissance"   type="text" class="form-control" id="date_naissance" value="{{ old('date_naissance') }}">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    @error('date_naissance')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="photo_profil">Téléchargez votre photo de profil</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Choisir le fichier</span>
                        </div>
                        <div class="custom-file">
                            <input name="photo_profil" type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label upload-soutien lettre_motivation" for="photo_profil"> Aucun fichier choisi</label>
                        </div>
                    </div>
                    @error('lettre_motivation')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary float-right">Suivant <i class="fas fa-angle-double-right"></i></button>
            <br><br>
        </form>
    </div>
    <br><br><br>

{{--@section('js')--}}
{{--@stop--}}
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('site/css/jquery.datetimepicker.min.css') }}">
@endsection
@section('js')
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
                        url: "/districts",
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
                    url: "{{ route('districts.index') }}",
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
        $('input[type="file"]').on('change',function(e){
            //get the file name
            // console.log(this);
            var fileName = e.target.files[0].name;
            //replace the "Choose a file" label
            console.log(this);
            $(this).next('.custom-file-label').html(' '+fileName);
        })
    </script>
@endsection
