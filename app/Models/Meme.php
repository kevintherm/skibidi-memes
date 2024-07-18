<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Meme extends Model
{
    use HasFactory;

    protected $fillable = ['img', 'desc', 'user_id', 'votes_count', 'rank', 'slug'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function upvotes(): HasMany
    {
        return $this->hasMany(Vote::class, 'meme_id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public static function getTopUpvotes(int $user_id = null)
    {
        $query = Meme::latest()->orderByDesc('votes_count');

        return $user_id ? $query->where('user_id', $user_id)->get() : $query->get();
    }

    public static function getTotalComments(int $user_id = null)
    {
        $memes = Meme::with('comments')
            ->when(
                $user_id,
                fn($query, $user_id)
                => $query->where('user_id', $user_id)
            )
            ->get();

        return $memes->map(fn($meme) => $meme->comments->count())->sum();
    }

    public static function getTotalUpvotes(int $user_id = null)
    {
        $query = Meme::when($user_id, fn($query, $user_id) => $query->where('user_id', $user_id))
            ->sum('votes_count');

        return $query;
    }

    public function getRankAttribute()
    {
        // Assuming cached_rank holds the expiration time and rank is stored separately
        if ($this->cached_rank_expired_at > now()) {
            return $this->cached_rank;
        }

        return $this->updateRank($this->id);
    }

    public function updateRank(int $id = null): null|int
    {
        $memes = Meme::orderByDesc('votes_count')->get();

        foreach ($memes as $index => $meme) {
            // Update both cached rank and its expiration time
            $meme->cached_rank = $index + 1;
            $meme->cached_rank_expired_at = now()->addHour();
            $meme->save();

            if ($meme->id == $this->id) {
                return $meme->cached_rank;
            }
        }

        return null;
    }
}
