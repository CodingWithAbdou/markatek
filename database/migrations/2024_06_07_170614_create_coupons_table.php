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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('code')->nullable();
            $table->decimal('value_discount', 20, 3)->default(0.00);
            $table->enum('type_discount', ['direct', 'percent'])->default('direct');
            $table->boolean('status')->default(true);
            $table->dateTime('expired_at')->nullable();
            $table->dateTime('used_at')->nullable();
            $table->integer('usage_limit')->default(1);

            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
