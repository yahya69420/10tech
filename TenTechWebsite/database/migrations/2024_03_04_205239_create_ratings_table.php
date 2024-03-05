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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->string('user_id'); // ID of the user who made the rating
            $table->string('prod_id'); // ID of the product being rated
            $table->string('stars_rated'); //Number of stars given in the rating
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * Rolling back migration , for deleting the ratings table in database if exists
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
