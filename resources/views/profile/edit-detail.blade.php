<x-main-layout>

    @php
        $user = Auth::user();
    @endphp

    <div class="container d-flex flex-column gap-3">

        <h3>User Profile</h3>

        <x-border />

        <form action="{{ route('profile.edit') }}" method="POST">
            @csrf
            @method('put')

            <div class="d-flex justify-content-between align-items-center">
                <h4>Basic Detail</h4>
                <a href="{{ route('profile') }}">Cancel Edit</a>
            </div>

            <div class="mb-2 d-flex flex-column">
                <p class="fw-semibold m-0 p-0">Nama</p>
                <input type="text" class="form-control" autocomplete="name" value="{{ old('name', $user->name) }}"
                    name="name" required />
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-2 d-flex flex-column">
                <p class="fw-semibold m-0 p-0">Username</p>
                <input type="text" class="form-control" autocomplete="name"
                    value="{{ old('username', $user->username) }}" name="username" required />
                @error('username')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-2 d-flex flex-column">
                <p class="fw-semibold m-0 p-0">Email</p>
                <input type="email" class="form-control" autocomplete="email" value="{{ old('email', $user->email) }}"
                    name="email" required />
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <button class="btn btn-outline-warning">
                    Save
                </button>
            </div>
        </form>

    </div>

</x-main-layout>
