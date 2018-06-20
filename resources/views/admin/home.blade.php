@extends('adminlte::page')

@section('title', 'Admin')
@section('my_admin_css')

    <link rel="stylesheet" href="/css/admin.css">

@endsection

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

    @yield('my_content')
@stop

@section('script')
    <script type="text/javascript" src='/js/admin/ajax.js'>
    </script>
@show
