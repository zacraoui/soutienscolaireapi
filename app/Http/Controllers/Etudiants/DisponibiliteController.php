<?php

namespace App\Http\Controllers\Etudiants;

use App\Http\Controllers\Controller;
use App\Models\Disponibilite;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DisponibiliteController extends Controller{
    //
    public function enregister_disponibilite(Request $req){
        //Jour 1
        $disj1=Disponibilite::where([["users_id",Auth::user()->id],["jour","Lundi"]])->first();
        if(empty($disj1)){
            $dis=new Disponibilite();
            $dis->jour="Lundi";
            $dis->heure_debut=$req->heureDJ1;
            $dis->heure_fin=$req->heureFJ1;
            $dis->users_id=Auth::user()->id;
            $dis->etudiant_id=Etudiant::where("users_id",Auth::user()->id)->first()->id;
            $dis->save();
        }
        else{
            $disj1->jour="Lundi";
            $disj1->heure_debut=$req->heureDJ1;
            $disj1->heure_fin=$req->heureFJ1;
            $disj1->users_id=Auth::user()->id;
            $disj1->etudiant_id=Etudiant::where("users_id",Auth::user()->id)->first()->id;
            $disj1->save();
        }

        //Jour 2
        $disj2=Disponibilite::where([["users_id",Auth::user()->id],["jour","Mardi"]])->first();
        if (empty($disj2)) {
            $dis=new Disponibilite();
            $dis->jour="Mardi";
            $dis->heure_debut=$req->heureDJ2;
            $dis->heure_fin=$req->heureFJ2;
            $dis->users_id=Auth::user()->id;
            $dis->etudiant_id=Etudiant::where("users_id", Auth::user()->id)->first()->id;
            $dis->save();
        }
        else{
            $disj2->jour="Mardi";
            $disj2->heure_debut=$req->heureDJ2;
            $disj2->heure_fin=$req->heureFJ2;
            $disj2->users_id=Auth::user()->id;
            $disj2->etudiant_id=Etudiant::where("users_id", Auth::user()->id)->first()->id;
            $disj2->save();
        }
        //Jour 3
        $disj3=Disponibilite::where([["users_id",Auth::user()->id],["jour","Mercredi"]])->first();
        if (empty($disj3)) {
            $dis=new Disponibilite();
            $dis->jour="Mercredi";
            $dis->heure_debut=$req->heureDJ3;
            $dis->heure_fin=$req->heureFJ3;
            $dis->users_id=Auth::user()->id;
            $dis->etudiant_id=Etudiant::where("users_id", Auth::user()->id)->first()->id;
            $dis->save();
        }
        else{
            $disj3->jour="Mercredi";
            $disj3->heure_debut=$req->heureDJ3;
            $disj3->heure_fin=$req->heureFJ3;
            $disj3->users_id=Auth::user()->id;
            $disj3->etudiant_id=Etudiant::where("users_id", Auth::user()->id)->first()->id;
            $disj3->save();
        }
        //Jour 4
        $disj4=Disponibilite::where([["users_id",Auth::user()->id],["jour","Jeudi"]])->first();
        if (empty($disj4)) {
            $dis=new Disponibilite();
            $dis->jour="Jeudi";
            $dis->heure_debut=$req->heureDJ4;
            $dis->heure_fin=$req->heureFJ4;
            $dis->users_id=Auth::user()->id;
            $dis->etudiant_id=Etudiant::where("users_id", Auth::user()->id)->first()->id;
            $dis->save();
        }
        else{
            $disj4->jour="Jeudi";
            $disj4->heure_debut=$req->heureDJ4;
            $disj4->heure_fin=$req->heureFJ4;
            $disj4->users_id=Auth::user()->id;
            $disj4->etudiant_id=Etudiant::where("users_id", Auth::user()->id)->first()->id;
            $disj4->save();
        }
        //Jour 5
        $disj5=Disponibilite::where([["users_id",Auth::user()->id],["jour","Vendredi"]])->first();
        if (empty($disj5)) {
            $dis=new Disponibilite();
            $dis->jour="Vendredi";
            $dis->heure_debut=$req->heureDJ5;
            $dis->heure_fin=$req->heureFJ5;
            $dis->users_id=Auth::user()->id;
            $dis->etudiant_id=Etudiant::where("users_id", Auth::user()->id)->first()->id;
            $dis->save();
        }
        else{
            $disj5->jour="Vendredi";
            $disj5->heure_debut=$req->heureDJ5;
            $disj5->heure_fin=$req->heureFJ5;
            $disj5->users_id=Auth::user()->id;
            $disj5->etudiant_id=Etudiant::where("users_id", Auth::user()->id)->first()->id;
            $disj5->save();
        }
        //Jour 6
        $disj6=Disponibilite::where([["users_id",Auth::user()->id],["jour","Samedi"]])->first();
        if (empty($disj6)) {
            $dis=new Disponibilite();
            $dis->jour="Samedi";
            $dis->heure_debut=$req->heureDJ6;
            $dis->heure_fin=$req->heureFJ6;
            $dis->users_id=Auth::user()->id;
            $dis->etudiant_id=Etudiant::where("users_id", Auth::user()->id)->first()->id;
            $dis->save();
        }
        else{
            $disj6->jour="Samedi";
            $disj6->heure_debut=$req->heureDJ6;
            $disj6->heure_fin=$req->heureFJ6;
            $disj6->users_id=Auth::user()->id;
            $disj6->etudiant_id=Etudiant::where("users_id", Auth::user()->id)->first()->id;
            $disj6->save();
        }
        //Jour 7
        $disj7=Disponibilite::where([["users_id",Auth::user()->id],["jour","Samedi"]])->first();
        if (empty($disj7)) {
            $dis=new Disponibilite();
            $dis->jour="Dimanche";
            $dis->heure_debut=$req->heureDJ7;
            $dis->heure_fin=$req->heureFJ7;
            $dis->users_id=Auth::user()->id;
            $dis->etudiant_id=Etudiant::where("users_id", Auth::user()->id)->first()->id;
            $dis->save();
        }
        else{
            $disj7->jour="Dimanche";
            $disj7->heure_debut=$req->heureDJ7;
            $disj7->heure_fin=$req->heureFJ7;
            $disj7->users_id=Auth::user()->id;
            $disj7->etudiant_id=Etudiant::where("users_id", Auth::user()->id)->first()->id;
            $disj7->save();
        }

        $et=Etudiant::where('users_id',Auth::user()->id)->first();
        $et->etape="disponibilité";
        $et->save();

        return redirect()->route('etudiant.paiement');
    }
}
