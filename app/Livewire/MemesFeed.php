<?php

namespace App\Livewire;

use App\Models\Meme;
use App\Models\Vote;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class MemesFeed extends Component
{
    use WithPagination;

    public int $pagePage = 3;

    public function loadMore(): void
    {
        $this->pagePage += 2;
    }

    public function render()
    {
        return view('livewire.memes-feed', [
            'memes' => Meme::latest()->take($this->pagePage)->get()
        ]);
    }
}
