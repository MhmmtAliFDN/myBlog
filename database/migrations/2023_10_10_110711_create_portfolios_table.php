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
            $table->integer('user_id');
            $table->integer('category_id');
            $table->string('name', 100)->unique();
            $table->string('slug', 100)->unique();
            $table->string('image', 100)->default(asset('img/default.webp'));
            $table->string('summary', 255);
            $table->longText('content');
            $table->enum('stage', ['Başlangıç', 'Geliştirme', 'Tamamlandı'])->default('Tamamlandı');
            $table->enum('status', ['Aktif', 'Pasif'])->default('Aktif');
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
