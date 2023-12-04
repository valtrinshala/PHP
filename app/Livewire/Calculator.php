<?php

namespace App\Livewire;

use Livewire\Component;

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
        // Check if the input contain   s any malicious code (for security)
        if (preg_match('/[\'";`]|(\+\+)|(--)|(\*\*)|(\/\/)|\(\)|(\(\()|(\+-)|(-\+)|(\*\+)|(\+\*)|(\/\+)|(\+\/)|(\*\))|(\(\*)|(\(\/)|(\(\/)/', $value)) {
            return "Invalid input.";
        }

        // Use eval() to calculate the result
        $result = @eval("return $value;");

        if ($result === false) {
            return "Invalid input format.";
        }

        return $this->result = $result;
    }


}
