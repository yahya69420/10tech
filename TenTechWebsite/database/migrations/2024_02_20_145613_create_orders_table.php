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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->decimal('total_before_discount', 8, 2);
            $table->decimal('discount_amount', 8, 2)->nullable();
            $table->decimal('total_after_discount', 8, 2);
            $table->enum('status', ['pending', 'processing', 'completed', 'cancelled'])->default('pending');
            $table->timestamp('order_date')->nullable();
            $table->string('tracking_number')->nullable();
            $table->foreignId('user_address_id')->references('id')->on('user_addresses')->onDelete('cascade');
            $table->foreignId('user_payment_id')->references('id')->on('user_payments')->onDelete('cascade');
            $table->foreignId('discount_id')->nullable()->references('id')->on('discounts')->onDelete('cascade')->nullable();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
            $table->string('address_line_1')->nullable();
            $table->string('address_line_2')->nullable();
            $table->string('city')->nullable();
            $table->string('post_code')->nullable();
            $table->string('country')->nullable();

        });


        // these lines are added to this file because the foreign keys are not created in the order_items table
        // this was due to a migration order issue where the order_items table was created before the orders table
        // this is the pivot table for the many to many relationship between orders and products
        Schema::table('order_items', function (Blueprint $table) {
            $table->foreignId('order_id')->nullable()->references('id')->on('orders')->onDelete('cascade');
            $table->foreignId('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
