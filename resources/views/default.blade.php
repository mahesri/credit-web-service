@extends('adminlte::master')

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop

<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>

</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
