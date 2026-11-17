<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cv_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name', 120);
            $table->string('professional_title', 150);
            $table->string('email', 150)->nullable();
            $table->string('phone', 40)->nullable();
            $table->string('address')->nullable();
            $table->text('about')->nullable();
            $table->longText('education')->nullable();
            $table->longText('skills')->nullable();
            $table->longText('experience')->nullable();
            $table->longText('reference')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cv_profiles');
    }
};
