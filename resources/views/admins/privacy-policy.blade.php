@extends('layouts.main')

@section('title', "Privacy Policy Update")

@section('content')
<div class="container-fluid">
 <h2>Privacy & Policy</h2>
 <br>
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
<br>

 <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Privacy & Policy Update</h3>
    </div>
    <div class="panel-body">
      <form method="post">
          @csrf
          <div class="form-group">
            <textarea name="privacy_policy" id="privacy_policy">{{$privacyPolicy->setting_value}}</textarea>
          </div>
          
          <input type="submit" class="btn btn-primary" value="Update"> <a href="/privacy-policy" class="btn btn-info" target="_blank">View Privacy & Policy</a>
      </form>
    </div>
</div>
 
</div>


@endsection

@section('script')
{{-- <script src="https://cdn.tiny.cloud/1/qk6hj018wod4v44a7lr2unxirdnkhsx1pi2tpatwurpzc7il/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> --}}
<script src="{{asset('vendors/tinymce/tinymce.min.js')}}"></script>
<script>
    tinymce.init({
        selector:'textarea#privacy_policy',
        branding: false,
        height: 500,
        plugins: [
            'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
            'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
            'table emoticons template paste help'
        ],
        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify |' +
            ' bullist numlist outdent indent | link image | print preview media fullpage | ' +
            'forecolor backcolor emoticons | code',
        });
  $(document).ready(function() {
    //$('#adminList').DataTable();
});
</script>
@endsection