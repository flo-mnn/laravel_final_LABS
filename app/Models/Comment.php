<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public function posts()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class, "user_id");
    }
    public function comment_users()
    {
        return $this->belongsTo(CommentUser::class, "comment_user_id");
    }
}
