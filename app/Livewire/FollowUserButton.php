<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class FollowUserButton extends Component
{
    public $user;
    public $isFollowing = false;

    public function mount()
    {
        $this->isFollowing = Auth::user()->isFollowing($this->user);
    }

    public function follow()
    {
        Auth::user()->follow($this->user);
        $this->isFollowing = Auth::user()->isFollowing($this->user);
    }

    public function unfollow()
    {
        Auth::user()->unfollow($this->user);
        $this->isFollowing = Auth::user()->isFollowing($this->user);
    }

    public function toggleFollow()
    {
        $this->isFollowing ? $this->unfollow() : $this->follow();
    }

    public function render()
    {
        return view('livewire.follow-user-button');
    }
}
