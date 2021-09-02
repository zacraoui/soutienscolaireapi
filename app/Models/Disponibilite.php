<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disponibilite extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'jour',
        'heure_debut',
        'heure_fin',
        'users_id',
        'enseignant_id',
        'etudiant_id',
        'created_at',
        'updated_at'
    ];
}
