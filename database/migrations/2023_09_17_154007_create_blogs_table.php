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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('blog_category_id')->nullable();
            $table->string('comment_id')->nullable();
            $table->string('blog_title')->nullable();
            $table->string('blog_image')->nullable();
            $table->string('blog_thumb')->nullable();
            $table->string('blog_tags')->nullable();
            $table->text('blog_description')->nullable();
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
        Schema::dropIfExists('blogs');
    }
};





