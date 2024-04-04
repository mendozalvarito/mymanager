<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="">
    <x-partials.nav />
    <!-- Page Content -->
    <main id="main">
        <br>
        <!-- Content-->
        <section class="container-fluid">
            <div class="card mb-4">
                <div class="card-header justify-content-between align-items-center d-flex">
                    <h6 class="card-title m-0">Section title</h6>
                    <div class="dropdown">
                        <button class="btn btn-link dropdown-toggle dropdown-toggle-icon fw-bold p-0" type="button"
                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ri-more-2-line"></i>
                        </button>
                        <ul class="dropdown-menu dropdown" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <p>Click on the ellipse icon in the top right corner of this card to see a dropdown example
                        integrated with the card header title.</p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Launch demo modal
                    </button>
                </div>
            </div>
            <x-partials.footer />
            <x-main.modal/>
        </section>
        <!-- / Content-->

    </main>
    <!-- /Page Content -->
    <x-partials.aside />
</body>

</html>
