<div class="rounded-0 border-0 position-relative">



    <div class="my-4 border"></div>

    <div class="d-flex justify-content-between align-items-baseline">
        <span class="m-0 p-0">
            <span class="rating fs-2 fw-bold">
                #??
            </span>
            In ??
        </span>
        <span>By {{ $meme->user->name }}</span>
    </div>
    <div>
        <img src="{{ Storage::url($meme->img) }}" class="rounded-0" style="width: 100%; height: auto">
    </div>
    <div class="p-2 px-md-0" x-data>
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-2">
                {{-- <button title="react" type="button" class="btn p-0 m-0 border-0 me-4">
                    <i class="bi bi-emoji-smile fs-3"></i>
                </button> --}}
                @if (Auth::check())
                    @if ($userVoted == 'up')
                        <button title="upvote" type="button" class="btn p-0 m-0 border-0"
                            wire:click="toggleVote(true)">
                            <i class="bi bi-arrow-up-circle-fill fs-3" style="color: #f59e0b;"></i>
                        </button>
                    @else
                        <button title="upvote" type="button" class="btn p-0 m-0 border-0"
                            wire:click="toggleVote(true)">
                            <i class="bi bi-arrow-up-circle fs-3"></i>
                        </button>
                    @endif
                    @if ($userVoted == 'down')
                        <button title="downvote" type="button" class="btn p-0 m-0 border-0"
                            wire:click="toggleVote(false)">
                            <i class="bi bi-arrow-down-circle-fill fs-3" style="color: #f59e0b;"></i>
                        </button>
                    @else
                        <button title="upvote" type="button" class="btn p-0 m-0 border-0"
                            wire:click="toggleVote(false)">
                            <i class="bi bi-arrow-down-circle fs-3"></i>
                        </button>
                    @endif
                @else
                    <a title="upvote" type="button" class="btn p-0 m-0 border-0" href="{{ route('login') }}">
                        <i class="bi bi-arrow-up-circle fs-3"></i>
                    </a>
                @endif
                <span class="m-0 p-0">{{ $displayVotes ?? $meme->votes_count }}</span>
            </div>
            <button title="share" type="button" class="btn p-0 m-0 border-0">
                <i class="bi bi-send fs-3"></i>
                {{-- <i class="bi bi-arrow-down-circle-fill fs-3" style="color: #f59e0b;"></i> --}}
            </button>
        </div>
        <span class="card-text">
            <span class="fw-semibold">{{ $meme->user->username }}</span> {{ $meme->desc }}
        </span>
        <small class="fs-7 d-block text-secondary">
            {{ $meme->created_at->diffForHumans(null) }}
        </small>
    </div>
</div>
