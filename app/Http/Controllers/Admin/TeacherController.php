<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enseignant;
use App\Models\User;
use Response;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::whereHas('roles',function (Builder $q){
                    $q->where('name','teacher');
                })->paginate(10);
//        $teachers = Enseignant::paginate(10);
//        dd($teachers);
        return view('dashboard.admin.pages.teacher.index', compact('users'));
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

//    public function students()
//    {
//        return view();
//    }

    public function cvDownload(User $user)
    {
        $file = public_path('files/cvs/'.$user->enseignant->cv);
        $headers = array('Content-Type: application/pdf');

        return Response::download($file,$user->enseignant->cv,$headers);
    }

    public function lettreDownload(User $user)
    {
        $file = public_path('files/lettre_motivation/'.$user->enseignant->lettre_motivation);
        $headers = array('Content-Type: application/pdf');

        return Response::download($file,$user->enseignant->lettre_motivation,$headers);
    }

    public function getUsers()
    {
        $users = User::whereHas('roles',function (Builder $q){
            $q->where('name','teacher');
        })->get();

        return response()->json([$users]);
    }

    public function validTeacher(User $user){
        $teacher = Enseignant::where('user_id',$user->id)->first();
        $check = $teacher->status;
        if($check)
            $teacher->status = false;
        else
            $teacher->status = true;
        $teacher->save();
        return $teacher->status ? 1:0;
    }
}
