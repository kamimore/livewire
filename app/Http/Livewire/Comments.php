<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class Comments extends Component
{

    public $comments = [
        [
            'body' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt dicta obcaecati porro fugiat nihil ex. Enim ducimus eum sint dignissimos quo voluptatum! Eius voluptatum deserunt, nesciunt quae fugit laboriosam illum.",
            'created_at' => '1 min ago',
            'creator' => 'User1',
        ]
    ];

    public $newComment;

    public function addComment()
    {
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
