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
            $table->string('titre');
            $table->integer('nombre_exemplaires')->default(1);
            $table->text('description')->nullable();
            $table->date('date_publication')->nullable();
            $table->date('date_creation')->nullable();
            $table->date('date_modification')->nullable();
            $table->foreignId('author_id')->constrained('authors')->onDelete('cascade');
            $table->string('image')->nullable();
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
