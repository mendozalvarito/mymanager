<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-partials.head />

<body>
    <x-partials.nav />
    <!-- Page Content -->
    <main id="main">
        <br>
        <!-- Content-->
        <section class="container-fluid">
            {{ $slot }}
            <x-partials.footer />
            {{ $modal ?? '' }}
        </section>
        <!-- / Content-->
    </main>
    <!-- /Page Content -->
    <x-partials.aside />
</body>

</html>
