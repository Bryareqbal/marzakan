<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sardanikars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nickname')->nullable();
            $table->string('passport_number')->unique();
            $table->date('birth_date');
            $table->boolean('gender');
            $table->string('nation')->default('IRAN');
            $table->string('phone');
            $table->string('img')->nullable();
            $table->date('passport_expire_date')->nullable();
            $table->string('issuing_authority')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sardanikars');
    }
};
