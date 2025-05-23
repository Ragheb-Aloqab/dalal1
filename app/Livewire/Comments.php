<?php

namespace App\Livewire;


use Livewire\Component;
use App\Models\Comment;

class Comments extends Component
{
    public $comments = [];
    public $adId;

    public function mount($adId)
    {
        $this->adId = $adId;
        $this->fetchComments();
    }

    public function fetchComments()
    {
        $this->comments = Comment::where('advertisement_id', $this->adId)->get();
    }

    public function deleteComment($id)
    {
        $comment = Comment::find($id);

        if ($comment) {
            $comment->delete();
            $this->fetchComments();
        }
    }

    public function render()
    {
        return view('livewire.comments', [
            'comments' => $this->comments,
        ]);
    }
}
