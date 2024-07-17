<x-main-layout>

    <x-slot name="foot">
        <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
        <script defer src="https://unpkg.com/alpinejs-textarea-grow@1.x.x/dist/grow.min.js"></script>

        <script>
            const videos = document.querySelectorAll("video");
            let playStates = new Map();

            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    const video = entry.target;
                    if (!entry.isIntersecting) {
                        video.pause();
                        playStates.set(video, false);
                    } else {
                        video.play();
                        playStates.set(video, true);
                    }
                });
            }, {});

            videos.forEach((video) => {
                playStates.set(video, null);
                observer.observe(video);
            });

            const onVisibilityChange = () => {
                videos.forEach((video) => {
                    if (document.hidden || !playStates.get(video)) {
                        video.pause();
                    } else {
                        video.play();
                    }
                });
            };

            document.addEventListener("visibilitychange", onVisibilityChange);
        </script>
    </x-slot>

    <div class="container">
        <p>
            React atau upload meme skibidi favorit mu!
        </p>

        @if (request('show') && !!request('show'))
            @php($meme = App\Models\Meme::where('slug', request('show'))->first())
            @if ($meme)
                <livewire:meme-card :meme="$meme" />
            @endif
        @endif

        <livewire:memes-feed />

    </div>

</x-main-layout>
