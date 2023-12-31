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

            $table->unsignedBigInteger('shoe_id');
            $table->index('shoe_id');
            $table->foreign('shoe_id')->references('id')->on('shoes')->onDelete('cascade');

            $table->unsignedBigInteger('payment_id');
            $table->index('payment_id');
            $table->foreign('payment_id')->references('id')->on('payments')->onDelete('cascade');

            $table->unsignedBigInteger('user_id');
            $table->index('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->enum('status', ['PENDING', 'CONFIRMED', 'DONE', 'CANCELLED'])->default('PENDING');
            $table->timestamps();
            $table->softDeletes();
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
