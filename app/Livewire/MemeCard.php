<?php

namespace App\Livewire;

use App\Models\Meme;
use App\Models\Vote;
use Livewire\Component;
use App\Livewire\CommentsTab;
use Illuminate\Support\Facades\Auth;

class MemeCard extends Component
{
    public Meme $meme;

    public $userVoted, $displayVotes;

    public function mount()
    {
        if (!Auth::check())
            return;

        // check for the existing user vote
        $existingVote = Vote::where([['meme_id', $this->meme->id], ['user_id', Auth::user()->id]])->first();

        if ($existingVote) {
            $this->userVoted = $existingVote->type ? 'up' : 'down';
        }

        $this->displayVotes = $this->meme->upvotes()->selectRaw('SUM(CASE WHEN type = 1 THEN 1 WHEN type = 0 THEN -1 ELSE 0 END) as total_votes')
            ->pluck('total_votes')
            ->first();
    }

    public function toggleVote(bool $type)
    {
        $existingVote = Vote::where([['meme_id', $this->meme->id], ['user_id', Auth::user()->id]])->first();

        if ($existingVote && $existingVote->type == $type) {
            // Delete vote
            $this->meme
                ->upvotes()
                ->where('user_id', Auth::user()->id)
                ->delete();

            $this->userVoted = null;
        } else {
            Vote::updateOrInsert(['meme_id' => $this->meme->id], [
                'user_id' => Auth::user()->id,
                'type' => $type
            ]);

            $this->userVoted = $type ? 'up' : 'down';
        }

        $this->updateDisplayVotes();
    }

    public function updateDisplayVotes()
    {
        $this->displayVotes = $this->meme->upvotes()->selectRaw('SUM(CASE WHEN type = 1 THEN 1 WHEN type = 0 THEN -1 ELSE 0 END) as total_votes')
            ->pluck('total_votes')
            ->first();

        $this->meme->votes_count = $this->displayVotes ?? 0;
        $this->meme->save();
    }

    public function showComments()
    {
        $this->dispatch(
            'get-comment',
            meme_id: $this->meme->id
        )->to(CommentsTab::class);
    }

    public function render()
    {

        return view('livewire.meme-card');
    }
}
