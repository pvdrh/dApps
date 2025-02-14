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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('shows', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('duration');
            $table->text('image_url');
            $table->string('start_time');
            $table->text('description');
            $table->foreignId('category_id')->constrained('categories');
            $table->integer('total_ticket');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->integer('show_id');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('wallet_id');
            $table->integer('ticket_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
        Schema::dropIfExists('shows');
        Schema::dropIfExists('tickets');
        Schema::dropIfExists('transactions');
    }
};
