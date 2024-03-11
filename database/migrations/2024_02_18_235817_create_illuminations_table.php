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
        Schema::create('illuminations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('light_id')->constrained();
            $table->string('model');
            $table->string('model_year');
            $table->string('version');
            $table->string('price')->nullable();
            $table->string('brand_id');
            $table->string('productor_name')->nullable();
            $table->string('productor_phone')->nullable();
            $table->string('productor_email')->nullable();
            $table->string('productor_website')->nullable();

            // path to image
            $table->string('image');
            $table->text('description')->nullable();
            // model
            // auto brand
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('illuminations');
    }
};
