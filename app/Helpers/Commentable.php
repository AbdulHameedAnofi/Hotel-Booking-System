<?php 

namespace App\Helpers;

use App\Models\Comment;

trait Commentable 
{   
    public function hasComment()
    {
        return (bool) $this->comments()->count();
    }
    
    public function hasReply()
    {
        return $this->replies->count();
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

}