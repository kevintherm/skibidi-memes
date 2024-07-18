<x-main-layout>

    @php
        $user = Auth::user();
    @endphp

    <div class="container d-flex flex-column gap-3">

        <h3>User Profile</h3>

        <x-border />

        <form action="{{ route('profile.edit.password') }}" method="POST">
            @csrf
            @method('put')

            <div class="d-flex justify-content-between align-items-center">
                <h4>Password</h4>
                <a href="{{ route('profile') }}">Cancel Edit</a>
            </div>

            <div class="mb-2 d-flex flex-column">
                <p class="fw-semibold m-0 p-0">Current Password</p>
                <input type="password" class="form-control" autocomplete="password" value="{{ old('password') }}"
                    name="old_password" required />
                @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-2 d-flex flex-column">
                <p class="fw-semibold m-0 p-0">New Password</p>
                <input type="password" class="form-control" autocomplete="new-password" value="{{ old('password') }}"
                    name="password" required />
                @error('password')
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
