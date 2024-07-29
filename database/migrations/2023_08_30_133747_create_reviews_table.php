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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('review_category_id')->nullable();
            $table->string('review_title')->nullable();
            $table->string('review_video_url')->nullable();
            $table->string('review_image')->nullable();
            $table->string('review_thumb')->nullable();
            $table->string('review_tags')->nullable();
            $table->text('review_description')->nullable();
            $table->integer('review_rating')->default(0);
            $table->unsignedBigInteger('views_count')->default(0);


            $table->text('meta_description')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
