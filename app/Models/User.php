<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Meme;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function memes(): HasMany
    {
        return $this->hasMany(Meme::class);
    }

    protected $memeRank = [
        '0-10' => 'Lelaki Beta 😭 (LEMAH)',
        '11-50' => 'Lelaki Alpha 😎 (SEDIKIT PERKASA)',
        '51-75' => 'Sigma Level 1️⃣ 🗿',
        '76-100' => 'Sigma Level 2️⃣ 🗿',
        '101-125' => 'Sigma Level 3️⃣ 🗿',
        '126-150' => 'Gen Z 🤑',
        '151-999' => 'BRAINROT (LEVEL MAX) 😈👺',
    ];

    function getMemeRank()
    {
        $memeRank = $this->memeRank;
        $memeCount = $this->memes->count();

        foreach ($memeRank as $range => $rank) {
            [$min, $max] = explode('-', $range);
            if ($memeCount >= (int) $min && $memeCount <= (int) $max) {
                return $rank;
            }
        }

        return 'No Rank';
    }

}
