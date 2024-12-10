<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('requirements')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->date('registration_start_date')->nullable();
            $table->date('registration_end_date')->nullable();
            $table->foreignId('company_id')->constrained('company')->onDelete('cascade');  // Pastikan nama tabel benar            $table->foreignId('training_types_id')->constrained()->onDelete('cascade');
            $table->string('training_location')->nullable();
            $table->string('status')->default('active');  // Misalnya status aktif
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');  // Asumsi ada relasi dengan tabel users
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainings');
    }
};
