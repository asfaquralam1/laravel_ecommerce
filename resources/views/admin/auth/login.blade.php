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

    <link rel="icon" href="{{ asset('image/favicon.png') }}" type="image/png">
    <link rel="shortcut icon" href="{{ asset('image/favicon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/admin/main.css') }}">

    <title>@yield('page_title')</title>
</head>

<body>
<div class="login-form-section" style="background-image: url({{ asset('image/3165.jpg') }})">
        <form class="login-form" action="{{ route('admin.authenticate') }}" method="post">
            @csrf
            <h1 class="login-heading">Login</h1>
            <div class="mb-4">
                <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                    name="email" id="email" placeholder="Useremail">
                @error('email')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                    id="password" placeholder="Password">
                @error('password')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            @if ($errors->has('verify'))
            <div class="mb-4 text-center">
                <span class="text-danger">{{ $errors->first('verify') }}</span>
            </div>
            @endif
            <div class="mb-3 form-check" style="display: flex;justify-content:space-between">
                <div>
                    <label class="form-check-label" >Remember Me</label>
                    <input type="checkbox" class="form-check-input" value="1" id="exampleCheck1" style="background-color: white">
                </div>
                <a href="" style="color: white;">Forget Password</a>
            </div>
            <button type="submit" class="btn btn-primary login-btn">Login</button>
        </form>
    </div>    

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!--datatable-->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 
</body>

</html>
