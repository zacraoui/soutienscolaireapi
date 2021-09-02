<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pack extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nom',
        'description',
        'nb_heure_semaine',
    ];
}
