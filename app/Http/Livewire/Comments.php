<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Comments extends Component
{
    use WithPagination;
    use WithFileUploads;

    // protected $paginationTheme = 'bootstrap';

    public $newComment;
    public $image;

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

        Comment::create(['body' => $this->newComment, 'user_id' => rand(1, 50)]);
        $this->newComment = "";
        session()->flash('message', 'Comment added successfully');
    }

    public function removeComment($id)
    {
        Comment::where('id', $id)->delete();
        session()->flash('message', 'Comment deleted successfully');
    }

    public function render()
    {
        return view('livewire.comments', ['comments' => Comment::latest()->paginate(2)]);
    }
}
