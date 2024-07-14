@props(['attributes'])

<a data-bs-toggle="offcanvas" href="#{{ config('views.sidebar.id') }}" role="button"
    {{ $attributes->merge(['class' => 'text-reset']) }} aria-controls="{{ config('views.sidebar.id') }}">
    <i class="bi bi-list fs-4"></i>
</a>
