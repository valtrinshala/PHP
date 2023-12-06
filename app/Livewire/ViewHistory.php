<?php

namespace App\Livewire;

use Livewire\Component;
use \App\Models\History;

class ViewHistory extends Component
{

    public bool $showHistoryModal;


    public function render()
    {
        $histories = History::all();
        return view('livewire.view-history', compact('histories'));
    }


}
