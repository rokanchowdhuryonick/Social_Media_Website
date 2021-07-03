@extends('layouts.main')

@section('title', "Resticted Words List")

@section('content')
<div class="container-fluid">
 <h2>Resticted Words</h2>
 <br>
 <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Res List</h3>
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
      <form method="post" class="form-inline">
        @csrf
        <input type="text" class="form-control" name="country_name" id="">
        <input type="submit" value="Add" class="btn btn-primary">
      </form>
<br>
      <table class="table" id="countryList">
        <thead>
          <tr>
            <th>#</th>
            <th>Country Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @php
           $i=0;   
          @endphp
          @foreach ($countryList as $country)
          <tr>
            <td>{{++$i}}</td>
            <td>{{$country['country_name']}}</td>
            <td><a href="country/update/{{$country['country_id']}}" class="btn btn-warning"><i class="fa fa-pencil"></i></a> <a href="country/delete/{{$country['country_id']}}" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
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