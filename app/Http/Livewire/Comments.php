<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Illuminate\Support\Facades\Storage;
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

    public function updatedNewComment()
    {
        $this->validate(['newComment' => 'required|max:255|min:5']);
    }

    public function updatedImage()
    {
        $this->validate(['image' => 'max:1024']);
    }

    public function addComment()
    {

        if ($this->newComment == '') {
            return;
        }
        if (!$this->image) {
            $this->image = null;
        }

        $imagePath = Storage::disk('public')->put('images', $this->image);
        Comment::create(['body' => $this->newComment,
            'image' => $imagePath, 'user_id' => rand(1, 50)]);

        $this->newComment = "";
        $this->image = "";
        session()->flash('message', 'Comment added successfully');
    }

    public function removeComment($id)
    {
        $comment = Comment::find($id);
        Storage::disk('public')->delete($comment->image);
        $comment->delete();
        session()->flash('message', 'Comment deleted successfully');
    }

    public function render()
    {
        return view('livewire.comments', ['comments' => Comment::latest()->paginate(2)]);
    }
}
