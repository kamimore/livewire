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

    public function updated($field)
    {
        $this->validateOnly($field, ['newComment' => 'required|max:255|min:5']);
    }

    public function addComment()
    {
        $this->validate(['newComment' => 'required']);

        if ($this->newComment == '') {
            return;
        }

        $createdComment = Comment::create(['body' => $this->newComment, 'user_id' => rand(1, 50)]);
        $this->comments->prepend($createdComment);
        $this->newComment = "";
        session()->flash('message','Comment added successfully');
    }

    public function removeComment($id)
    {
        Comment::where('id', $id)->delete();
        $this->comments  = $this->comments->filter(function ($value, $key) use ($id) {
            return $value->id != $id;
        });
        session()->flash('message','Comment deleted successfully');
    }

    public function render()
    {
        return view('livewire.comments');
    }
}
