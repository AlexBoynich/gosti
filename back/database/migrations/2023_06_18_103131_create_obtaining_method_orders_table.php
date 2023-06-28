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
        Schema::create('obtaining_method_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('obtaining_method_id')
                ->constrained();
            $table->foreignId('order_id')
                ->constrained();
            $table->foreignId('adress_id')
                ->nullable()
                ->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obtaining_method_orders');
    }
};
