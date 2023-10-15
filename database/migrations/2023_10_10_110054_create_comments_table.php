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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('blog_id');
            $table->integer('parent_id')->nullable();
            $table->integer('like')->default(0);
            $table->integer('dislike')->default(0);
            $table->text('content', 500);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->boolean('is_reported')->default(false);
            $table->integer('report_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
