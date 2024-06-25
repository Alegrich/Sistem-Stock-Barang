<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | Dashboard</title>

    @include('layouts.include')

    @stack('style')
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            @include('layouts.header')
            <div class="main-sidebar sidebar-style-2">
                @include('layouts.aside')
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>@yield('main')</h1>
                        <div class="section-header-breadcrumb">
                            @yield('location')
                        </div>
                    </div>

                    <div class="section-body">
                        @yield('content')
                    </div>
                </section>
            </div>
            @include('layouts.footer')
        </div>
    </div>

    @include('layouts.script')
    @stack('script')


    <script>
        document.getElementById('logout-link').addEventListener('click', function(event) {
            event.preventDefault(); // Mencegah perilaku default tautan

            fetch('/logout', { // rute logout
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            }).then(response => {
                if (response.ok) {
                    // logout berhasil, alihkan ke halaman login atau halaman lain
                    window.location.href = '/login';
                } else {
                    // Handle error logout
                    console.error('Logout failed');
                }
            });
        });
    </script>
</body>

</html>
