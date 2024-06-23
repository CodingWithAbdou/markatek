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
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->unsignedBigInteger('coupon_id')->nullable()->comment('if coupon is applied');
            $table->unsignedBigInteger('place_id')->nullable();
            $table->string('piece')->nullable();
            $table->string('street')->nullable();
            $table->string('avenue')->nullable();
            $table->string('house_number')->nullable();
            $table->text('note')->nullable()->nullable();
            $table->text('coupon')->nullable();
            $table->enum('payment_method', ['knet', 'credit_card']);
            $table->text('InvoiceId')->nullable();
            $table->text('PaymentId')->nullable();
            $table->text('unique_id')->nullable();
            $table->date('TransactionDate')->nullable();

            $table->decimal('real_cost', 8, 2);
            $table->bigInteger('coupon_discount')->default(0);
            $table->decimal('delivery_cost', 8, 2)->default(0.00);
            $table->decimal('total_cost', 8, 2);
            $table->enum('status', ['pending', 'processing', 'completed', 'cancelled'])->default('cancelled');
            $table->enum('payment_status', ['paid', 'unpaid'])->default('unpaid');
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
