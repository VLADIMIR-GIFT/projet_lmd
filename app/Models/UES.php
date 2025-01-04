<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UES extends Model
{
    use HasFactory;

    // Spécifie le nom de la table si elle ne suit pas la convention de Laravel (pluriel, en minuscules)
    protected $table = 'u_e_s'; // Nom de ta table dans la base de données

    // Définir les champs qui peuvent être assignés en masse (mass assignment)
    protected $fillable = [
        'code',
        'nom',
        'credits_ects',
        'semestre',
    ];

    // Si tu utilises des timestamps, tu peux laisser cette ligne, sinon tu peux la supprimer
    public $timestamps = true;
}
