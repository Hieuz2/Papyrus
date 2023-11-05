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
        Schema::create('OderCart', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cart_id');
            $table->decimal('total_amount', 10, 0);
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('name')->nullable();
            $table->foreign('cart_id')->references('id')->on('cart');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('OderCart');
    }
};
