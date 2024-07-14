<x-main-layout>

    <div class="container">

        <x-border></x-border>

        <form action="{{ route('register.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name">Name</label>
                <div class="input-group">
                    <span class="input-group-text" id="name">
                        <i class="bi bi-person"></i>
                    </span>
                    <input name="name" type="text" class="form-control"
                        placeholder="{{ __('input.placeholder.name') }}" aria-label="name">
                </div>
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

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
                <label for="email">Email</label>
                <div class="input-group">
                    <span class="input-group-text" id="email">
                        <i class="bi bi-envelope"></i>
                    </span>
                    <input name="email" type="text" class="form-control"
                        placeholder="{{ __('input.placeholder.email') }}" aria-label="email">
                </div>
                @error('email')
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

            <div class="mb-3">
                <label for="password2">Password</label>
                <div class="input-group">
                    <span class="input-group-text" id="password2">
                        <i class="bi bi-key"></i>
                    </span>
                    <input name="password2" type="password" class="form-control"
                        placeholder="{{ __('input.placeholder.password2') }}" aria-label="password">
                </div>
                @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3 d-flex flex-column">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('login') }}" class="link-secondary">
                        Login
                    </a>
                </div>
                <button class="btn btn-outline-warning">
                    Register
                </button>
            </div>

        </form>
    </div>



</x-main-layout>
