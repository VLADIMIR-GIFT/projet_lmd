<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Modifie la colonne 'enseignant' pour la rendre nullable
        Schema::table('ecs', function (Blueprint $table) {
            $table->string('enseignant')->nullable()->default('Inconnu')->change();
        });
    }

    public function down()
    {
        // Si vous souhaitez annuler cette migration, vous devrez remettre la colonne comme NOT NULL
        Schema::table('ecs', function (Blueprint $table) {
            $table->string('enseignant')->nullable(false)->default(null)->change();
        });
    }
};
