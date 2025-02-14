<?php

namespace App\Livewire;

use Livewire\Component;

class Father extends Component
{
    public $name = 'YOOO';

    public function render()
    {
        return view('livewire.father');
    }
}
