<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nomCompletResponsable',
        'telResponsable',
        'etape',
        'users_id'
    ];
}
