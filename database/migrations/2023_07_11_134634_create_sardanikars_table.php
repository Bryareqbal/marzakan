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
            $table->string('passport_number');
            $table->date('birth_date');
            $table->boolean('gender');
            $table->string('nation')->default('IRAN');
            $table->string('phone');
            $table->text('purpose_of_coming');
            $table->string('address');
            $table->string('img')->nullable();
            $table->enum('status', ['coming', 'leaving']);
            $table->double('mount_of_money')->default(5000);
            $table->string('targeted_person');
            $table->string('no_of_visitors');
            $table->date('passport_expire_date');
            $table->string('issuing_authority');
            $table->foreignId('karmand_id')->constrained('users');
            $table->foreignId('sarparshtyar_id')->constrained('sarparshtyars');
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
