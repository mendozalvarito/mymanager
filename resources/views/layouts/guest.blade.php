<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-partials.head />

<body>
    <section class="d-flex justify-content-center align-items-start vh-100 py-5 px-3 px-md-0">
        {{ $slot }}
    </section>
</body>
