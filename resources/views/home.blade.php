<x-main-layout>

    <x-slot name="foot">
        <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
        <script defer src="https://unpkg.com/alpinejs-textarea-grow@1.x.x/dist/grow.min.js"></script>
    </x-slot>

    <div class="container">
        <p>
            React atau upload meme skibidi favorit mu!
        </p>

        <livewire:memes-feed />

    </div>

</x-main-layout>
