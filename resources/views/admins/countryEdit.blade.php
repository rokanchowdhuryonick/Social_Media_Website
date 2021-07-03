@extends('layouts.main')

@section('title', "Country List")

@section('content')
<div class="container-fluid">
 <h2>Country</h2>
 <br>
 <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">All Country List</h3>
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
      <div class="row">
          <div class="col-12">
            <form method="post" class="form">
                @csrf
                <input type="text" class="form-control" name="country_name" value="{{$country['country_name']}}">
                <input type="submit" value="Update" class="btn btn-primary">
              </form>
          </div>
      </div>
      
<br>
      

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