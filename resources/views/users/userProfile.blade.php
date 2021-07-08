@extends('layouts.main')

@section('title', "User Profile")

@section('content')

<div class="container-fluid">
      
    <div id="page-contents">
    <div class="row">
        <div class="col-md-3 static">
            <div id="sticky-sidebar">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="profile-info text-center">
                            <img src="{{asset('images/users/user-1.jpg')}}" alt="" class="profile-photo-lg">
                        </div>
                        <br>
                        <h3 class="text-center">{{$user['name']}}</h3>
                        <div class="list-group">
                            <a href="#" class="list-group-item">
                                <span class="badge">14</span>
                                <b>Friends:</b>
                            </a>
                            <a href="#" class="list-group-item">
                                <span class="badge badge-primary">{{$user['registration_datetime']}}</span>
                                <b>Account Created</b>
                            </a>
                          </div>
                        

                    </div>
                    <div class="panel-footer">
                        <a class="btn btn-danger" href="{{route('user.convertToAdmin',$user['login_id'])}}">Convert To Admin</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
        <table class="table">
            <tr>
                <th>
                    Email:
                </th>
                <td>
                    {{$user['email']}}
                </td>
            </tr>
            <tr>
                <th>
                    Country:
                </th>
                <td>
                    @foreach ($countryList as $country)
                        @if ($country['country_id']==$user['country_id'])
                            {{$country['country_name']}}
                            @php
                                break;
                            @endphp
                        @endif
                    @endforeach
                </td>
            </tr>
            <tr>
                <th>
                    Gender:
                </th>
                <td>
                    {{$user['gender']}}
                </td>
            </tr>
            <tr>
                <th>
                    Phone:
                </th>
                <td>
                    {{$user['phone']}}
                </td>
            </tr>
        </table>

        </div>
    </div>
    </div>
  </div>


@endsection

@section('script')
<script>
//   $(document).ready(function() {
//     $('#countryList').DataTable();
// });
</script>
@endsection