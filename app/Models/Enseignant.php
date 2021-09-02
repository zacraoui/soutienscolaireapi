<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'cin',
        'cv',
        'lettre_motivation',
        'situation_professionnelle',
        'specialite_etudes',
        'situation_familiale',
        'niveau_etudes',
        'experience_enseignement',
        'user_id',
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
