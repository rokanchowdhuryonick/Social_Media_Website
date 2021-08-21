@extends('layouts.main')

@section('title', "Dashboard")

@section('content')
<div class="container-fluid">
    <h2>Dashboard</h2>
    <br>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Your Information</h3>
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
                        <tr>
                            <th>Last Login: </th><td>{{$userData['last_login_datetime']}}</td>
                        </tr>
                        @if (Session::get('user_type')=='admin')
                        <td colspan="2">
                            <a href="/admin/update/{{Session::get('login_id')}}">Edit Profile</a>
                        </td>
                        @endif
                        
        
                    </table>
                </div>
                
                <div class="col-md-2">
                    @if (Session::get('user_type')=='admin')
                    <a class="btn btn-primary" href="{{route('user.csv')}}">Export Users To CSV</a>
                    @endif
                </div>
                <div class="col-md-5">
                    <h2>Notices</h2>
                    <table class="table" id="noticeList">
                        <thead>
                            <tr><th>#</th><th>Title</th><th>Details</th><th>Date Time</th></tr>
                        </thead>
                        <tbody>
                            @php
                                $i=0;
                            @endphp
                            @foreach ($noticeList as $notice)
                            <tr>
                                <td>
                                    {{++$i}}
                                </td>
                                <td>
                                    {{$notice['notice_title']}}
                                </td>
                                <td>
                                    {{$notice['notice_text']}}
                                </td>
                                <td>
                                    {{$notice['created_at']}}
                                </td>
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
    $('#noticeList').DataTable();

});

</script>
@endsection