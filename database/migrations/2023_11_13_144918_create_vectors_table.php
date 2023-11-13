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
        Schema::create('vectors', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('stage_id');
            $table->float('slot_1')->nullable();
            $table->float('slot_2')->nullable();
            $table->float('slot_3')->nullable();
            $table->float('slot_4')->nullable();
            $table->float('slot_5')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vectors');
    }
};
