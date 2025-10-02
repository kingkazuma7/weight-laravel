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
        Schema::create('fighters', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->comment('選手名');
            $table->string('organization', 100)->comment('所属団体');
            $table->enum('status', ['champion', 'former_champion', 'contender', 'retired'])->default('contender')->comment('ステータス');
            $table->foreignId('weight_class_id')->constrained('weight_classes')->onDelete('cascade')->comment('所属階級ID');
            $table->text('notes')->nullable()->comment('備考');
            $table->timestamps();
            
            // インデックスを追加（パフォーマンス向上）
            $table->index(['weight_class_id', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fighters');
    }
};
