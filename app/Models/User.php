<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'civilite',
        'nom',
        'prenom',
        'adresse',
        'ville',
        'quartier',
        'tel',
        'fix',
        'date_naissance',
        'email',
        'password',
        'slug',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        return $this->belongsToMany('App\Models\Role','role_users');
    }

    public function hasRole($role)
    {
        if($this->roles()->where('name', $role)->first()){
            return true;
        }

        return false;
    }

    public function enseignant()
    {
        return $this->hasOne('App\Models\Enseignant');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function age()
    {
        return Carbon::parse($this->attributes['date_naissance'])->age;
    }

    public function formatDate()
    {
        return Carbon::createFromFormat('d-m-Y',$request->input('date_naissance'))->format('Y-m-d');
    }
}
