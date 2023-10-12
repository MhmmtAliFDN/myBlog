<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'blog_id',
        'parent_id',
        'like',
        'dislike',
        'content',
        'status',
    ];

    public function blog() {
        return $this->belongsTo(Blog::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
