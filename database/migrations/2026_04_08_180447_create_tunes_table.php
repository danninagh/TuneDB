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
        Schema::create('tunes', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->text('two_bar')->nullable();
                $table->foreignId('tune_type_id')
                    ->nullable()
                    ->constrained('tune_types')
                    ->nullOnDelete();
                $table->string('key')->nullable();
                $table->text('notes')->nullable();
                $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tunes');
    }
};
