@extends('layouts.main')

@section('title', "Admin List")

@section('content')
<div class="container-fluid">
 <h2>Admins</h2>
 <br>
 <div class="row">
    <div class="col-md-3">
        @if (Session::has('message'))
            <div class="alert alert-success">
            {{session('message')}}
            </div>
        @endif
        
        <br>
        @if($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
          </ul>
        </div>
        @endif
        <form method="post" class="form">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" id="email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control" name="password" id="password">
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="form-group">
                <label for="name">Phone</label>
                <input type="text" class="form-control" name="phone" id="phone">
            </div>
            
            <input type="submit" value="Add Admin" class="btn btn-primary"><br><br>
        </form>
    </div>
    <div class="col-md-9">
        <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Admins List</h3>
            </div>
            <div class="panel-body">
              <table class="table" id="adminList">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Created at</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                   $i=0;   
                  @endphp
                  @foreach ($adminList as $admin)
                  <tr>
                    <td>{{++$i}}</td>
                    <td>{{$admin['name']}}</td>
                    <td>{{$admin['email']}}</td>
                    <td>{{$admin['phone']}}</td>
                    <td>{{$admin['registration_datetime']}}</td>
                    <td><a href="{{route('admin.delete', ['id'=>$admin['login_id']])}}" class="btn btn-warning"><i class="fa fa-pencil"></i></a> <a href="{{route('admin.delete', ['id'=>$admin['login_id']])}}" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
        </div>
    </div>
 </div>
 
</div>


@endsection

@section('script')
<script>
  $(document).ready(function() {
    $('#adminList').DataTable();
});
</script>
@endsection