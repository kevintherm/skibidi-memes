<x-main-layout>

    @php
        $user = Auth::user();

        $userRank = $user->getMemeRank();
        $highestUpvotes = \App\Models\Meme::getTopUpvotes($user->id)->first()->votes_count;
        $totalUpvotes = \App\Models\Meme::getTotalUpvotes($user->id);
        $totalComments = \App\Models\Meme::getTotalComments($user->id);
    @endphp

    <div class="container d-flex flex-column gap-3">

        <h3>User Profile</h3>

        <x-border />

        <div>
            <h4>Basic Detail</h4>

            <div class="mb-2 d-flex flex-column">
                <p class="fw-semibold m-0 p-0">Nama</p>
                <p class="m-0 p-0">{{ $user->name }}</p>
            </div>

            <div class="mb-2 d-flex flex-column">
                <p class="fw-semibold m-0 p-0">Username</p>
                <p class="m-0 p-0">{{ $user->username }}</p>
            </div>

            <div class="mb-2 d-flex flex-column">
                <p class="fw-semibold m-0 p-0">Email</p>
                <p class="m-0 p-0">{{ $user->email }}</p>
            </div>
        </div>

        <div>
            <h4>Meme Stats</h4>

            <div class="mb-2 d-flex flex-column">
                <p class="fw-semibold m-0 p-0">Status Rank</p>
                <p class="badge rounded-pill text-bg-success fs-1">
                    {{ $userRank }}
                </p>
                <p class="m-0 p-0">Upload lebih banyak meme untuk naik pangkat</p>
            </div>

            <div class="mb-2 d-flex flex-column">
                <p class="fw-semibold m-0 p-0">Total meme</p>
                <p class="m-0 p-0">{{ $user->memes->count() }}</p>
            </div>

            <div class="mb-2 d-flex flex-column">
                <p class="fw-semibold m-0 p-0">Total komen</p>
                <p class="m-0 p-0">{{ $totalComments }}</p>
            </div>

            <div class="mb-2 d-flex flex-column">
                <p class="fw-semibold m-0 p-0">Total upvotes</p>
                <p class="m-0 p-0">{{ $totalUpvotes }}</p>
            </div>

            <div class="mb-2 d-flex flex-column">
                <p class="fw-semibold m-0 p-0">Upvotes tertinggi</p>
                <p class="m-0 p-0">{{ $highestUpvotes }}</p>
            </div>

        </div>

        <div>
            <h4>Password</h4>
            <div class="mb-2">
                <p class="fw-semibold m-0 p-0">Password</p>
                <p class="m-0 p-0">Change Password</p>
            </div>
        </div>

        <div>
            <livewire:logout-button />
        </div>

    </div>

</x-main-layout>
