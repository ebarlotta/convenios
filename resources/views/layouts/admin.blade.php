@extends('adminlte::page')



@section('content')
    <p>Welcome to this beautiful admin panel.</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@livewireScripts

@section('js')
    <script> console.log('Hi!'); </script>
@stop