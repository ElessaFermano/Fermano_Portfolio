<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->string('grade_level');
            $table->double('year');
            $table->string('school_name');
            $table->string('address');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('education');
    }
};
