<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="{{asset('plugins/dist/js/jquery.min.js')}}"></script>
        <script src="{{asset('plugins/dist/js/jquery.mask.min.js')}}"></script>

        @yield('styles')
    </head>
    <body class="@yield('color') font-sans antialiased dark:bg-black dark:text-white/50 h-full">
        <div class="text-black/50 dark:bg-black dark:text-white/50">
            @yield('content')
        </div>
    </body>
    @yield('scripts')

    <script>
        // JavaScript code to disable form submission if there are invalid fields
        (function() {
          'use strict'

          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.querySelectorAll('.needs-validation')

          // Loop over them and prevent submission
          Array.prototype.slice.call(forms)
            .forEach(function(form) {
              form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
              }, false)
            })
        })()
    </script>

    <script>
        $(function() {
            $(':input').change(function () {
                $(this).removeClass('is-invalid');
            });

            @if(session('status'))
                toastr.success("{{ session('status') }}")
            @elseif($errors->has('success'))
                toastr.success("{{ $errors->first('success') }}")
            @elseif($errors->has('warning'))
                toastr.warning("{{ $errors->first('warning') }}")
            @elseif($errors->any())
                @foreach ($errors->all() as $error)
                    toastr.error("{{ $error }}")
                @endforeach
            @endif
        });
    </script>
</html>
