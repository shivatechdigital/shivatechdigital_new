<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ShivaTechDigital | Admin Dashboard</title>

    <link rel="icon"
          type="image/png"
          href="{{ asset('admin_assets/images/favicon.png') }}"
          sizes="16x16">

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />

    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"
          rel="stylesheet" />

    <!-- Admin CSS -->
    @include('adminDashboard.components.css.style')

    <!-- Dynamic Styles -->
    @stack('styles')

</head>

<body>

    <!-- Overlay -->
    <div class="body-overlay"></div>

    <!-- Sidebar -->
    @include('adminDashboard.components.sidebar')

    <!-- Main Dashboard -->
    <main class="dashboard-main">

        <!-- Topbar -->
        @include('adminDashboard.components.topbar')

        <!-- Page Content -->
        <div class="dashboard-main-body">

            @yield('adminDashboard.content')

        </div>

        <!-- Footer -->
        @include('adminDashboard.components.footer')

    </main>

    <!-- Main JS -->
    @include('adminDashboard.components.js.script')

    <!-- Font Awesome JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/js/all.min.js"></script>

    <!-- Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Global Select2 Init -->
    <script>
        $(document).ready(function () {

            $('select[name="tags[]"]').select2({
                placeholder: "Select Tags",
                allowClear: true,
                width: '100%'
            });

        });
    </script>

    <!-- Dynamic Scripts -->
    @stack('scripts')

</body>
</html>