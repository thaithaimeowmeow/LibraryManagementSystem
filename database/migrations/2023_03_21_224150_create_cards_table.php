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
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('idNumber');
            $table->string('name');
            $table->string('image')->nullable();
            $table->date('birthday');
            $table->string('gender');
            $table->string('nationality');
            $table->string('placeOfOrigin');
            $table->string('placeOfResidence');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
