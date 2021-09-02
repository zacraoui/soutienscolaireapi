<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_etudiant_recu extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_recu',
        'is_validate',
        'etudiant_id',
        'users_id'
    ];
}
