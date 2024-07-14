<x-main-layout>

    <div class="container">

        <x-border></x-border>

        <form action="{{ route('login.attempt') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="username">Username</label>
                <div class="input-group">
                    <span class="input-group-text" id="username">
                        <i class="bi bi-person"></i>
                    </span>
                    <input name="username" type="text" class="form-control"
                        placeholder="{{ __('input.placeholder.username') }}" aria-label="Username">
                </div>
                @error('username')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password">Password</label>
                <div class="input-group">
                    <span class="input-group-text" id="password">
                        <i class="bi bi-key"></i>
                    </span>
                    <input name="password" type="password" class="form-control"
                        placeholder="{{ __('input.placeholder.password') }}" aria-label="password">
                </div>
                @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3 d-flex flex-column">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('register') }}" class="link-secondary">
                        {{ __('input.placeholder.create-account') }}
                    </a>
                    <a href="" class="link-secondary">
                        {{ __('input.placeholder.forgot-password') }}
                    </a>
                </div>
                <button class="btn btn-outline-warning">
                    Login
                </button>
            </div>

        </form>
    </div>



</x-main-layout>
