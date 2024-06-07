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
            $table->string('country')->default('الكويت');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->unsignedBigInteger('coupon_id')->nullable();
            $table->unsignedBigInteger('place_id')->nullable();
            $table->string('avenue');
            $table->string('street');
            $table->string('piece');
            $table->string('house_number');
            $table->decimal('real_cost', 8, 2);
            $table->decimal('coupon_discount', 8, 2)->default(0.00);
            $table->decimal('delivery_cost', 8, 2)->default(0.00);
            $table->decimal('total_cost', 8, 2);
            $table->enum('status', ['pending', 'processing', 'completed', 'cancelled'])->default('pending');
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
