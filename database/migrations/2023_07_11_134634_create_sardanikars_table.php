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
        Schema::create('sardanikars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nickname');
            $table->string('password_number');
            $table->date('birth_date');
            $table->boolean('gender');
            $table->string('nation');
            $table->string('phone');
            $table->text('purpose_of_coming');
            $table->string('address');
            $table->string('img');
            $table->enum('status', ['coming', 'leaving']);
            $table->enum('mount_of_money', ['free', '5000', '1000']);
            $table->string('targeted_person');
            $table->number('no_of_visitors');
            $table->date('passport_expire_date');
            $table->string('issuing_authority');
            $table->foreignId('user_id')->constrained('users');
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
