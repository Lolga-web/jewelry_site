<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Ювелирная мастерская') }} @section('title') @show</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" async></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script>
  document.addEventListener("DOMContentLoaded", function () {  
      document.querySelectorAll('.main_nav_link').forEach(function(e){
        let location = window.location.href;
        let link = e.href;  
        if(location == link) { 
            e.classList.add('gold');
        }
      })
    // $('.main_nav_link').each(function () { 
    //     let location = window.location.href; 
    //     let link = this.href;  
    //     if(location == link) { 
    //         $(this).addClass('gold');
    //     }
    // })
});
</script>

</head>
<body>
    <div id="app">
        <div class="container">

            @include('navbar')

            <div class="main_container">
                
                @include('mainnav')

                <main>
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @elseif (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @yield('content')
                </main>
            
            </div> 
            
            @include('footer')
        </div>                 
    </div>

    <script src="{{ asset('js/functions.js') }}"></script>
</body>
</html>