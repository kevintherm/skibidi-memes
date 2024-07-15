<div class="outer-wrapper">

    <div class="modal fade " id="{{ config('views.comments-modal.id') }}" tabindex="-1"
        aria-labelledby="{{ config('views.comments-modal.id') }}" aria-hidden="true"
        style="
        height: auto;
        bottom: 0;
        top: auto;
    ">
        <div class="modal-dialog modal-dialog-scrollable modal-md mb-0 mx-0 mx-md-auto">
            <livewire:comments-tab />
        </div>
    </div>

    <div class="card-wrapper">

        @foreach ($memes as $meme)
            <livewire:meme-card :meme="$meme" wire:key="{{ $meme->id }}" />
        @endforeach

    </div>


    @if ($memes->count() != \App\Models\Meme::count())
        <div x-intersect.full="$wire.loadMore()" class="p-1">
            <div wire:loading wire:target="loadMore" class="loading-indicator">
                Sabar rek lagi loading...
            </div>
        </div>
    @endif

</div>
