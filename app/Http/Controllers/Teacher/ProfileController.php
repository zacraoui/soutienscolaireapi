<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Cycle_scolaire;
use App\Models\Enseignant;
use App\Models\Enseignant_Cycle_Matiere_Users;
use App\Models\Matiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matieres = Enseignant_Cycle_Matiere_Users::where('user_id', Auth::id())
            ->where('enseignant_id',  Auth::user()->enseignant->id)
            ->get();
        $cities = City::where('country_code','MAR')->get();
        $matieres_niveaux = Matiere::all();
        $cycle_scolaires = Cycle_scolaire::all();
        return view('dashboard.teacher.pages.profile.index', compact('matieres','cities', 'matieres_niveaux', 'cycle_scolaires'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    public function viewCv()
    {
        $file = public_path('files/cvs/'.Auth::user()->enseignant->cv);
        return response()->file($file);
    }

    public function viewLm()
    {
        $file = public_path('files/lettre_motivation/'.Auth::user()->enseignant->lettre_motivation);
        return response()->file($file);
    }

    public function getUsers()
    {
        return Enseignant::all();
    }
}
