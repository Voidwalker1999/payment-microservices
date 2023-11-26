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
        Schema::create('payments', function (Blueprint $table) {
            $table->integer('payment_id')->primary();
            $table->string('name');
            $table->string('email');
            $table->integer('phone');
            $table->text('address')->nullable();
            $table->string('city');
            $table->integer('zip_code');
            $table->string('country');
            $table->string('payment_method');
            $table->string('currency');
            $table->decimal('amount', 12, 2);
            $table->string('status');
            $table->datetime('payment_date');
            
            $table->unsignedBigInteger('user_id'); // Add user_id column
            $table->foreign('user_id')->references('id')->on('users'); // Create foreign key constraint

            $table->unsignedBigInteger('reference_id'); // Add reference_id column
            $table->foreign('reference_id')->references('id')->on('sales'); // Create foreign key constraint

            $table->unsignedBigInteger('card_id'); // Add card_id column
            $table->foreign('card_id')->references('id')->on('card_info'); // Create foreign key constraint

            $table->unsignedBigInteger('transaction_id'); // Add transaction_id column
            $table->foreign('transaction_id')->references('id')->on('inventory_transaction'); // Create foreign key constraint
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
