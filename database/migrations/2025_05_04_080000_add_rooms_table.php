<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoomsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->unsignedInteger('capacity');
            $table->unsignedTinyInteger('floor');
            $table->enum('type', ['meeting', 'class', 'laboratory', 'office', 'auditorium']);
            $table->text('description')->nullable();
            $table->json('facilities')->nullable();
            $table->string('code', 20)->unique(); // Auto-generated code
            $table->enum('status', ['available', 'occupied', 'maintenance'])->default('available');
            $table->string('qr_code_path')->nullable();
            $table->string('user')->nullable(); // Optional owner name
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null'); // Foreign key to users table
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
}
