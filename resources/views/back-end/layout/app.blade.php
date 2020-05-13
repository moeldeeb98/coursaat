<!DOCType html>
<html lang="en">
<head>
    <meta charset="utf8">
    <title>admin</title>
</head>
<body class="dark-edition">

<div class="wrapper">
    <!-- include the nav-bar -->
    @include('back-end.layout.side-bar')

    <div class="main-panel">

        <!--  Navbar -->
        @include('back-end.layout.header')
        <!-- End Navbar -->

        <!-- Contend -->
        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        <!-- End Content -->

        <!-- Footer -->
        @include('back-end.layout.footer')
        <!-- End Footer -->

    </div>
</div>
<!-- core JS files -->
{{--<script src="/assets/js/core/jquery.min.js"></script>--}}
{{--<script src="/assets/js/core/popper.min.js"></script>--}}
{{--<script src="/assets/js/core/bootstrap-material-design.min.js"></script>--}}
{{--<script src="https://unpkg.com/default-passive-events"></script>--}}
{{--<script src="/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>--}}
{{--<!-- place this tage in your head or just before your close body tag -->--}}
{{--<script async defer src="https://buttons.github.io/buttons.js"></script>--}}
{{--<!-- Google Maps Plugin  -->--}}
{{--<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>--}}
{{--<!-- Chartist JS -->--}}
{{--<script src="/assets/js/plugins/chartist.min.js"></script>--}}
{{--<!-- Notification plugin -->--}}
{{--<script src="/assets/js/plugins/bootstrap-notify.js"></script>--}}
{{--<!-- control center for material dashboard: parallax effects, scripts for the example pages etc  -->--}}
{{--<script src="/assets/js/material-dashboard.js?v=2.1.0"></script>--}}
{{--<!-- material dashboard DEMO methods, don't include it in your project  -->--}}
{{--<script src="/assets/demo/demo.js"></script>--}}

</body>
</html>
