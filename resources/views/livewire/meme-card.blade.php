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
        <img src="{{ Storage::url($meme->img) }}" class="rounded-0" style="width: 100%; height: auto" loading="lazy" />
    </div>
    <div class="p-2 px-md-0" x-data>
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-2">
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
                <button title="share" type="button" class="btn p-0 m-0 border-0" wire:click="showComments"
                    data-bs-toggle="modal" data-bs-target="#{{ config('views.comments-modal.id') }}">
                    <i class="bi bi-chat fs-3"></i>
                    {{-- <i class="bi bi-arrow-down-circle-fill fs-3" style="color: #f59e0b;"></i> --}}
                </button>
            </div>
            <button title="share" type="button" class="btn p-0 m-0 border-0">
                <i class="bi bi-share fs-3"></i>
                {{-- <i class="bi bi-arrow-down-circle-fill fs-3" style="color: #f59e0b;"></i> --}}
            </button>
        </div>
        <p class="m-0 p-0 fw-semibold">
            {{ $displayVotes ?? $meme->votes_count }} Upvotes
        </p>
        <span class="card-text">
            <a href="{{ route('user.show', $meme->user->username) }}"
                class="fw-semibold link-dark link-underline link-underline-opacity-0">
                {{ $meme->user->username }}
            </a>
            {{ $meme->desc }}
        </span>
        <small class="fs-7 d-block text-secondary">
            {{ $meme->created_at->diffForHumans(null) }}
        </small>
    </div>
</div>
