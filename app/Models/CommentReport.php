<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'comment_id',
        'message',
        'evaluated',
    ];

    public function user() {
        $this->belongsTo(User::class);
    }

    public function comment() {
        $this->belongsTo(Comment::class);
    }
}
