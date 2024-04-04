<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('blog', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('content');
            $table->string('date');
            $table->timestamps();
        });
    }

  
    public function down(): void
    {
        Schema::dropIfExists('blog');
    }
};
