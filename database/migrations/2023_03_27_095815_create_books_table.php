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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('isbn');
            $table->string('name');

            $table->unsignedBigInteger('publisher_id');
            $table->index('publisher_id');
            $table->unsignedBigInteger('author_id');
            $table->index('author_id');
            $table->unsignedBigInteger('category_id');
            $table->index('category_id');
            $table->integer('published_year');
            $table->integer('quanity')->default(1);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
