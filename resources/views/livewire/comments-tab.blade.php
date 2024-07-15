<div class="modal-content rounded-bottom-0" style="max-height: 50vh">
    @if ($comments)
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="{{ config('views.comments-modal.id') }}">
                Comments ({{ count($comments) }})
            </h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @if (count($comments) < 1)
                <p>Belum ada komen.</p>
            @else
                <div class="comments-wrapper">
                    @foreach ($comments as $comment)
                        <livewire:comment-card :comment="$comment" :wire:key="$comment->id" />
                    @endforeach
                </div>
            @endif
        </div>
        <div class="modal-footer justify-content-between">
            <form wire:submit.prevent="createNewComment" class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Tulis komen" rows="1" x-ref="replyInput"
                    wire:model="body" />
                <button class="btn btn-outline-secondary" type="button" id="button-addon2">Post</button>
            </form>
        </div>
    @else
        <div class="modal-header">
            <p class="modal-title">
                Memuat komen...
            </p>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
    @endif
</div>

@script
    <script>
        const modal = new bootstrap.Modal('#{{ config('views.comments-modal.id') }}')

        $wire.on('show', () => {
            modal.show();
        })

        $wire.on('close', () => {
            modal.close();
        })
    </script>
@endscript
