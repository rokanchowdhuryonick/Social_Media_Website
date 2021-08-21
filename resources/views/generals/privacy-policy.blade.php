@extends('layouts.main')

@section('title', "Privacy Policy Update")

@section('content')
<div class="container-fluid">
 <h2>Privacy & Policy</h2>
 <br>


 <div class="panel panel-primary">
    <div class="panel-body">
        {!! $privacyPolicy->setting_value !!}
    </div>
</div>
 
</div>


@endsection

@section('script')
<script>
  $(document).ready(function() {
    //$('#adminList').DataTable();
});
</script>
@endsection