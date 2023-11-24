<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Favorite extends Component
{
    public $myguide;
    public $user;
    public $saved = false;


    public function mount()
    {
        $this->user = Auth::user();
        if ($this->user) {
            $this->saved = $this->user->hasFavorited($this->myguide);
        }

    }

    public function toggleFavorite()
    {
        if ($this->user) {
            $this->user->toggleFavorite($this->myguide);
            $this->saved = $this->user->hasFavorited($this->myguide);
        }

    }

    public function render()
    {
        return view('livewire.favorite');
    }
}
