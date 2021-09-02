
$(document).ready(function(){
    var chemin = window.location.pathname; //chemin reçoit le chemin de l'url, c'est-à-dire /article/1.
    $("#layout-etudiant-not-payed li").removeClass("active");
    //01-etape 1 la creation de compte
    if(chemin=="/etudiant/create"){
        $("#add-compte").addClass("active");
    }
    //02-les informations personnel
    else if(chemin=="/etudiant/info-personnel"){
        $("#info_personnel").addClass("active");
    }
    //03-formation
    else if(chemin=="/etudiant/suite/inscription"){
        $("#formation").addClass("active");
    }
    //04-disponibilite
    else if(chemin=="/etudiant/disponibilite"){
        $("#disponibilite").addClass("active");
    }
    //05-paiement
    else if(chemin=="/etudiant/paiement" || chemin=="/etudiant/paiement-cmi" || chemin=="/etudiant/paiement-recu"){
        $("#paiement").addClass("active");
    }


    /******** */
    $('#city').change(function (){
        if($(this).val() != ''){
            var value = $(this).val();
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
    }); //fin funcion change city

    $('#cycle_scolaire').change(function (){
        if($(this).val() != ''){
            var value = $(this).val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "/niveau-etude",
                method:"GET",
                data:{value:value,_token:_token},
                success:function (result){
                    $('#niveau-etude').html(result);
                }
            })
        }
    }); //fin funcion change cycle_scolaire

    $('#ajouter-matiere').click(function (){
        //la virification de le nbre heure
        $nbre_hp=parseInt($('#nb-heure-semaine-pack').val());
        var nbre_heure=0;
        if($('#nb-heure-semaine-pack').val()!=""){
            $( ".matiere" ).each(function( index ) {
                nbre_heure+=parseInt($(this).find('#nbre-heure').val());
            });//fin foreach m

            if(nbre_heure<$nbre_hp){
                $.ajax({
                    url: "/ajouterMatiere",
                    method:"GET",
                    data:{},
                    success:function (result){
                        $('#tab-matiere').append(result);
                    }
                })
            }
            else{
                alert("Impossible, la valeur doit étre inférieur de "+ $nbre_hp +"!");
                var nb_res=parseInt($nbre_hp)-(nbre_heure-parseInt($( ".matiere" ).last().find('#nbre-heure').val()));
                console.log(parseInt(nb_res));
                if(nb_res!="NaN"){
                    $( ".matiere" ).last().find('#nbre-heure').val(nb_res);
                }
            }
        }//fin if
        else{
            alert("Impossible, veuillez choisir une pack !");
        }
    }); //fin funcion change matiere

    $('#pack').change(function (){
        var value = $(this).val();
        $.ajax({
            url: "/nb-heure",
            method:"GET",
            data:{value:value},
            success:function (result){
                $('#nb-heure-semaine-pack').val(result);
            }
        })
    }); //l'aficahge de nbre heure de chaque pack

    $(document).on('click','#btn_sup', function(event) {
        if (confirm("Vous voulez vraiment supprimer cette matiere ?")) {
            $(this).parent(".matiere").remove();
            $(this).parents('.matiere').addClass('supp');
            $(".supp").remove();
            alert("cette matière est supprimer avec succès !");
        }
    });

    /***** L'ajout des information de formation **** */
    //list
    function list() {
        this.array = [];

        this.add = function (newObject){
            this.array.push(newObject);
        };
    }
    //la classe formation
    function Formation(formation_id,niveau_etude,rythme,pack_id){
        this.formation_id= formation_id;
        this.niveau_etude= niveau_etude;
        this.rythme = rythme;
        this.pack_id = pack_id;
    }
    //la classe matiere
    function Matiere(matiere_id,nbre_heure){
        this.matiere_id= matiere_id;
        this.nbre_heure= nbre_heure;
    }
    var list_matieres=new list();

    $(document).on('click','#btn-enregister-formation', function(event) {

        //les information de frmation
        var formation_id=$('#nom_formation').val();
        var niveau_etude=$('#niveau-etude').val();
        var rythme=$('#rythme').val();
        var pack_id=$('#pack').val();
        formation=new Formation(formation_id,niveau_etude,rythme,pack_id);

        //les matiere
        $( ".matiere" ).each(function( index ) {
            var matiere_id=$(this).find('#id-matiere').val();
            var nbre_heure=$(this).find('#nbre-heure').val();
            matiere=new Matiere(matiere_id,nbre_heure);
            list_matieres.add(matiere);
        });//fin foreach qtn

        var list_matieres_json = JSON.stringify(list_matieres);
        $.ajax({
            type: "GET",
            url: "/etudiant/enregister-formation",
            dataType: "html",
            data: {
                formation: formation,
                matieres: list_matieres_json
             },
            success: function(response) {
                window.location.replace(response);
            }
        });//fin ajax
    });
});
