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
        Schema::create('hydrographies', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('productor_name')->nullable();
            $table->string('productor_phone')->nullable();
            $table->string('productor_email')->nullable();
            $table->string('productor_website')->nullable();
            $table->string('type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hydrographies');
    }
};
