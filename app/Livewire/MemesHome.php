<?php

namespace App\Livewire;

use App\Models\Meme;
use Livewire\Component;

class MemesHome extends Component
{
    public int $perPage = 3;
    public $memes;

    public function mount()
    {
        $this->memes = Meme::latest()->take($this->perPage)->get();
    }

    public function loadMore(): void
    {
        $this->perPage += 2;
    }
    public function render()
    {
        return <<<'HTML'
            <x-memes-feed-wrapper :$memes />
        HTML;
    }
}
