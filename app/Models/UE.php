<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UE extends Model
{

    use HasFactory;

    protected $table = 'u_e_s'; // Assurez-vous d'utiliser le bon nom de table

    protected $fillable = ['code', 'nom', 'credits_ects', 'semestre'];

    public function ecs()
    {
        return $this->hasMany(EC::class , 'ue_id');
    }

}
