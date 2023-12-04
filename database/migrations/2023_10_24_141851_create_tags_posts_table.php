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
        Schema::create('tags_posts', function (Blueprint $table) {
            $table->id();
            $table->label();
            $table->foreignId('tag_ig');
            $table->foreignId('post_ig');
            $table->foreign('tag_id')->references('id')->on('authors')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('post_id')->references('id')->on('books')->onUpdate('cascade')->onDelete('restrict');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags_posts');
    }
};
