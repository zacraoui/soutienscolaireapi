<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_etudiant_pack extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'rythme',
        'pack_id',
        'formation_id',
        'etudiant_id',
        'created_at',
        'updated_at'
    ];
}
