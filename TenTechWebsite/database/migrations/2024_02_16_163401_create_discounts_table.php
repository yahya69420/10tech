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
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable()->unique();
            $table->enum('type', ['fixed', 'percentage'])->default('percentage'); // the type of the discount
            $table->double('value', 8, 2); // the value of the discount
            $table->timestamp('start_date')->nullable(); // the start date of the discount
            $table->timestamp('end_date')->nullable(); // the end date of the discount
            $table->boolean('active');// the status of the discount
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};
