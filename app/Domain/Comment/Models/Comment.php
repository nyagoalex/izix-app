<?php

namespace App\Domain\Comment\Models;

use App\Domain\Article\Models\Article;
use App\Domain\Vistor\Models\Vistor;
use Database\Factories\CommentFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return CommentFactory::new();
    }
    protected $casts = [
        'published_at' => 'datetime',
    ];

    protected $fillable = [
        'content',
        'published_at',
        'vistor_id',
        'article_id',
    ];


    public function vistor()
    {
        return $this->belongsTo(Vistor::class);
    }

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function scopePublished(Builder $query)
    {
        return $query->whereNotNull('published_at');
    }

    public function isPublished()
    {
        return $this->published_at !== null;
    }
}
