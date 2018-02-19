@extends('layouts.app')

@section('content')
<style>
  .navbar-default .navbar-nav > li > a{
    color:white !important;
  }
  .navbar-default .menu-li > li > a {
    color:rgb(37, 36, 36) !important;
  } 
</style>
<div class="menu-bg"></div>

<div class="univer-bg ">
    <img src="{{URL::to('img/univer-header.jpg')}}" width="100%" style="visibility: hidden" alt="">
        <div class="container">
                <span class="uniName"><h1>{{ $info->university_name }}</h1></span >  
        </div>   
</div>
<div class="container main-container ">
  <div class="row">
    <div class="col-md-3 col-lg-3 col-sm-6 col-xs-6 text-center">
          <?php
          $logo = $info->logo;
          $path = \Illuminate\Support\Facades\Auth::user()->id.'/'.$info->logo; 
        ?>
        @if($logo != null)
            <img src="{{URL::to('storage/app/UniverDocs/'.$path)}}" class="img-thumbnail"  alt=""><br>
        @else
            <img src="{{URL::to('img/no-logo.jpg')}}" class="img-thumbnail" alt=""><br>
        @endif

      <button class="btn btn-primary btn-block pull-left" style="margin-top: 10px;" data-toggle="modal" data-target="#myModal">Update Logo</button>
       <br><br>
       <hr>
      <div class="sidebar-nav">
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <span class="visible-xs navbar-brand">Sidebar menu</span>
          </div>
          <div class="navbar-collapse collapse sidebar-navbar-collapse">
            <ul class="nav navbar-nav menu-li">
              <li class="active"><a href="{{ Route('university') }}">General information</a></li>
              <li><a href="{{ Route('add_program') }}">Add an educational program</a></li>
              <li><a href="{{ Route('candidates') }}">Candidates</a></li>
              <!-- <li><a href="#">Posts <span class="badge">3</span></a></li> -->
              <li><a href="{{ Route('university_edit') }}">Edit profile</a></li>
              <li><a href="#">Change password</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <div class="col-md-9 col-lg-9 col-sm-6 col-xs-6">
      <!-- <a href="{{ Route('university_edit') }}"<button type="button" class="btn btn-primary" style="margin-top:15px"><span class="fa fa-pencil"></span> EDIT</button></a> -->
    
      <h3><b>University</b></h3> 
            <table class="table">
              <tr>
                <td><b>Full name</b></td>
                <td>{{ $info->university_name }}</td>
              </tr>
              <tr>
                <td><b>Abbreviated name</b></td>
                <td>{{ $info->abbreviated }}</td>
              </tr>
              <tr>
              <?php 
                $data = DB::table('states') ->where('id', $info->id_state)->first();
              ?>
                <td><b>State</b></td>
                <td>{{$data->state}}</td>
              </tr>
              <tr>
                <td><b>City</b></td>
                <td>{{ $info->city }}</td>
              </tr>
              <tr>
                <td><b>Street, house of a building</b></td>
                <td>{{ $info->street }}</td>
              </tr>
              <tr>
                <td><b>University Website</b></td>
                <td>{{ $info->university_website }}</td>
              </tr>
              <tr>
                <td>
                <h3><b>Employees</b></h3>  
                </td>
                <td><td>
              </tr>
              <tr>
                <td><b>Full name</b></td>
                <td>{{ $info->emp_fullname }}</td>
              </tr>
              <tr>
                <td><b>Position</b></td>
                <td>{{ $info->emp_position }}</td>
              </tr>
              <tr>
                <td><b>Email</b></td>
                <td>{{ $info->emp_email }}</td>
              </tr>
              <tr>
                <td><b>Phone number</b></td>
                <td>{{ $info->emp_phone }}</td>
              </tr>
            </table>
            <hr>
            <h3><b>Short Description</b></h3>
            <div class="text-justify">
              {{ $info->short_description }}
            </div>
    </div>
</div>


        <div class="row">
          <div class="col-sm-3">
            
          </div>
          <div class="col-sm-9">
             
            <hr>
          </div>
        </div>
        </div>



<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
  
	  <!-- Modal content-->
	  <div class="modal-content">
		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal">&times;</button>
		  <h4 class="modal-title">Upload Photo</h4>
		</div>
		<div class="modal-body">
		  
			<form action="{{ route('logoUpload') }}" enctype="multipart/form-data" method="POST">
				
				<div class="alert alert-danger print-error-msg" style="display:none">
					<ul></ul>
				</div>
			
			
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<div class="alert alert-warning alert-dismissable fade in">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <p>The downloaded file should not exceed 1024kb</p>
            <p>Supported image formats .jpg | .png</p>
				</div>

				<div class="input-group">
					<label class="input-group-btn">
						<span class="btn btn-primary">
							Browse&hellip; <input type="file" name="image" style="display: none;">
						</span>
					</label>
					<input type="text" class="form-control" readonly>
				</div><br>

				<div class="form-group">
				<button class="btn btn-success upload-image" type="submit">Upload Photo</button>
				<span class="statusSpinner"></span>
				</div>
			
			
			</form>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	  </div>
</div>
</div>

        <script src="{{ URL::to('js/jquery.form.js')}}"></script>


<script type="text/javascript">
  $("body").on("click",".upload-image",function(e){
    $(this).parents("form").ajaxForm(options);
  });


  var options = { 
    complete: function(response) 
    {
    	if($.isEmptyObject(response.responseJSON.error)){
    		$("input[name='title']").val('');
			location.reload();
    	}else{
    		printErrorMsg(response.responseJSON.error);
    	}
    }
  };

  function printErrorMsg (msg) {
	$(".print-error-msg").find("ul").html('');
	$(".print-error-msg").css('display','block');
	$.each( msg, function( key, value ) {
		$(".print-error-msg").find("ul").append('<li>'+value+'</li>');
	});
  }
</script>
@endsection