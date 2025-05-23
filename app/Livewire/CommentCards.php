<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentCards extends Component
{
    use WithPagination;

    public $advertisementId;
    public $content;

    protected $rules = [
        'content' => 'required|max:500',
    ];

    public function submitComment()
    {
        $this->validate();

        Comment::create([
            'advertisement_id' => $this->advertisementId,
            'user_id' => Auth::id(),
            'content' => $this->content,
        ]);

        // Clear the input field after submitting
        $this->content = null;
    }
    public function deleteComment($id)
    {
        $comment = Comment::find($id);

        if ($comment) {
            $comment->delete();
        }
    }
    public function render()
    {
        $comments = Comment::where('advertisement_id', $this->advertisementId)
            ->latest()
            ->paginate(5);

        return view('livewire.comment-cards', [
            'comments' => $comments,
        ]);
    }
}
