@extends('layouts.main')

@section('title', "Admin List")

@section('content')
<div class="container-fluid">
    <h2>Admin</h2><br>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Update Admin Data</h3>
        </div>
        <div class="panel-body">
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
            
            <div class="row">
                <div class="col-md-6">
                    <form method="post" class="form">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" value="{{$datas['userData']['name']}}" id="name">
                        </div>
                        <div class="form-group">
                            <label for="name">Phone</label>
                            <input type="text" class="form-control" name="phone" value="{{$datas['userData']['phone']}}" id="phone">
                        </div>
                        <div class="form-group">
                            <label for="country_id">Country</label>
                            <select name="country_id" id="country_id" class="form-control">
                                <option value="-1">Select Country....</option>
                                @foreach ($datas['countryList'] as $country)
                                <option value="{{$country['country_id']}}" @php
                                if($datas['userData']['country']==$country['country_id']){
                                    echo  "selected";
                                }
                            @endphp>{{$country['country_name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label><br>
                            <input type="radio" class="" name="gender" value="Male" @if ($datas['userData']['gender']=='Male')
                                checked
                            @endif> Male<br>
                            <input type="radio" class="" name="gender" value="Female" @if ($datas['userData']['gender']=='Female')
                            checked
                        @endif > Female
                        </div>
                        <input type="text" value="adminDataUpdate" hidden name="updateType">
                        <input type="submit" value="Update Admin Data" class="btn btn-primary"><br><br>
                    </form>
                </div>
                <div class="col-md-6">
                    <form action="" method="post" class="form">
                        @csrf
                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input type="text" class="form-control" name="password" id="password">
                            <input type="text" value="adminPasswordUpdate" hidden name="updateType">
                            
                        </div>
                        <input type="submit" value="Update Admin Password" class="btn btn-primary"><br><br>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection