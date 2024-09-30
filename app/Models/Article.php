<?php

namespace App\Models;

use App\Observers\ArticleObserver;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

#[ObservedBy([ArticleObserver::class])]
class Article extends Model
{
    use HasFactory;
    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }

    protected $casts = [
        'active' => 'boolean',
    ];

    protected $appends = ['icon'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getIconAttribute(): string
    {
        return Storage::url($this->attributes['thumbnail']);
    }
}
