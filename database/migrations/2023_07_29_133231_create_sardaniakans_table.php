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
        Schema::create('sardaniakans', function (Blueprint $table) {
            $table->id();
            $table->text('purpose_of_coming');
            $table->enum('status', ['coming', 'leaving']);
            $table->double('mount_of_money')->default(5000);
            $table->string('targeted_person')->nullable();
            $table->string('no_of_visitors');
            $table->string('address');
            $table->foreignId('sardanikar_id')->constrained('sardanikars')->cascadeOnDelete();
            $table->foreignId('karmand_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sardaniakans');
    }
};
