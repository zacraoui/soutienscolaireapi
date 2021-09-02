@extends('layouts.register')

@section('content')
    <div class="container" id="page_compte_etudiant"><br>
        <h3 class="text-center txt-titre">Postuler pour devenir professeur de TamTech</h3>
        <form method="POST" action="{{ route('store_matiere.prof') }}" id="frm_new_compte_etudiant" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="type_usr" value="prof">
            <div class="infos">
                <p>Pour chaque matière, indiquez le niveau maximal que vous pouvez enseigner :</p>
                <div class="after-add-more">
                    <div class="form-group">
                        <label for="matiere">Matière</label>
                        <select id="matiere" class="form-control" name="matieres[]">
                            <option selected disabled value="">Matière</option>
                            @foreach($matieres as $matiere)
                                <option value="{{ $matiere->id }}">{{ $matiere->nom }}</option>
                            @endforeach
                        </select>
                        @error('matieres')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="niveau">Niveau</label>
                        <select id="niveau" class="form-control" name="niveaux[]">
                            <option selected disabled value="">Niveau</option>
                            @foreach($cycle_scolaires as $cycle_scolaire)
                                <option value="{{ $cycle_scolaire->id }}">{{ $cycle_scolaire->nom }}</option>
                            @endforeach
                        </select>
                        @error('niveaux')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="col-md-4 offset-md-8 text-right">
                            <button type="button" id="add-more" name="add-more" class="btn btn-primary pull-right add-more">Ajouter</button>
                        </div>
                    </div>
                </div>

                <div class="copy d-none">
                    <div class="field">
                        <div class="form-group">
                            <label for="matiere">Matiere</label>
                            <select id="matiere" class="form-control" name="matieres[]">
                                <option selected disabled value="">Matiere</option>
                                @foreach($matieres as $matiere)
                                    <option value="{{ $matiere->id }}">{{ $matiere->nom }}</option>
                                @endforeach
                            </select>
                            @error('matieres')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="niveau">Niveau</label>
                            <select id="niveau" class="form-control" name="niveaux[]">
                                <option selected disabled value="">Niveau</option>
                                @foreach($cycle_scolaires as $cycle_scolaire)
                                    <option value="{{ $cycle_scolaire->id }}">{{ $cycle_scolaire->nom }}</option>
                                @endforeach
                            </select>
                            @error('situation_professionnelle')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="col-md-4 offset-md-8 text-right">
                                <button type="button" class="btn btn-danger pull-right remove">Remove</button>
                            </div>
                        </div>
                    </div>
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
{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            //@naresh action dynamic childs--}}
{{--            var next = 0;--}}
{{--            $("#add-more").click(function(e){--}}
{{--                e.preventDefault();--}}
{{--                var addto = "#field" + next;--}}
{{--                var addRemove = "#field" + (next);--}}
{{--                next = next + 1;--}}
{{--                var newIn = '<div id="field'+next+'">'+--}}
{{--                                '<div class="form-group">'+--}}
{{--                                    '<label for="niveau_etudes'+next+'">Niveau atteint dans les études</label>'+--}}
{{--                                    '<select id="niveau_etudes'+next+'" class="form-control" name="niveau_etudes'+next+'">'+--}}
{{--                    '<option selected disabled value="">Niveau atteint dans les études</option>'+--}}
{{--                    '<option value="Bac+3">Bac+3 / Licence</option>'+--}}
{{--                    '<option value="Bac+4">Bac+4 / Maîtrise</option>'+--}}
{{--                    '<option value="Bac+5">Bac+5 / Master</option>'+--}}
{{--                    '<option value="Bac+6">Bac+6</option>'+--}}
{{--                    '<option value="Doctorat">Doctorat</option>'+--}}
{{--                    '</select>'+--}}
{{--                    '</div>'+--}}
{{--                    '<div class="form-group">'+--}}
{{--                '<label for="situation_professionnelle'+next+'">Situation Professionnelle</label>'+--}}
{{--                '<select id="situation_professionnelle'+next+'" class="form-control" name="situation_professionnelle'+next+'">'+--}}
{{--                '<option selected disabled value="">Situation Professionnelle</option>'+--}}
{{--                '<option value="Étudiant">Étudiant</option>'+--}}
{{--                '<option value="Doctorat en cours">Doctorat en cours</option>'+--}}
{{--                '<option value="Professeur">Professeur</option>'+--}}
{{--                '<option value="Retraité">Retraité</option>'+--}}
{{--                '<option value="À la recherche d\'emploi">À la recherche d\'emploi</option>'+--}}
{{--                '<option value="Autre profession">Autre profession</option>'+--}}
{{--                '</select>'+--}}
{{--                '</div>'+--}}

{{--                '</div>';--}}

{{--                var newInput = $(newIn);--}}
{{--                var removeBtn ='<div class="form-group">'+--}}
{{--                    '<div class="col-md-4 offset-md-8 text-right">'+--}}
{{--                    '<button type="button" id="add-more'+ (next - 1) +'" name="add-more" class="btn btn-danger pull-right">Annuler</button>'+--}}
{{--                    '</div>'+--}}
{{--                    '</div>';--}}
{{--                // var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >Remove</button></div></div><div id="field">';--}}
{{--                var removeButton = $(removeBtn);--}}
{{--                $(addto).after(newInput);--}}
{{--                $(addRemove).after(removeButton);--}}
{{--                $("#field" + next).attr('data-source',$(addto).attr('data-source'));--}}
{{--                $("#count").val(next);--}}

{{--                $('.remove-me').click(function(e){--}}
{{--                    e.preventDefault();--}}
{{--                    var fieldNum = this.id.charAt(this.id.length-1);--}}
{{--                    var fieldID = "#field" + fieldNum;--}}
{{--                    $(this).remove();--}}
{{--                    $(fieldID).remove();--}}
{{--                });--}}
{{--            });--}}

{{--        });--}}
{{--    </script>--}}
{{--    <script>--}}
{{--        $(document).ready(function(){--}}
{{--            var next = 1;--}}
{{--            $(".add-more").click(function(e){--}}
{{--                e.preventDefault();--}}
{{--                var addto = "#field" + next;--}}
{{--                var addRemove = "#field" + (next);--}}
{{--                next = next + 1;--}}
{{--                var newIn = '<input autocomplete="off" class="input form-control" id="field' + next + '" name="field' + next + '" type="text">';--}}
{{--                var newInput = $(newIn);--}}
{{--                var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >-</button></div><div id="field">';--}}
{{--                var removeButton = $(removeBtn);--}}
{{--                $(addto).after(newInput);--}}
{{--                $(addRemove).after(removeButton);--}}
{{--                $("#field" + next).attr('data-source',$(addto).attr('data-source'));--}}
{{--                $("#count").val(next);--}}

{{--                $('.remove-me').click(function(e){--}}
{{--                    e.preventDefault();--}}
{{--                    var fieldNum = this.id.charAt(this.id.length-1);--}}
{{--                    var fieldID = "#field" + fieldNum;--}}
{{--                    $(this).remove();--}}
{{--                    $(fieldID).remove();--}}
{{--                });--}}
{{--            });--}}



{{--        });--}}

{{--    </script>--}}
    <script>
        $(document).ready(function() {
            $(".add-more").click(function(){
                var html = $(".copy").html();
                $(".after-add-more").after(html);
            });
            $("body").on("click",".remove",function(){
                $(this).parents(".field").remove();
            });
        });
    </script>
@endsection
