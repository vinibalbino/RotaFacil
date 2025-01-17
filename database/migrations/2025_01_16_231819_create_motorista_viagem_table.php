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
        Schema::create('motorista_viagem', function (Blueprint $table) {
            
            $table->foreignId('viagem_id')->constrained('viagens')->onDelete('cascade');
            $table->foreignId('motorista_id')->constrained('motoristas')->onDelete('cascade');
            $table->timestamps();
            $table->boolean("finished")->default(false);
            $table->primary(['motorista_id', 'viagem_id']);
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motorista_viagem');
    }
};
