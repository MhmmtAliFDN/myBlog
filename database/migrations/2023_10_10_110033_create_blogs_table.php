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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('category_id');
            $table->integer('comment')->default(0);
            $table->integer('view')->default(0);
            $table->string('name', 100)->unique();
            $table->string('slug', 100)->unique();
            $table->string('image', 120)->default(asset('img/blog/default.jpg'));
            $table->string('summary', 255);
            $table->longText('content');
            $table->enum('status', ['Aktif', 'Pasif'])->default('Aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
