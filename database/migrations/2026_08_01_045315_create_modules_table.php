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
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image_path')->nullable();
            $table->text('objective')->nullable();
            $table->jsonb('content_blocks')->nullable();
            $table->jsonb('activities')->nullable();
            $table->string('closing_message')->nullable();
            $table->integer('order')->default(0);
            $table->foreignId('level_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
