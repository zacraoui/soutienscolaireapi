<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enseignant_Cycle_Matiere_Users extends Model
{
    use HasFactory;

    protected function matiere(){
        return $this->belongsTo('App\Models\Matiere');
    }

    protected function cycle_scolaire(){
        return $this->belongsTo('App\Models\Cycle_scolaire');
    }
}
