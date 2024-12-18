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
            $table->id('orderid');
            $table->foreignId('userid')->references('userid')->on('users')->onDelete('cascade');
            $table->foreignId('menuid')->references('menuid')->on('menus')->onDelete('cascade'); // Foreign key to menus table
            $table->integer('quantity'); 
            $table->decimal('amount', 8, 2); 
            $table->enum('status', ['pending', 'processing', 'completed'])->default('pending');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders'); // Drop the orders table if rolled back
    }
};
