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
        Schema::create('weight_classes', function (Blueprint $table) {
          $table->id();
          $table->string('type', 50)->comment('格闘技の種類'); 
          $table->string('name', 100)->comment('階級名'); 
          $table->string('weight_limit', 50)->nullable()->comment('体重制限'); 
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weight_classes');
    }
};
