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
    <div class="register-form-section">
        <form action="{{ route('user.register') }}" method="post" class="register-form" name="registrationForm"
            id="registrationForm">
            @csrf
            <h4 class="text-center" style="padding-bottom: 20px;color: black">Register Now</h4>
            <div class="mb-4">
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    id="name" placeholder="Name">
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="mb-4">
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    id="email" placeholder="Email">
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="mb-4">
                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
                    id="phone" placeholder="Phone">
                    @if ($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
            </div>

            <div class="mb-4">
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                    id="password" placeholder="Password">
                    @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
                
            </div>

            <div class="mb-4">
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                    name="password_confirmation " id="password_confirmation" placeholder="Confirm Password">
                @if ($errors->has('password_confirmation'))
                    <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                @endif
            </div>

            <button type="submit" class="btn btn-success">Submit</button>
            <p style="color: black ">Already have a account?<a href="{{ route('login') }}">Login</a></p>
        </form>
    </div>
    <script defer src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script type="text/javascript">
        $("registrationForm").submit(function(event) {
            event.preventDefault();

            $.ajax({
                url: '{{ route('user.register') }}',
                type: 'post',
                data: $(this).serializeArray(),
                dataType: 'json',
                success: function(response) {

                    var errors = response.errors;

                    if (response.status == false) {
                        if (errors.name) {
                            $("#name").siblings("p").addClass('invalid-feedback').html(errors.name);
                            $("#name").addClass('is-invalid')
                        } else {
                            $("#name").siblings("p").addClass('invalid-feedback').html(errors.name);
                            $("#name").addClass('is-invalid')
                        }
                        if (errors.email) {
                            $("#email").siblings("p").addClass('invalid-feedback').html(errors.email);
                            $("#email").addClass('is-invalid')
                        } else {
                            $("#email").siblings("p").addClass('invalid-feedback').html(errors.email);
                            $("#email").addClass('is-invalid')
                        }
                        if (errors.password) {
                            $("#password").siblings("p").addClass('invalid-feedback').html(errors
                                .password);
                            $("#password").addClass('is-invalid')
                        } else {
                            $("#password").siblings("p").addClass('invalid-feedback').html(errors
                                .password);
                            $("#password").addClass('is-invalid')
                        }
                    } else {
                        $("#name").siblings("p").removeClass('invalid-feedback').html('');
                        $("#name").removeClass('is-invalid')

                        $("#email").siblings("p").removeClass('invalid-feedback').html('');
                        $("#email").removeClass('is-invalid')

                        $("#password").siblings("p").removeClass('invalid-feedback').html('');
                        $("#password").removeClass('is-invalid')

                        window.location.href = "{{ route('login') }}";
                    }

                },
                error: function() {
                    _
                    console.log("Someting went wrong");
                }
            })
        })
    </script>
</body>

</html>
