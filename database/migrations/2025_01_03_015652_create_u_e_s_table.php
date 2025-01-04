<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUESTable extends Migration
{
    /**
     * Exécute les migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('u_e_s', function (Blueprint $table) {
            $table->id();  // Clé primaire auto-incrémentée
            $table->string('code')->unique();  // Code unique de l'UE
            $table->string('nom');  // Nom de l'UE
            $table->integer('credits_ects');  // Nombre de crédits ECTS
            $table->string('semestre');  // Semestre dans lequel l'UE est enseignée
            $table->timestamps();  // Pour les dates de création et de mise à jour
        });
    }

    /**
     * Restaure la table.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('u_e_s');
    }
}
