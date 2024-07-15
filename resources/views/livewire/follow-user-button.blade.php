<div>
    @if (Auth::user()->id != $user->id)
        <button class="btn1 btn-dark" wire:click="toggleFollow">{{ $isFollowing ? 'Following' : 'Follow' }}</button>
    @endif
</div>
