<?php

namespace App\Livewire;

use App\Models\Meme;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UserMemes extends Component
{
    public int $perPage = 3;
    public $user_id;

    public function loadMore(): void
    {
        $this->perPage += 2;
    }

    public function render()
    {
        return view('livewire.user-memes', [
            'memes' => Meme::latest()
                ->where('user_id', $this->user_id)
                ->take($this->perPage)
                ->get()
        ]);
    }
}
