<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CommentCard extends Component
{
    public Comment $comment;
    public $replies;
    public $showMoreReplies = false;
    public $replyingTo = '';

    public $_replying_to_id;


    #[Validate('required|max:255')]
    public $body;

    public function toggleReplies()
    {
        $this->showMoreReplies = !$this->showMoreReplies;
    }

    public function getReplies()
    {
        $this->showMoreReplies = true;
        $this->replies = $this->comment->replies;
    }

    public function replyTo($id)
    {
        $reply_to = Comment::find($id);
        $reply_to = $reply_to->parent ? $reply_to->parent : $reply_to;
        $this->replyingTo = $reply_to->user->username;
        $this->_replying_to_id = $reply_to->id;
        $this->dispatch(
            'reply',
            reply_to_id: $this->_replying_to_id,
        )->to(CommentsTab::class);
    }


    public function getReplyUsername()
    {
        return $this->replyingTo;
    }


    public function render()
    {
        return view('livewire.comment-card');
    }
}
