@extends('layouts.register')

@section('content')
    <div class="container" id="page_compte_etudiant"><br>
        <h3 class="text-center txt-titre">Postuler pour devenir professeur de TamTech</h3>
        <form method="POST" action="{{ route('store_info_professionnelle.prof') }}" id="frm_new_compte_etudiant" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="type_usr" value="prof">
            <div class="infos">

                <div class="form-group">
                    <label for="annee_bac">Année d’obtention du Bac</label>
                    <input placeholder="ex: 2015" name="annee_bac" type="text" class="form-control" id="annee_bac" value="{{ old('annee_bac') }}">
                    @error('annee_bac')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="niveau_etudes">Niveau atteint dans les études</label>
                    <select id="niveau_etudes" class="form-control" name="niveau_etudes">
                        <option disabled value="" selected>Niveau atteint dans les études</option>
                        <option value="Bac+3" {{ old('niveau_etudes') == 'Bac+3' ? 'selected': '' }}>Bac+3 / Licence</option>
                        <option value="Bac+4" {{ old('niveau_etudes') == 'Bac+4' ? 'selected': '' }}>Bac+4 / Maîtrise</option>
                        <option value="Bac+5" {{ old('niveau_etudes') == 'Bac+5' ? 'selected': '' }}>Bac+5 / Master</option>
                        <option value="Bac+6" {{ old('niveau_etudes') == 'Bac+6' ? 'selected': '' }}>Bac+6</option>
                        <option value="Doctorat" {{ old('niveau_etudes') == 'Doctorat' ? 'selected': '' }}>Doctorat</option>
                    </select>
                    @error('niveau_etudes')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="situation_professionnelle">Situation Professionnelle</label>
                    <select id="situation_professionnelle" class="form-control" name="situation_professionnelle">
                        <option selected disabled value="">Situation Professionnelle</option>
                        <option value="Étudiant" {{ old('situation_professionnelle') == 'Étudiant' ? 'selected': '' }}>Étudiant</option>
                        <option value="Doctorat en cours" {{ old('situation_professionnelle') == 'Doctorat en cours' ? 'selected': '' }}>Doctorat en cours</option>
                        <option value="Professeur" {{ old('situation_professionnelle') == 'Professeur' ? 'selected': '' }}>Professeur</option>
                        <option value="Retraité" {{ old('situation_professionnelle') == 'Retraité' ? 'selected': '' }}>Retraité</option>
                        <option value="À la recherche d'emploi" {{ old('situation_professionnelle') == 'À la recherche d\'emploi' ? 'selected': '' }}>À la recherche d'emploi</option>
                        <option value="Autre profession" {{ old('situation_professionnelle') == 'Autre profession' ? 'selected': '' }}>Autre profession</option>
                    </select>
                    @error('situation_professionnelle')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="experience_enseignement">Experience dans l'enseignement</label>
                    <select id="experience_enseignement" class="form-control" name="experience_enseignement">
                        <option selected disabled value="">Expérience dans l'enseignement</option>
                        <option value="Je suis professeur depuis plus d'un an" {{ old('experience_enseignement') == 'Je suis professeur depuis plus d\'un an' ? 'selected': '' }}>Je suis professeur depuis plus d'un an</option>
                        <option value="J'ai eu plusieurs expériences éducatives significatives" {{ old('experience_enseignement') == 'J\'ai eu plusieurs expériences éducatives significatives' ? 'selected': '' }}>J'ai eu plusieurs expériences éducatives significatives</option>
                        <option value="Il m'est arrivé de donner un cours ou deux" {{ old('experience_enseignement') == 'Il m\'est arrivé de donner un cours ou deux' ? 'selected': '' }}>Il m'est arrivé de donner un cours ou deux</option>
                        <option value="Je n'ai pas d'expérience éducative significative" {{ old('experience_enseignement') == 'Je n\'ai pas d\'expérience éducative significative' ? 'selected': '' }}>Je n'ai pas d'expérience éducative significative</option>
                    </select>
                    @error('experience_enseignement')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="situation_familiale">Téléchargez votre CV avec photo obligatoire</label>
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Choisir le fichier</span>
                    </div>
                    <div class="custom-file">
                        <input name="cv" type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label upload-soutien cv" for="inputGroupFile01"> Aucun fichier choisi</label>
                    </div>
                </div>
                    @error('cv')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="situation_familiale">Téléchargez votre lettre de motivation</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Choisir le fichier</span>
                        </div>
                        <div class="custom-file">
                            <input name="lettre_motivation" type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label upload-soutien lettre_motivation" for="lettre_motivation"> Aucun fichier choisi</label>
                        </div>
                    </div>
                    @error('lettre_motivation')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="specialite_etudes">Votre spécialité</label>
                    <textarea name="specialite_etudes" class="form-control" id="specialite_etudes" rows="3">{{ old('specialite_etudes') }}</textarea>
                    @error('specialite_etudes')
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
                console.log('sdsd');
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
