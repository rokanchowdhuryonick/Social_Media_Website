@extends('layouts.main')

@section('title', "Login")

@section('content')
<div class="container-fluid">
    <h2>Login Panel</h2>
    <hr>

    @if (Session::has('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
    @endif
    
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
        
        
        <input type="submit" value="Login" class="btn btn-primary"><br><br>
    </form>


</div>
@endsection
