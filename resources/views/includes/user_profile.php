@extends('layouts.app')

@section('title', 'Profile info')

@section('content')

<link href="{{URL::to('css/components/css/imgareaselect-default.css')}}" rel="stylesheet" media="screen">
<link rel="stylesheet" href="{{URL::to('css/jquery.awesome-cropper.css')}}">

<div class="menu-bg"></div>

<div class="container" style="margin-top:80px">
	
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic text-center">
					<?php
						$photo = $data->photo;
						$path = \Illuminate\Support\Facades\Auth::user()->id.'/'.$data->photo; 
					?>
						@if($photo != null)
							<img src="{{URL::to('storage/app/documents/'.$path)}}" class="img-thumbnail" alt="">
						@else
							<img src="{{URL::to('img/male-default.jpg')}}" class="img-thumbnail" alt="">
						@endif
				</div>

				<div class="profile-userbuttons">		
				<div class="container-narrow">

</div>	

		<button class="btn btn-success" data-toggle="modal" data-target="#myModal">update photo</button>

				</div>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a href="#">
							<i class="glyphicon glyphicon-home"></i>
							Overview </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-user"></i>
							Account Settings </a>
						</li>
						<li>
							<a href="#" target="_blank">
							<i class="glyphicon glyphicon-ok"></i>
							Tasks </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-flag"></i>
							Help </a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-9" >
            @yield('user_content')
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
		  
			<form action="{{ route('ajaxImageUpload') }}" enctype="multipart/form-data" method="POST">
				
				
				<div class="alert alert-danger print-error-msg" style="display:none">
					<ul></ul>
				</div>
			
			
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<div class="alert alert-warning alert-dismissable fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					Lorem ipsum dolor, sit amet consectetur adipisicing elit. Perspiciatis in saepe suscipit ducimus illo impedit. Doloribus, sit ab illo ratione optio temporibus doloremque deserunt error quaerat, architecto consequuntur, veniam dolorem.
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

@endsection