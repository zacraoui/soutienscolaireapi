<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_matier_cycle extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'prix_heure',
        'cycle_id',
        'matiere_id',
        'created_at',
        'updated_at'
    ];
}
