<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('ecs', function (Blueprint $table) {
            $table->string('enseignant')->nullable()->change(); // Rendre nullable
        });
    }

    public function down()
    {
        Schema::table('ecs', function (Blueprint $table) {
            $table->string('enseignant')->nullable(false)->change(); // Rendre non-nullable si vous revenez en arrière
        });
    }
};
