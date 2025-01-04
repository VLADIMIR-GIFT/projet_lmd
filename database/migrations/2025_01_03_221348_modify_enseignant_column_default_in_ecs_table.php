<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('ecs', function (Blueprint $table) {
            // Ajouter une valeur par défaut pour la colonne 'enseignant'
            $table->string('enseignant')->default('Inconnu')->change();
        });
    }

    public function down()
    {
        Schema::table('ecs', function (Blueprint $table) {
            // Annuler la valeur par défaut si vous revenez en arrière
            $table->string('enseignant')->default(null)->change();
        });
    }
};
