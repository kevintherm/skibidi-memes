<?php

namespace App\Livewire;

use App\Models\Meme;
use App\Models\Comment;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Livewire\CommentCard;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class CommentsTab extends Component
{
    public $comments = [];
    public $meme_id, $reply_to_id;

    #[Validate('required|max:255')]
    public $body;

    #[On('get-comment')]
    public function getComments($meme_id)
    {
        $this->comments = null;
        $this->meme_id = $meme_id;
        $this->comments = Comment::where('meme_id', $meme_id)
            ->where('comment_id', null)
            ->latest()
            ->get();
    }

    public function showCommentsTab()
    {
        $this->dispatch('show');
    }

    public function closeCommentsTab()
    {
        $this->dispatch('close');
    }

    #[On('reply')]
    public function setReplyId($reply_to_id)
    {
        $this->reply_to_id = $reply_to_id;
    }

    public function createNewComment()
    {
        $this->validate();


        Comment::create([
            'meme_id' => $this->meme_id,
            'comment_id' => $this->reply_to_id,
            'user_id' => Auth::user()->id,
            'body' => $this->body
        ]);

        $this->reset(['body']);
        $this->getComments($this->meme_id);
        if ($this->reply_to_id)
            $this->dispatch('newreply')->to(CommentCard::class);
    }


    public function render()
    {
        return view('livewire.comments-tab');
    }
}
