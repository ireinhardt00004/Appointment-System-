<?php

namespace App\Livewire;

use Livewire\Component;

class SearchBar extends Component
{
    public $query;

    public function render()
    {
        return view('livewire.search-bar');
    }

    public function updatedQuery()
    {
        // Handle the search logic here
        // You can dispatch an event to the parent component or perform the search directly
        $this->emit('search', $this->query);
    }
}
