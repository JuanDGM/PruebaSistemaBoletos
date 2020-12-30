<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css')}}">
    <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css') }}">
    
    @yield('styles')
    <title>@yield('title')</title>
</head>
<body>
    
    <div class="app">
        <div class="header">
            <h1>@yield('titlePage')</h1>
            <div>@yield('accesoAdministrador')</div>
        </div>

        <div class="article">

            @yield('content')

        </div>
       <div class="footer" id="footer">
            <div class="pagina">www.laboleteria.com</div>
            <div class="contacto">Informes: cel 316 345 43 92    - Contacto: Juan David García </div>    
       </div> 
    </div>
    <script src="{{ asset('https://code.jquery.com/jquery-3.5.1.js')}}"></script>
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js') }}"></script>
    @yield('scripts') 

</body>
</html>