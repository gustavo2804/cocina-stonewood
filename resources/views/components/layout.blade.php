<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $metaTitle ?? 'casi-Colmado'}}</title>

{{-- <script src="https://cdn.tailwindcss.com"></script> --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
@livewireStyles
</head>
<body>
    <x-nav/>
    @session('status')
        <div style="color:blue"><h3>{{ $value }}</h3></div>    
    @endsession
    {{ $slot }}

    @isset($sideBar)
        <div id='sidebar'>

            <h3>SideBar</h3>
            <div>{{ $sideBar }}</div>
        </div>
        
    @endisset
    @livewireScripts
   
    @yield('js')
</body>
</html>
