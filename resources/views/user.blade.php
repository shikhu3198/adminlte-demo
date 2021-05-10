@extends('adminlte::page')

@section('title', 'User Managemet')

@section('content_header')
@stop

@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <div class="container">
            <h2>User List</h2>
            <a href="{{ route('user.create') }}" class="btn btn-info btn-sm">Create User</a>
            <table class="table table-bordered" id="laravel">
               <thead>
                  <tr>
                     <th>Id</th>
                     <th>Name</th>
                     <th>Email</th>
                     <th>Created at</th>
                     <th>Actions</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach($userdata as $user)
                  <tr>
                     <td>{{ $user->id }}</td>
                     <td>{{ $user->name }}</td>
                     <td>{{ $user->email }}</td>
                     <td>{{ date('d-m-Y', strtotime($user->created_at)) }}</td>
                     <td>
                  <a href="{{url('edit-users',$user->id)}}" class="btn btn-info btn-sm">Edit</a>
                  <a href="{{url('deleteusers',$user->id)}}" class="btn btn-danger btn-sm">Delete</a>
                </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop