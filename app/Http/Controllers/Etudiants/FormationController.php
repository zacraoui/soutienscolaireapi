<?php

namespace App\Http\Controllers\Etudiants;

use App\Http\Controllers\Controller;
use App\Models\detail_etudiant_matier;
use App\Models\Detail_etudiant_pack;
use App\Models\Enseignant;
use Illuminate\Http\Request;
use App\Models\Matiere_Niveau;
use App\Models\Etudiant;
use App\Models\Niveau_etude;
use App\Models\Matiere;
use App\Models\Facture;
use App\Models\Pack;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class FormationController extends Controller
{

    //
    public function niveau_etude(Request $request){
        $value = $request->get('value');
        $niveau_etudes = Niveau_etude::where('cycle_id',$value)->get();
        $outputNiveau_etude = '<option value="" disabled selected>Choisir votre niveau d\'etude</option>';

        foreach ($niveau_etudes as $row){
            $outputNiveau_etude .= '<option value="'.$row->id.'">'.$row->nom.'</option>';
        }
        echo $outputNiveau_etude;
    }

     //
    public function ajouterMatiere(Request $request){
        $output = '<tr class="matiere">';
        $output .= '<td>'.
               ' <select class="custom-select" id="id-matiere">'.
                   ' <option selected disabled value="">Choisir une matiere</option>';
                    foreach(Matiere::all() as $matiere){
                        $output .='<option value="'.$matiere->id .'" >'. $matiere->nom.'</option>';
                    }
        $output .='</select>'.
                '</td>'.
                '<td>'.
                '<input class="form-control" type="text" placeholder="Nombre d\'heure" id="nbre-heure">'.
            '</td>'.
            '<td>'.
           '<button type="button" class="btn btn-danger float-right btnsup" id="btn_sup">Supprimer <i class="fas fa-trash-alt"></i></button>'.
             '</td>'.
        '</tr>';
        echo $output;
    }

    public function nb_heure(Request $request){
        $value = $request->get('value');
        $nb_heures = Pack::find($value)->nb_heure_semaine;
        return $nb_heures;
    }

    public function enregister_formation(Request $request){
        //01-l'ajout de les informatios de la formation (detail_etudiant_packs)
        $formation = $request->get('formation');
        $dep=new Detail_etudiant_pack();
        $dep->rythme=$formation['rythme'];
        $dep->pack_id=$formation['pack_id'];
        $dep->formation_id=$formation['formation_id'];
        $dep->etudiant_id=Etudiant::where('users_id',Auth::user()->id)->first()->id;
        $dep->users_id=Auth::user()->id;
        $dep->save();

        //02-l'ajout de les matiéres (detail_etudiant_matiers)
        $matieres= json_decode($request->get('matieres'),true);
        foreach($matieres['array'] as $key => $value){
            $dem=new detail_etudiant_matier();
            $dem->nb_heure_semaine=$value["nbre_heure"];
            $dem->matiere_id=$value["matiere_id"];
            $dem->detail_etudiant_packs_id=$dep->id;
            $dem->save();
        }

        //03-remplissage des info de la facture
        $fac=new Facture();
        $fac->date_debut_formation=Carbon::now();
        if($dep->rythme=="Mensuel")
            $fac->date_fin_formation=Carbon::now()->addMonths();
        else if($dep->rythme=="3 mois")
            $fac->date_fin_formation=Carbon::now()->addMonths(3);
        else
           $fac->date_fin_formation=Carbon::now()->addMonths(12);
        $fac->num=uniqid();
        $fac->status="encore";
        $fac->formation_id=$dep->formation_id;
        $fac->etudiant_id=Etudiant::where('users_id',Auth::user()->id)->first()->id;
        $fac->users_id=Auth::user()->id;
        $fac->save();
        //
        $et=Etudiant::where('users_id',Auth::user()->id)->first();
        $et->etape="formation";
        $et->save();

        echo(redirect()->route('etudiant.disponibilite')->getTargetUrl());
    }
}
