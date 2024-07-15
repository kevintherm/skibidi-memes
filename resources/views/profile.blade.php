<x-main-layout>

    @php($user = Auth::user())

    <div class="container d-flex flex-column gap-3">
        <div>
            <h3>User Profile</h3>

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
            <h3>Password</h3>
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
