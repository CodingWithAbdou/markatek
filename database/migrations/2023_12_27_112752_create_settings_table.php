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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('setting_key');
            $table->string('setting_value');
            $table->string('title_ar');
            $table->string('title_en');
            $table->string('type_id')->default('1')->comment('1 input, 2 image , 3 textarea, 4 manual');
            $table->string('category')->default('1')->comment('1 basic, 2 contact info, 3 social media, 4 other, 5 services');
            $table->integer('order_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
