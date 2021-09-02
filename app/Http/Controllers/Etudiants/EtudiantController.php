<?php

namespace App\Http\Controllers\Etudiants;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Etudiant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function Suite_inscription(Request $req){
        //01-modification des données de user
        $usr=User::find(Auth::user()->id);
        $usr->date_naissance=$req->date_naissance;
        $usr->ville=$req->city;
        $usr->quartier=$req->quartier;
        $usr->fix=$req->fix;
        $usr->tel=$req->tel;
        $usr->save();

        //02-modification des données de user
        $etdM=Etudiant::where("users_id",Auth::user()->id)->first();
        if($etdM==null){
            $etd=new Etudiant();
            $etd->nomCompletResponsable=$req->nom_responsable;
            $etd->telResponsable=$req->tel_responsable;
            $etd->etape="info_personnel";
            $etd->users_id=Auth::user()->id;
            $etd->save();
        }
        else{
            $etdM=Etudiant::where("users_id",Auth::user()->id)->first();
            $etdM->nomCompletResponsable=$req->nom_responsable;
            $etdM->telResponsable=$req->tel_responsable;
            $etdM->etape="info_personnel";
            $etdM->save();
        }
        return view('etudiants.not_payed.formation');
        //dd(Etudiant::where("users_id",Auth::user()->id)->count());
    }
}
