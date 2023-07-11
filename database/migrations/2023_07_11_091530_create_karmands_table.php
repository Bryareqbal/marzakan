<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('karmands', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sarparshtyar_id')->constrained('sarparshtyars');
            $table->string('name');
            $table->string('phone')->unique();
            $table->unique(['sarparshtyar_id','phone']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karmands');
    }
};
