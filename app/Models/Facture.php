<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model{
    use HasFactory;
    protected $fillable = [
        'id',
        'num',
        'date_debut_formation',
        'date_fin_formation',
        'status',
        'formation_id',
        'etudiant_id',
        'users_id',
        'created_at',
        'updated_at'
    ];
}
