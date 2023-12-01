<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class car extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'couleur',
        'marque',
        'kilometrage',
        'annee',
        'photo1',
        'photo2',
        'photo3',
        'photo4',
    ];
}
