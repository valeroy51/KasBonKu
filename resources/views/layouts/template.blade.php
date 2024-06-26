<!doctype html>
<html lang="en">

@include('layouts.head')

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">

        @auth
        @if (auth()->user()->admin)
        @include('layouts.menuadmin') {{-- Menu untuk admin --}}
        @else
        @include('layouts.menu') {{-- Menu untuk pengguna biasa --}}
        @endif
        @endauth

        @guest
        @include('layouts.menu') {{-- Menu untuk pengguna yang tidak login --}}
        @endguest

        <!--  Main wrapper -->
        <div class="body-wrapper">


            @include('layouts.profile')

            @yield('content')
        </div>
    </div>

    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/sidebarmenu.js"></script>
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
    <script src="../assets/js/dashboard.js"></script>
</body>

</html>