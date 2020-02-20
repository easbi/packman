<!doctype html>
<!--
    Solution by GetTemplates.co
    URL: https://gettemplates.co
-->
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- awesone fonts css-->
    <link href="{{ asset('css/font-awesome.css')}}" rel="stylesheet" type="text/css">
    <!-- owl carousel css-->
    <link rel="stylesheet" href="{{ asset('owl-carousel/assets/owl.carousel.min.css') }}" type="text/css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery.dataTables.css')}}">
    <title>Packet Management</title>
    <style>

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light bg-transparent" id="gtco-main-nav">
        <div class="container"><a class="navbar-brand">Packman</a>
            <button class="navbar-toggler" data-target="#my-nav" onclick="myFunction(this)" data-toggle="collapse"><span
                class="bar1"></span> <span class="bar2"></span> <span class="bar3"></span></button>
                <div id="my-nav" class="collapse navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a class="nav-link" href="{{ url('/transaksis') }}">Beranda</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/monitoring') }}">Monitoring (alpha) </a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/transaksis/create') }}">Input Paket</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/transaksis/show') }}">Tabel Paket</a></li>
                    </ul>
            {{-- <form class="form-inline my-2 my-lg-0">
                <a href="#" class="btn btn-outline-dark my-2 my-sm-0 mr-3 text-uppercase">login as packman</a> 
            </form> --}}
        </div>
    </div>
</nav>

@yield('content')

<footer class="container-fluid" id="gtco-footer">
    <div class="container">
        <div class="row">
        </div>
    </div>
</footer>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script type="text/javascript" charset="utf8" src="{{asset('js/jquery-3.3.1.js')}}"></script>
<script type="text/javascript" charset="utf8" src="{{asset('js/jquery.dataTables.js')}}"></script>
<script src="{{asset('js/jquery-ui.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- owl carousel js-->
<script src="{{asset('owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
@stack('scripts')

</body>
</html>
