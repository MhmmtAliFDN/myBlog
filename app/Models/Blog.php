<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'user_id',
        'comment',
        'view',
        'name',
        'slug',
        'image',
        'summary',
        'content',
        'status',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(BlogCategory::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
