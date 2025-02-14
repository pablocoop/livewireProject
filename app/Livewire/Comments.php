<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class Comments extends Component
{
    public $comments = [
        'Artículo 1',
        'Artículo 2',
        'Artículo 3',
    ];

    #[On('post-created')]
    public function addComment($comment){
        array_unshift($this->comments, $comment);
    }


    public function render()
    {
        return view('livewire.comments');
    }
}
