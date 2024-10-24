<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Fontawsome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <title>Laravel</title>
    <link rel="icon" href="{{ asset('image/favicon.png') }}" type="image/png">
    <link rel="shortcut icon" href="{{ asset('image/favicon.png') }}" type="image/png">

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

</head>

<body>
    <div class="login-form-section" style="background-image: url({{ asset('image/3165.jpg') }})">
        <form class="login-form" action="{{ route('user.login') }}" method="post">
            @csrf
            <h1 class="login-heading">Login</h1>
            <div class="mb-4">
                <input type="email" class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email') }}" name="email" id="email" placeholder="Email">
                {{-- @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror --}}
            </div>
            <div class="mb-4">
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                    id="password" placeholder="Password">
                {{-- @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror --}}
            </div>
            @if ($errors->any())
                <div class="error">
                    @foreach ($errors->all() as $error)
                        <p class="text-danger"><strong>{{ $error }}</strong></p>
                    @endforeach
                </div>
            @endif
            <div class="form-check">
                <div>
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" style="background-color: white">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <a href="" style="color: white;">Forget Password</a>
            </div>
            <button type="submit" class="btn btn-primary login-btn">Login</button>

            <p class="register-text">Dont have account? <a href="{{ route('register') }}"
                    style="color: white;font-weight: bold">Register</a></p>
        </form>
    </div>
    <script defer src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
