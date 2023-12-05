<?php

namespace App\Livewire;

use Livewire\Component;

class History extends Component
{

    public bool $open = true;


    public function render()
    {
        return view('livewire.history');
    }


}
