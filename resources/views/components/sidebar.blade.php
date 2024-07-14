<div class="offcanvas offcanvas-end" tabindex="-1" id="{{ config('views.sidebar.id') }}"
    aria-labelledby="{{ config('views.sidebar.id') }}">
    <div class="offcanvas-header">

        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="list-group">
            <a href="{{ route('home') }}" class="list-group-item list-group-item-action">
                <i class="bi bi-house"></i>
                Home
            </a>
            <a href="{{ route('memes.create') }}" class="list-group-item list-group-item-action">
                <i class="bi bi-plus-lg"></i>
                Upload Meme
            </a>
            <a href="{{ route('profile') }}" class="list-group-item list-group-item-action">
                <i class="bi bi-person"></i>
                Profile
            </a>
            <livewire:logout-button />
        </div>
    </div>
</div>
