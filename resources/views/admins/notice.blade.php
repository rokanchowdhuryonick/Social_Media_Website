@extends('layouts.main')

@section('title', "Notice List")

@section('content')
<div class="container-fluid">
 <h2>Notices</h2>
 <br>
 <div class="row">
    <div class="col-md-4">
        <div id="message"></div>
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
        <form method="post" class="form" id="noticeForm">
            @csrf
            <div class="form-group">
                <label for="notice_title">Notice Title</label>
                <input type="text" class="form-control" name="notice_title" id="notice_title">
            </div>
            <div class="form-group">
                <label for="notice_text">Notice Text</label>
                <textarea name="notice_text" id="notice_text" class="form-control" rows="5"></textarea>
            </div>
            <div class="form-group">
                <label for="notice_for">Notice For</label>
                <select name="notice_for" class="form-control" id="notice_for">
                        <option value="0">--All--</option>
                    @foreach ($userList as $user)
                        <option value="{{$user['login_id']}}">{{$user['email']}}</option>
                    @endforeach
                </select>
            </div>
            
            <input type="submit" value="Create Notice" id="submitBtn" class="btn btn-primary"><br><br>
        </form>
    </div>
    <div class="col-md-8">
        <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Admins List</h3>
            </div>
            <div class="panel-body">
              <table class="table" id="noticeList">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Text</th>
                    <th>To</th>
                    <th>Created at</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                   $i=0;   
                  @endphp
                  @foreach ($noticeList as $notice)
                  <tr>
                    <td>{{++$i}}</td>
                    <td>{{$notice['notice_title']}}</td>
                    <td>{{$notice['notice_text']}}</td>
                    <td>
                        @foreach ($userList as $user)
                            @if ($notice['notice_for']==$user['login_id'])
                                {{$user['email']}}
                                @php
                                    break;
                                @endphp
                            @elseif ($notice['notice_for']=='0')
                                All
                                @php
                                    break;
                                @endphp
                            @endif

                        @endforeach
                        {{-- {{$notice['notice_for']}} --}}
                    </td>
                    <td>{{$notice['created_at']}}</td>
                    <td><button onclick="editFunc('/notice/{{$notice['notice_id']}}')" class="btn btn-warning"><i class="fa fa-pencil"></i></button> <a href="/notice/delete/{{$notice['notice_id']}}" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
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

function editFunc(fetchUrl)
{ 
  $(".invalid-feedback").remove();
  //$("#updateForm .form-control").removeClass('is-invalid').removeClass('is-valid');
  $.ajax({
    url: fetchUrl,
    type: 'get',
    dataType: 'json',
    success:function(response) {
//console.log(response.data.notice_title);

      $("#notice_title").val(response.data.notice_title);
      $("#notice_text").val(response.data.notice_text);
      $("#notice_for").val(response.data.notice_for);
      $("#submitBtn").val('Update Notice');
      $("#noticeForm").attr('action', '/notice/update/'+response.data.notice_id);
      

      // submit the edit from 
      $("#noticeForm").unbind('submit').bind('submit', function() {
        var form = $(this);

        // remove the text-danger
        $(".invalid-feedback").remove();

        $.ajax({
          url: form.attr('action'),
          type: form.attr('method'),
          data: form.serialize(),
          dataType: 'json',
          success:function(response) {

            //locationListTable.ajax.reload(null, false); 

            if(response.success === true) {
              $("#message").html('<div class="alert alert-success alert-dismissible" role="alert">'+
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.message+
              '</div>');

              //$("#updateForm .form-control").removeClass('is-invalid').removeClass('is-valid');

            } else {
              if(response.errors instanceof Object) {
                $.each(response.errors, function(index, value) {
                  var id = $("#"+index);

                //   id.closest('.form-control')
                //   .removeClass('is-invalid')
                //   .removeClass('is-valid')
                //   .addClass(value.length > 0 ? 'text-danger' : 'is-valid');
                  
                  id.after("<span class='text-danger invalid-feedback'>"+value+"</span>");

                });
              } else {
                $("#message").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
                  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                  '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.message+
                '</div>');
              }
            }
          }
        }); 

        return false;
      });

    }
  });

  return false;
}
</script>
@endsection