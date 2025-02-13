<?php

namespace App\Livewire;

use Livewire\Component;

class Countries extends Component
{
    public $countries = [
        'Chile',
        'Argentina',
        'Colombia',
    ];

    public $country;

    public $active;

    public $count;

    public $open = true;

    

    public function save(){
        array_push($this->countries, $this->country);
        $this->reset(['country']);
    }

    public function delete($index){
        unset($this->countries[$index]);
    }

    public function changeActive($country){
        $this->active = $country;
    }

    public function increment(){
        $this->count++;
    }
    
    public function render()
    {
        return view('livewire.countries');
    }
}
