<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiere_Niveau extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'matiere',
        'max_niveau',
        'matiere_id',
        'user_id'
    ];
}
