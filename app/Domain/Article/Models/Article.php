<?php

namespace App\Domain\Article\Models;

use App\Domain\Comment\Models\Comment;
use Database\Factories\ArticleFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Article extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return ArticleFactory::new();
    }

    protected $fillable = [
        'title',
        'author',
        'content',
    ];

    public static function boot()
    {
        parent::boot();

        static::deleting(function (self $article) {
            $article->comments()->delete();
        });
    }

    public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function loadCounts()
    {
        $this->loadCount([
            'comments',
            'comments as published_comments_count' => function (Builder $query) {
                $query->whereNotNull('published_at');
            },
            'comments as abandoned_comments_count' => function (Builder $query) {
                $query->whereNull('published_at');
            },
        ]);
    }

    public function scopeIncludeCounts(Builder $query)
    {
        $query->withCount([
            'comments',
            'comments as published_comments_count' => function (Builder $query) {
                $query->whereNotNull('published_at');
            },
            'comments as abandoned_comments_count' => function (Builder $query) {
                $query->whereNull('published_at');
            },
        ]);
    }
}
