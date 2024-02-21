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
