<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('author')->nullable();
            $table->date('publication_date')->nullable();
            $table->timestamps();
        });

        Schema::create('book_tune', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_id')->constrained()->cascadeOnDelete();
            $table->foreignId('tune_id')->constrained()->cascadeOnDelete();
            $table->string('name_in_book')->nullable();
            $table->unsignedInteger('page_number')->nullable();
            $table->string('tune_number')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->unique(['book_id', 'tune_id', 'page_number', 'tune_number'], 'book_tune_unique_ref');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('book_tune');
        Schema::dropIfExists('books');
    }
};
