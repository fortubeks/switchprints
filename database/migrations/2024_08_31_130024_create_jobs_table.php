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
        Schema::create('order_jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->foreignId('style_id')->constrained()->onDelete('cascade');
            $table->foreignId('machine_id')->constrained()->onDelete('cascade');
            $table->decimal('amount',15,2);
            $table->enum('status', [OrderStatus::PENDING, OrderStatus::IN_PROGRESS, OrderStatus::COMPLETE])->default(OrderStatus::PENDING);
            $table->date('expected_delivery_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
