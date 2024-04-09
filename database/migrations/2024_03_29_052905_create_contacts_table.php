<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('contact', function (Blueprint $table) {
            $table->id();
            $table->double('phone');
            $table->string('facebook');
            $table->string('email');
            $table->string('linkedin');
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('contact');
    }
};
