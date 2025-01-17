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
        Schema::create('viagens', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('km_inicial');
            $table->bigInteger('km_final');
            $table->timestamps();

            $table->foreignId('veiculo_id')->constrained('veiculos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('viagens');
    }
};
