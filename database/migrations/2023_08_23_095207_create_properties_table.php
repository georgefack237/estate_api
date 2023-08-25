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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('town');
            $table->string('quarter')->nullable();
            $table->string('purpose');
            $table->double('longitude');
            $table->double('latitude');
            $table->integer('price')->nullable();
            $table->string('type');
            $table->string('rooms')->nullable();
            $table->string('kitchens')->nullable();
            $table->string('parlours')->nullable();
            $table->string('baths')->nullable();
            $table->text('note')->nullable();
            $table->boolean('is_active')->default(true);
            $table->foreignId('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
