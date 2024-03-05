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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->constrained();
            $table->string('model');
            $table->string('model_year');
            $table->string('version');
            $table->string('type')->nullable();
            // description text
            $table->text('description')->nullable();
            $table->string('color')->nullable();
            $table->string('price')->nullable();
            $table->string('productor_name')->nullable();
            $table->string('productor_phone')->nullable();
            $table->string('productor_email')->nullable();
            $table->string('productor_website')->nullable();
            // image
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
