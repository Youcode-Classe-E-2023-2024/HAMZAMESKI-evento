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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users', 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name');
            $table->text('description');
            $table->string('image')->default('_');
            $table->date('date');
            $table->string('place');
            $table->integer('ticket_price');
            $table->foreignId('category_id')->constrained('categories', 'id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->integer('available_places');
            $table->integer('nmb_reservations')->default(0);
            $table->enum('acceptance', ['automatic', 'manual'])->default('automatic');
            $table->enum('is_published', ['0', '1'])->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
