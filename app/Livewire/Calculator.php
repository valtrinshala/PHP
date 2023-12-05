<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\History;

class Calculator extends Component
{
    public string $result = '';

    public function mount()
    {
        $this->result = '';
    }

    public function render()
    {
        return view('livewire.calculator')->layout('layouts.app');
    }


    public function calculateResult($value)
    {
        if (preg_match('/[\'";`]|(\+\+)|(--)|(\*\*)|(\/\/)|\(\)|(\(\()|(\+-)|(-\+)|(\*\+)|(\+\*)|(\/\+)|(\+\/)|(\*\))|(\(\*)|(\(\/)|(\(\/)/', $value)) {
            return "Invalid input.";
        }

        $result = @eval("return $value;");

        if ($result === false) {
            return "Invalid input format.";
        }

        History::createRecord($value, $result);

        return $this->result = $result;
    }


}
