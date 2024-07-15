<nav class="navbar">
    <div class="container d-flex align-items-center justify-content-between">
        <a class="navbar-brand" href="/">
            <img src="/logo.png" alt="Omg" width="50" height="50">
        </a>

        <div class="d-flex align-items-center">
            <a href="{{ route('memes.create') }}" class="text-reset">
                <i class="bi bi-plus-lg fs-5 m-1"></i>
            </a>
            <x-sidebar-trigger class="m-1" />
        </div>
    </div>
</nav>
