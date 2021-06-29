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
      <form method="post" class="form-inline">
        @csrf
        <input type="text" class="form-control" name="countryName" id="">
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
          <tr>
            <td>1</td>
            <td>Bangladesh</td>
            <td><a href="country/update/1" class="btn btn-warning"><i class="fa fa-pencil"></i></a> <a href="country/delete/1" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
          </tr>
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