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
        Schema::create('header1', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->text('title')->nullable();
            $table->text('number_1')->nullable();
            $table->text('number_2')->nullable();
            $table->text('number_3')->nullable();
            $table->text('priority')->default(1000);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('header1');
    }
};
