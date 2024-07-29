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
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->string('portfolio_name')->nullable();
            $table->string('service_name_id')->nullable();
            $table->string('portfolio_title')->nullable();
            $table->string('portfolio_image')->nullable();
            $table->string('portfolio_images')->nullable();
            $table->string('client')->nullable();
            $table->string('industry')->nullable();
            $table->string('link')->nullable();
            $table->text('portfolio_description')->nullable();
            $table->text('portfolio_short_description')->nullable();

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
        Schema::dropIfExists('portfolios');
    }
};
