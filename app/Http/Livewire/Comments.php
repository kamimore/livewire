<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class Comments extends Component
{

    public $comments;
    public $newComment;

    public function mount()
    {
        $initialComments = Comment::orderByDesc('created_at')->get();
        $this->comments = $initialComments;
    }

    public function addComment()
    {
        if ($this->newComment == '') {
            return;
        }

        $createdComment = Comment::create(['body' => $this->newComment, 'user_id' => rand(1, 50)]);
        $this->comments->push($createdComment);
        $this->comments->prepend($createdComment);
        $this->newComment = "";
    }

    public function render()
    {
        return view('livewire.comments');
    }
}
