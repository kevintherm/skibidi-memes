<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Skibidi Memes</title>

    <link rel="shortcut icon" href="logo.png" type="image/png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('lib/css/share-buttons.css') }}">

    @if (isset($head))
        {{ $head }}
    @endif


    <style>
        :root {
            --secondary: #f3f4f6;
        }

        .container {
            width: 100%;
            max-width: 36rem;
            margin-inline: auto;
        }
    </style>

    <script>
        function errorImage(el) {
            el.src = '/profile.jpg';
        }
    </script>
</head>

<body class="position-relative">


    <x-navbar />

    <x-sidebar />

    {{ $slot }}

    <x-footer />

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('lib/js/share-buttons.js') }}"></script>
    <script src="{{ asset('lib/js/share-buttons.jquery.js') }}"></script>
    <script src="{{ asset('lib/js/isview.js') }}"></script>


    @if (session()->has('message'))
        <script>
            Swal.fire(@json(session('message')))
        </script>
    @endif

    @if (session()->has('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: @json(session('success'))
            })
        </script>
    @endif

    @if (session()->has('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: @json(session('error'))
            })
        </script>
    @endif

    @if (isset($foot))
        {{ $foot }}
    @endif
</body>

</html>
