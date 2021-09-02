<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cycle_scolaire extends Model{
    use HasFactory;
    protected $fillable = [
        'id',
        'nom',
        'description',
        'created_at',
        'updated_at'
    ];

    protected function enseignant_cycle_matiere_users(){
        return $this->hasMany('App\Models\Enseignant_Cycle_Matiere_Users');
    }
}
