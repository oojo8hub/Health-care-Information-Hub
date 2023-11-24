<?php

namespace App\Http\Livewire;

use App\Models\Guide;
use Livewire\Component;

class ShowTopics extends Component
{
    public $letters;

    public $filter;


    public function mount()
    {
        $this->letters = range('A', 'Z');
    }

    public function setFilter($letter)
    {
        $this->filter = $letter;
    }

    public function render()
    {
        $guides = Guide::where('published', 1)
            ->where('topic', 'LIKE', $this->filter . '%')
            ->orderBy('topic')->get();

        return view('livewire.show-topics', [
            'guides' => $guides,
        ]);
    }
}
