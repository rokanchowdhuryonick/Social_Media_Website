@extends('layouts.main')

@section('title', "User List")

@section('content')
<div class="container-fluid">
 <h2>Users</h2>
 <br>
 <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">All User List</h3>
    </div>
    <div class="panel-body">
      @if (Session::has('message'))
        <div class="alert alert-success">
          {{session('message')}}
        </div>
      @endif
      
      <br>
      @foreach ($errors->all() as $error)
        <div class="alert alert-danger">{{$error}}</div>
      @endforeach
      {{-- <form method="post" class="form-inline">
        @csrf
        <input type="text" class="form-control" name="country_name" id="">
        <input type="submit" value="Add" class="btn btn-primary">
      </form> --}}
<br>
      <table class="table" id="countryList">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Country Name</th>
            <th>Email</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @php
           $i=0;   
          @endphp
          @foreach ($userList as $user)
          <tr>
            <td>{{++$i}}</td>
            <td>{{$user['name']}}</td>
            <td>{{$user['country_name']}}</td>
            <td>{{$user['email']}}</td>
            <td>@php
                if ($user['active']=='1') {
                  echo "<span class='btn-success badge'>Active</span>";
                }else {
                  echo "<span class='btn-danger badge'>Deactive</span>";
                }
            @endphp
            </td>
            <td>
              <a href="/profile/{{$user['login_id']}}" class="btn btn-info"><i class="fa fa-eye"></i></a> <a href="user/update/1" class="btn btn-warning"><i class="fa fa-pencil"></i></a> <a href="user/delete/1" class="btn btn-danger"><i class="fa fa-trash"></i></a>
              @php
                if ($user['active']=='1') {
                  echo "<a href='".route('user.deactive', ['id'=>$user['login_id']])."' class='btn btn-danger'>Make Deactive</a>";
                }else {
                  echo "<a href='".route('user.active', ['id'=>$user['login_id']])."' class='btn btn-success'>Make Active</a>";
                }
              @endphp
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

    </div>
  </div>
</div>


@endsection

@section('script')
<script>
  $(document).ready(function() {
    $('#countryList').DataTable();
});
</script>
@endsection