<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\SupportTicket;
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
    public $ticketId;

    protected $listeners = ['ticketSelected'];

    public function ticketSelected($ticketId)
    {
        $this->ticketId = $ticketId;
    }

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
            $imagePath = null;
        } else {
            $imagePath = Storage::disk('public')->put('images', $this->image);
        }

        Comment::create(['body' => $this->newComment,
            'image' => $imagePath, 'user_id' => rand(1, 50),
            'support_ticket_id' => $this->ticketId,
        ]);

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
        if (!$this->ticketId) {
            $this->ticketId = SupportTicket::where('id', '>', 0)->first()->id;

        }
        return view('livewire.comments', ['comments' => Comment::where('support_ticket_id', $this->ticketId)->latest()->paginate(2)]);
    }
}
