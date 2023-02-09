{{-- ASI SE HACE COMENTARIOS EN BLADE --}}
{{-- Agregando layouts con componentes  --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- si se usa aqui, se puede usar cualquier variable  --}}

   
</head>

<body>
    {{--@include('partials.navigation')--}}
    {{-- se usa slots y es como si fuera el yield --}}
<x-layouts.navigation/>

{{--mensaje en pantalla por medio de flash--}}
@if(session('status'))
    <div>{{ session('status') }}</div>
@endif

{{ $slot }}
@vite(['resources/css/app.css', 'resources/js/app.js'])
</body>
</html>