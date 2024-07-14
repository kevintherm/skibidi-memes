<div class="outer-wrapper">
    <div class="card-wrapper">

        @foreach ($memes as $meme)
            <livewire:meme-card :meme="$meme" wire:key="{{ $meme->id }}" />
        @endforeach

    </div>


    <div x-intersect.full="$wire.loadMore()" class="p-4">
        <div wire:loading wire:target="loadMore" class="loading-indicator">
            Sabar rek lagi loading...
        </div>
    </div>

</div>
