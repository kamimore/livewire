<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Comments extends Component
{

    public $comments;

    public function mount($initialComments){
        $this->comments = $initialComments;
    }

    public $newComment;

    public function addComment()
    {
        if($this->newComment == ''){
            return ;
        }
        array_unshift($this->comments,[
            'body' => $this->newComment,
            'created_at' => now()->diffForHumans(),
            'creator' => 'User2',
        ]);

        $this->newComment = "";
    }

    public function render()
    {
        return view('livewire.comments');
    }
}
