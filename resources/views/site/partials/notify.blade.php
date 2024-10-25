
    <!-- iziToast -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/iziToast.min.css') }}">
    <script src="{{ asset('assets/admin/js/iziToast.min.js') }}"></script>

    @if(session()->has('notify'))
      @foreach(session('notify') as $msg)
        <script>
            "use strict";
            iziToast.{{ $msg[0] }}({message:"{{ trans($msg[1]) }}", position: "topRight"});
        </script>
        @endforeach
    @endif

    @if ($errors->any())
    <script>
        "use strict";
        @foreach ($errors->all() as $error)
            iziToast.error({
                message: '{{ $error }}',
                position: "topRight"
            });
        @endforeach
    </script>

    @endif
    <script>
        "use strict";
        function notify(status, message) {
            if(typeof message == 'string'){
                iziToast[status]({
                    message: message,
                    position: "topRight"
                });
            }else{

                console.log(message);
                $.each(message, function(i, val) {
                    iziToast[status]({
                        message: val,
                        position: "topRight"
                    });
                });
            }
        }

        function notifyOne(status, message) {
             iziToast[status]({
                 message: message,
                 position: "topRight"
             });
        }
    </script>

