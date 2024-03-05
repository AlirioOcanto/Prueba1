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
        Schema::create('reunions', function (Blueprint $table) {
            $table->id();
              $table->string('title');
            $table->text('description');
            $table->dateTime('start')->nullable();
            // day, week, month, year
            $table->date('day')->nullable();
            $table->string('user_name')->nullable();
            $table->string('user_email')->nullable();
            $table->string('user_phone')->nullable();
             $table->string('billing')->nullable();
            $table->string('status')->nullable();
            $table->string('user_address')->nullable();
            // $table->foreignId('sales_id')->constrained()->nullable();
            $table->foreignId('hydrographies_id')->constrained()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reunions');
    }
};
