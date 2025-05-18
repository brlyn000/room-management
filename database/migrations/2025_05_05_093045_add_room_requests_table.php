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
        Schema::create('room_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('room_id');
            $table->string('name');
            $table->string('email');
            $table->date('access_date');
            $table->timestamps();
            
            // Foreign key opsional jika ada relasi rooms table
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('room_requests', function (Blueprint $table) {
            //
        });
    }
};
