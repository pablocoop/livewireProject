<?php

namespace App\Livewire;

use Livewire\Attributes\Modelable;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class Children extends Component 
{
    //#[Reactive] //ya no permitirá editarlo
    #[Modelable]
    public $name;

    public function render()
    {
        return view('livewire.children');
    }
}
