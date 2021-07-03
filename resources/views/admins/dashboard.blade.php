@extends('layouts.main')

@section('title', "Admin List")

@section('content')
<div class="container-fluid">
    <h2>Dashboard</h2>
    <br>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Your Information</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-5">
                    <table class="table" width="50%">
                        <tr>
                            <th>
                                Name:
                            </th>
                            <td>
                                {{$userData['name']}}
                            </td>
                        </tr>
                        <tr>
                            <th>Email</th><td>{{$userData['email']}}</td>
                        </tr>
                        <tr>
                            <th>Phone</th><td>{{$userData['phone']}}</td>
                        </tr>
                        <tr>
                            <th>User Type: </th><td><b>{{$userData['user_type']}}</b></td>
                        </tr>
        
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection