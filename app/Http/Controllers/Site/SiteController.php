<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Cycle_scolaire;
use App\Models\District;
use App\Models\Enseignant;
use App\Models\Enseignant_Cycle_Matiere_Users;
use App\Models\Matiere;
use App\Models\Matiere_Niveau;
use App\Models\Niveau_etude;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Image;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('site.pages.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        return view('');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function accountTeacher()
    {
        $step = 1;

        return view('site.pages.teacher.account', compact('step'));
    }

    public function storeAccountTeacher(Request $request)
    {
        $request->validate([
            'civilite'     => 'required|string|max:255',
            'nom'    => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        $user = User::create([
            'civilite' => $request->input('civilite'),
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'slug' => Str::slug(Str::lower($request->input('nom'). ' ' .$request->input('prenom'))).'-'.Carbon::now()->getTimestamp(),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);
        $userRole = Role::where('name','teacher')->first();
        $user->roles()->attach($userRole);

        return redirect()->route('info_personnel.prof');
    }


    public function infosPersonnel()
    {
//        dd('nab');
        $cities = City::where('country_code','MAR')->get();
//        dd($cities);
        $step = 2;
        return view('site.pages.teacher.personnel', compact('step','cities'));
    }
    public function infosProfessionnelle()
    {

        $step = 3;
        return view('site.pages.teacher.professionnelle', compact('step'));
    }

    public function matiere()
    {
        $matieres = Matiere::all();
        $cycle_scolaires = Cycle_scolaire::all();
        $step = 4;
        return view('site.pages.teacher.matiere', compact('step','matieres', 'cycle_scolaires'));
    }

    public function complete()
    {
        $step = 5;
        return view('site.pages.teacher.complete', compact('step'));
    }


    public function storeInfosProfessionnelle(Request $request)
    {
//                dd($request);
        $request->validate([
            'annee_bac'     => 'required',
            'niveau_etudes'    => 'required',
            'situation_professionnelle' => 'required',
            'experience_enseignement' => 'required',
            'cv' => 'required|mimes:pdf|max:2048',
            'lettre_motivation' => 'required|mimes:pdf|max:2048',
        ]);

        $teacher = Enseignant::where('user_id', Auth::user()->id)->first();
        $teacher->user_id = Auth::user()->id;

        $teacher->annee_bac = $request->input('annee_bac');
        $teacher->niveau_etudes = $request->input('niveau_etudes');
        $teacher->situation_professionnelle = $request->input('situation_professionnelle');
        $teacher->experience_enseignement = $request->input('experience_enseignement');
        $cv = $request->file('cv');
        $cvName = time().'-'.$cv->getClientOriginalName();
        $cv->move('files/cvs',$cvName);

        $lettre_motivation = $request->file('lettre_motivation');
        $lettre_motivation_name =  time().'-'.$lettre_motivation->getClientOriginalName();
        $lettre_motivation->move('files/lettre_motivation',$lettre_motivation_name);
        $teacher->cv = $cvName;
        $teacher->lettre_motivation = $lettre_motivation_name;
        $teacher->specialite_etudes = $request->input('specialite_etudes');
        $teacher->save();
        return redirect()->route('matiere.prof');
    }


    public function storeInfosPersonnel(Request $request)
    {
//        dd($request);
//        pattern="^\+212(\s+)?\(?(06|07)\)?(\s+)?[0-9]{4}-?[0-9]{4}-?$"

//        dd($request->input('photo_profil'));
        $request->validate([
            'cin'     => 'required|unique:enseignants',
            'ville'     => 'required',
            'quartier'    => 'required',
            'telephone_portable' => 'required',
            'telephone_fix' => 'required',
            'date_naissance' => 'required',
            'situation_familiale' => 'required',
            'photo_profil' => 'required'
        ]);

        $personnel = User::find(Auth::user()->id);
        $personnel->ville = $request->input('ville');
        $personnel->quartier = $request->input('quartier');
        $personnel->tel = $request->input('telephone_portable');
        $personnel->fix = $request->input('telephone_fix');
        $personnel->date_naissance =  Carbon::createFromFormat('d-m-Y',$request->input('date_naissance'))->format('Y-m-d');

        if($request->hasFile('photo_profil')){
            $photo_profil = $request->file('photo_profil');
            $fileName = $photo_profil->getClientOriginalName();
            $destinationPath = 'files/images/' . $fileName;
//            dd($destinationPath);
            Image::make($photo_profil)->resize(160, 160)->save($destinationPath);
            $personnel->photo_profil = $fileName;
        }

        $personnel->save();
        $teacher = new Enseignant();
        $teacher->user_id = $personnel->id;
        $teacher->cin = $request->input('cin');
        $teacher->situation_familiale = $request->input('situation_familiale');
        $teacher->save();
        return redirect()->route('info_professionnelle.prof');
    }

    public function storeMatiere(Request $request)
    {
//        dd($request);
        $request->validate([
            'matieres' => 'required',
            'niveaux' => 'required',
        ]);

        $matieres = $request->matieres;
        $niveaux = $request->niveaux;
//        dd($matieres);
        foreach ($matieres as $key => $row){
            $matiere = new Enseignant_Cycle_Matiere_Users();
            $matiere->matiere_id = $row;
            $matiere->cycle_scolaire_id = $niveaux[$key];
            $matiere->user_id = Auth::user()->id;
            $matiere->enseignant_id= Auth::user()->enseignant->id;
            $matiere->save();
        }
        return redirect()->route('complete');

    }

    public function storeComplete()
    {
        return redirect()->route('site.home');
    }

    public function districts(Request $request){
        $value = $request->get('value');
        $city = City::where('name',$value)->first();
        $districts = District::where('city_id',$city->id)->get();
        $outputDistricts = '<option value="" disabled selected>Choisir La Quartier</option>';

        foreach ($districts as $row){
            $outputDistricts .= '<option value="'.$row->name.'">'.$row->name.'</option>';
        }
        echo $outputDistricts;
    }

    public function districtsBy(Request $request){
        $value = $request->get('value');
        $city = City::where('name',$value)->first();
        $districts = District::where('city_id',$city->id)->get();
        $outputDistricts = '<option value="" disabled selected>Choisir La Quartier</option>';

        foreach ($districts as $row){
//            $outputDistricts .= '<option value="'.$row->name.'"'.(Auth::user()->ville == $row->name) ? " selected" : "".'>'.$row->name.'</option>';

            $outputDistricts .= '<option value="'.$row->name.'"';

            $outputDistricts .= (Auth::user()->quartier == $row->name) ? " selected" : "";
            $outputDistricts .= '>'.$row->name.'</option>';
//            $outputDistricts .= '<option value="'.$row->name.'" selected>'.$row->name.'</option>';
//            $outputDistricts .= '<option value="'.$row->name.''. (Auth::user()->ville == $row->name) ? " selected" : ""' ">'.$row->name.'</option>';
//            if($row->name == Auth::user()->ville){
//
//
//            }
//            dd(Auth::user()->quartier);
        }
        echo $outputDistricts;
    }

    public function redirectTo()
    {
        if(Auth::user()->hasRole('teacher')){
            return redirect()->route('info_personnel.prof');
        }
        else if(Auth::user()->hasRole('student')){
            return redirect()->route('info_personnel.etudiant');
        }
        else{
            return redirect()->route('test');
        }

    }
}
