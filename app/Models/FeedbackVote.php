<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FeedbackVote extends Model
{
    use HasFactory;

    protected $fillable = [
        'feedback_id',
        'ip_address',
        'user_agent',
        'vote_type',
    ];

    public function feedback(): BelongsTo
    {
        return $this->belongsTo(Feedback::class);
    }
}
