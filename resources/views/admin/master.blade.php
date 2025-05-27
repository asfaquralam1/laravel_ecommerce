<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!--datatable-->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.dataTables.css">
    <!-- Fontawsome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    {{-- toastr notification --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('css/line-awesome.min.css') }}">

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/line-awesome@1.3.0/dist/line-awesome/css/line-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" > -->


    <link rel="icon" href="{{ asset('image/favicon.png') }}" type="image/png">
    <link rel="shortcut icon" href="{{ asset('image/favicon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/admin/main.css') }}">

    <title>@yield('page_title')</title>
</head>

<body>
    @include('admin.partials.header')
    @section('content')
    @show
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!--datatable-->
    <script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                "language": {
                    "sLengthMenu": "Show _MENU_ Entries",
                    "sSearch": "Search:", // Change the search box text
                    "oPaginate": {
                        "sPrevious": "Previous", // Change text for the previous button
                        "sNext": "Next" // Change text for the next button
                    }
                }
            });
        });
    </script>
    @if (Session::has('success'))
        <script>
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
            }
            toastr.success("{{ Session::get('success') }}", 'Success!', {
                timeout: 12000
            });
        </script>
    @endif
    @if (Session::has('error'))
        <script>
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
            }
            toastr.error("{{ Session::get('error') }}", 'Error!', {
                timeout: 12000
            });
        </script>
    @endif
    @if (Session::has('warning'))
        <script>
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
            }
            toastr.warning("{{ Session::get('warning') }}", 'Warning!', {
                timeout: 12000
            });
        </script>
    @endif
    <script>
        $('#sidebar-toggle').on('click', function() {
            var $sidebar = $('.side-nav');
            // Toggle the 'sidebar-open' class on layout-wrapper
            if ($('.layout-wrapper').hasClass('sidebar-open')) {
                $('.layout-wrapper').removeClass('sidebar-open').addClass('sidebar-closed');
                $sidebar.css('width', '0px');
            } else {
                $('.layout-wrapper').removeClass('sidebar-closed').addClass('sidebar-open');
                $sidebar.css('width', '250px');
            }
        });
        $('#sidebar-close').on('click', function() {
            var $sidebar = $('.side-nav');
            // Toggle the 'sidebar-open' class on layout-wrapper
            if ($('.layout-wrapper').hasClass('sidebar-open')) {
                $('.layout-wrapper').removeClass('sidebar-open').addClass('sidebar-closed');
                $sidebar.css('width', '0px');
            }
        });
    </script>
    @stack('scripts')
</body>

</html>
