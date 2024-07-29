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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('property_name')->nullable();
            $table->text('property_desc')->nullable();
            $table->string('property_main_image')->nullable();
            $table->string('property_images')->nullable();
            $table->text('property_location_url')->nullable();
            $table->text('property_location')->nullable();
            $table->text('property_video')->nullable();
            $table->string('property_price')->nullable();
            $table->text('property_details')->nullable();
            $table->text('property_amenities')->nullable();
            $table->text('property_slug')->nullable();
            $table->string('property_tag')->nullable();
            $table->string('property_category_id')->nullable();
            

            $table->text('property_meta_desc')->nullable();
            $table->text('property_meta_keyword')->nullable();
            $table->text('property_meta_title')->nullable();
       

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
