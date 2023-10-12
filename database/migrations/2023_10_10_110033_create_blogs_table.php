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
            $table->integer('category_id');
            $table->integer('user_id');
            $table->integer('comment')->nullable();
            $table->integer('view')->nullable();
            $table->string('name', 100);
            $table->string('slug', 100)->uniqid;
            $table->string('image', 100)->default(asset('img/blog/default.jpg'));
            $table->text('content', 10000);
            $table->enum('status', ['active', 'inactive']);
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
