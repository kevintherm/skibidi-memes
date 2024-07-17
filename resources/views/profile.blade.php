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

            <form action="{{ route('profile.edit.image') }}" method="POST"
                class="d-flex align-items-center flex-column mb-3" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div>
                    <label for="input-profile-image"
                        style="width: 200; height: 200; overflow: hidden; background-color:rgba(600, 200, 100, 0.2); border:2px dashed rgba(600, 200, 100, 1); cursor: pointer;"
                        class="position-relative">
                        <p id="input-text"
                            class="fs-5 fw-bold text-warning text-center my-auto position-absolute top-50 start-50 translate-middle">
                            Ubah foto profil
                        </p>
                        <img id="preview-image" src="{{ Storage::url($user->image) }}" onerror="errorImage(this)"
                            width="200" height="200" style="object-fit: cover">
                    </label>
                    <input type="file" accept=".png,.jpg,.jpeg,gif" name="image" id="input-profile-image" hidden />
                </div>
                <button id="save-profile-image" class="btn btn-warning mt-3">
                    Save
                </button>
            </form>

            <div class="d-flex justify-content-between align-items-center">
                <h4>Basic Detail</h4>
                <a href="{{ route('profile.edit') }}">Edit Detail</a>
            </div>

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
            <div class="d-flex justify-content-between align-items-center">
                <h4>Password</h4>
                <a href="{{ route('profile.edit.password') }}">Change Password</a>
            </div>
            <div class="mb-2">
                <p class="fw-semibold m-0 p-0">Password</p>
                <p class="m-0 p-0 fs-5 fw-bold">*******</p>
            </div>
        </div>

        <div>
            <livewire:logout-button />
        </div>

    </div>

    <x-slot name="foot">
        <script>
            $('#save-profile-image').hide();
            if (@json(!!$user->image))
                $('#input-text').hide();

            $('input#input-profile-image').on('change', (e) => {
                $('#save-profile-image').show();

                const file = e.target.files[0];
                $('#input-text').hide();

                if (!file) {
                    $('#input-text').show();
                    Swal.fire('Tidak ada gambar yang terpilih.')
                }

                imgURL = URL.createObjectURL(file);
                $("#preview-image").attr("src", imgURL);
            });
        </script>
    </x-slot>

</x-main-layout>
