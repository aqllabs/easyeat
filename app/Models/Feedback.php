<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'type',
        'content',
        'attachments',
        'ip_address',
        'user_agent',
        'status',
    ];

    protected $casts = [
        'attachments' => 'array',
    ];

    // Constants for feedback types
    const TYPE_BUG = 'bug';
    const TYPE_FEATURE = 'feature';
    const TYPE_CONTENT = 'content';
    const TYPE_OTHER = 'other';

    // Constants for status
    const STATUS_OPEN = 'open';
    const STATUS_IN_PROGRESS = 'in_progress';
    const STATUS_COMPLETED = 'completed';
    const STATUS_CLOSED = 'closed';

    public static function getTypes(): array
    {
        return [
            self::TYPE_BUG => 'Bug Report',
            self::TYPE_FEATURE => 'Feature Request',
            self::TYPE_CONTENT => 'Content Related',
            self::TYPE_OTHER => 'Other',
        ];
    }

    public function votes(): HasMany
    {
        return $this->hasMany(FeedbackVote::class);
    }

    public function vote(string $ipAddress, string $voteType, ?string $userAgent = null)
    {
        $existingVote = $this->votes()
            ->where('ip_address', $ipAddress)
            ->first();

        if ($existingVote) {
            if ($existingVote->vote_type === $voteType) {
                // Remove vote if same type
                $existingVote->delete();
                $this->decrement($voteType . 's');
            } else {
                // Change vote type
                $existingVote->update(['vote_type' => $voteType]);
                $this->increment($voteType . 's');
                $this->decrement($existingVote->vote_type . 's');
            }
        } else {
            // Add new vote
            $this->votes()->create([
                'ip_address' => $ipAddress,
                'user_agent' => $userAgent,
                'vote_type' => $voteType,
            ]);
            $this->increment($voteType . 's');
        }

        $this->refresh();
    }
}
