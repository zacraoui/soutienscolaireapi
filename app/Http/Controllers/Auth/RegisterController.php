<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
//    protected $redirectTo = RouteServiceProvider::HOME;

    public function redirectTo()
    {
        //dd(Auth::user());
        if(Auth::user()->hasRole('teacher')){
            $this->redirectTo = route('info_personnel.prof');
            return $this->redirectTo;
        }
        else if(Auth::user()->hasRole('student')){
            $this->redirectTo = route('info_personnel.etudiant');
            return $this->redirectTo;
        }
        else{
            $this->redirectTo = route('test');
            return $this->redirectTo;
        }

    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
//        dd($data);
        if(isset($data['type_usr']) && $data['type_usr'] == 'etudiant'){

            return Validator::make($data,[
                //'nom' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                //'pwd' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
        }elseif (isset($data['type_usr']) && $data['type_usr'] == 'prof'){
            return Validator::make($data, [
                'civilite' => ['required', 'string', 'max:255'],
                'nom' => ['required', 'string', 'max:255'],
                'prenom' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data){
//        dd(Auth::check());
        if (isset($data['type_usr']) && $data['type_usr'] == 'etudiant') {
            $user = User::create([
                'civilite' => $data['civilite'],
                'nom' => $data['nom'],
                'prenom' => $data['prenom'],
                'slug' => Str::slug(Str::lower($data['nom']. ' ' .$data['prenom'])).'-'.Carbon::now()->getTimestamp(),
                'email' => $data['email'],
                'adresse' => $data['adresse'],
                'password' => Hash::make($data['password'])
            ]);
            $userRole = Role::where('name','student')->first();
            $user->roles()->attach($userRole);
            return $user;
        }elseif(isset($data['type_usr']) && $data['type_usr'] == 'prof'){
            $user = User::create([
                'civilite' => $data['civilite'],
                'nom' => $data['nom'],
                'prenom' => $data['prenom'],
                'slug' => Str::slug(Str::lower($data['nom']. ' ' .$data['prenom'])).'-'.Carbon::now()->getTimestamp(),
                'email' => $data['email'],
                'password' => Hash::make($data['password'])
            ]);
            $userRole = Role::where('name','teacher')->first();
            $user->roles()->attach($userRole);
            return $user;
        }
        else {
            dd("Ce n'est pas une etudiant !!!");
        }
    }
}
