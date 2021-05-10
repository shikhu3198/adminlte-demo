@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Profile Page</h1>
@stop

@section('content')
    
          
            <div class="col-md-6">
              <div class="box box-primary">
            <div class="box-header with-border">
              <h2>Profile Data</h2>    
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" name="user_form" action="{{ url('profile/update',Auth::user()->id)}}" method="post">
              @method('PATCH')
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" class="form-control" placeholder="Enter name" name="name" required="" value="{{Auth::user()->name}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" readonly="" value="{{Auth::user()->email}}">
                </div>
                <div class="form-group">
                  <label>Mobile</label>
                  <input type="number" class="form-control" placeholder="Enter mobile number" name="mobile" value="{{Auth::user()->mobile}}">
                </div>
                <img src="{{ asset('storage/images/'.Auth::user()->profile) }}" class="mdimg" alt="img" onError="this.onerror=null;this.src='{{ asset('images/user.png') }}';"><br><br><br>Update Image<br>
                <input type="file" class="form-control form-control-sm smfile" name="profile" value="">              
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
            </div>

         
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop