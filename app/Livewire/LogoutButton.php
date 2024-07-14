<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class LogoutButton extends Component
{
    public function logout()
    {
        Auth::logout();

        session()->invalidate();

        session()->regenerateToken();

        return redirect('/');
    }

    public function render()
    {
        return <<<'HTML'
        <div>
            <button wire:click="logout" class="list-group-item list-group-item-action">
                <i class="bi bi-box-arrow-right"></i>
                Log Out
            </button>
        </div>
        HTML;
    }
}
