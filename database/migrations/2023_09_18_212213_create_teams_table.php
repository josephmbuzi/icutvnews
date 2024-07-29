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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('team_image')->nullable();
            $table->string('team_name')->nullable();
            $table->string('team_position')->nullable();
            $table->text('team_desc')->nullable();
            $table->text('team_skills')->nullable();
            $table->text('team_guide')->nullable();
            $table->text('team_exp')->nullable();

            $table->string('team_fb')->nullable();
            $table->string('team_twitter')->nullable();
            $table->string('team_linkedin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
