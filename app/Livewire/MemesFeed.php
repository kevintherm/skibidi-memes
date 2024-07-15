<?php

namespace App\Livewire;

use App\Models\Meme;
use App\Models\Vote;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class MemesFeed extends Component
{

    public int $perPage = 3;

    public function loadMore(): void
    {
        $this->perPage += 2;
    }

    public function render()
    {
        return view('livewire.memes-feed', [
            'memes' => Meme::latest()->take($this->perPage)->get()
        ]);
    }
}
