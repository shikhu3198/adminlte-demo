@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
	@if(Auth::user()->userrole_id == '2')
	<p>Welcome <b>{{Auth::user()->name}}</b>.</p>
	<br>
	<p>As you are a User, You not have access for Side Modules.</p>
	@else
    <p>Welcome to this beautiful admin panel.</p>
    @endif
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop