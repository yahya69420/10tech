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
        Schema::create('cart', function (Blueprint $table) {
            $table->id();
            // create a foreign key that references the id column in the users table
            $table->foreignId('user_id')->constrained();
            // create a foreign key that references the id column in the products table
            $table->foreignId('product_id')->constrained();
            $table->integer('quantity')->default(1);
            $table->decimal('total', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart');
    }
};
