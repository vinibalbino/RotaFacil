<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::table('motorista_viagem', function (Blueprint $table) {
            $table->dropColumn('finished');
        });


        Schema::table('viagens', function (Blueprint $table) {
            $table->boolean('finished')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('motorista_viagem', function (Blueprint $table) {
            $table->boolean('finished')->default(false); // Ou o valor padrão que for necessário
        });


        Schema::table('viagens', function (Blueprint $table) {
            $table->dropColumn('finished');
        });
    }
};
