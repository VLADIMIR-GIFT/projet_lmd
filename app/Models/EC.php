<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EC extends Model
{
    use HasFactory;

    // Nom de la table
    protected $table = 'ecs';

    // Attributs mass assignables
    protected $fillable = [
        'code',
        'nom',
        'coefficient',
        'enseignant',
        'ue_id',
    ];

    // Relation avec UE
    public function ue()
    {
        return $this->belongsTo(UE::class);
    }
}
