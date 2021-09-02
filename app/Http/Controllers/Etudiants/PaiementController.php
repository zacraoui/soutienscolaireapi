<?php

namespace App\Http\Controllers\Etudiants;

use App\Http\Controllers\Controller;
use App\Models\Detail_etudiant_pack;
use App\Models\Detail_etudiant_recu;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Facture;
use Illuminate\Support\Facades\File;

class PaiementController extends Controller
{
    //
    public function Ok_Fail(Request $req){
        if($req->Response=="Approved"){
            $fac=Facture::where([['users_id', $req->idUsr],['status', "encore"]])->first();
            $fac->status="approved";
            $fac->save();

            $et=Etudiant::where('users_id',Auth::user()->id)->first();
            $et->etape="dashboard";
            $et->save();

            dd("votre paiement a effectué avec succès !");
        }else{
            dd("échec de paiement !");
        }

    }

    public function paiement_par_recu(Request $req){

        if($req->hasFile('lien_recu')){
            $recu=Detail_etudiant_recu::where("users_id",Auth::user()->id)->first();
            $recuEnv = $req->file('lien_recu');
            $new_recu = uniqid() .'_'. str_replace(' ', '', Auth::user()->prenom.'_'.Auth::user()->nom);
            $recuEnv->move('etudiants/recus/', $new_recu);
            //01-la supprission de recu si il est déja existe
            if(!empty($recu->id)){
                $fileE = public_path('etudiants\recus\\'.$recu->nom_recu);
                if( File::exists($fileE)){
                    File::delete($fileE);
                }
                $recu->is_validate=false;
                $recu->nom_recu=$new_recu;
                $recu->save();
            }
            else{
                $recu_n=new Detail_etudiant_recu();
                $recu_n->nom_recu=$new_recu;
                $recu_n->etudiant_id=Etudiant::where('users_id',Auth::user()->id)->first()->id;
                $recu_n->users_id=Auth::user()->id;
                $recu_n->is_validate=false;
                $recu_n->save();
            }

            $et=Etudiant::where('users_id',Auth::user()->id)->first();
            $et->etape="paiement";
            $et->save();

            $message="Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquam cumque vero accusamus labore voluptatum ipsum voluptatem.";
            return view('etudiants.not_payed.paiement.info_paiement',['msg' => $message ]);
        }
    }
}
