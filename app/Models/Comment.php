<?php 

namespace App\Models;

use App\Helpers\Commentable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory, Commentable;
    
    protected $fillable = [
        'user_id',
        'parent_id',
        'comment',
        'rating',
        'status',
        'commentable_id',
        'commentable_type'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function getComment()
    {
        return $this::with('user')->latest()->get();
    }

    public function storeComment($model, $request)
    {
        $this->comment = $request->comment;
        $this->rating = $request->rating;
        $this->user()->associate($request->user());

        $model->comments()->save($this);

        return $this;
    }

    public function reply($model, $request)
    {
        $this->comment = $request->comment;
        $this->user()->associate($request->user());
        $this->parent_id = $request->comment_id;

        $model->comments()->save($this);

        return $this;
    }
}