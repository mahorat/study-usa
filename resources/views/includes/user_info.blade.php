@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="../css/main.css">

<div class="menu-bg"></div>
<header>
    <!--
<div class="profile-menu">
    <div class="container-fluid">
        <nav class="navbar navbar-default user">
            <div class="navbar-header">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#dropdownmenu">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="index.html"  class="navbar-brand">logo-brand</a>
            </div>
            <div class="collapse navbar-collapse navbar-right " id="dropdownmenu">
                <ul class="nav navbar-nav">
                    <li><a href="#">contact host</a></li>
                    <li><a href="#">Full name</a></li>
                    <li><a href="#">help</a></li>
                    <li><a href="#">icon</a></li>
                    
                </ul>

            </div>
        </nav>
    </div>
</div>
<div class="secondary">
    <div class="container-fluid">
        <nav class="navbar navbar-default navbar-secondary">
            <div class="collapse navbar-collapse navbar-right " id="dropdownmenu">
                <ul class="nav navbar-nav">
                    <li><a href="#">dashboard</a></li>
                    <li><a href="#">inbox</a></li>
                    <li><a href="#">find guest</a></li>
                    <li><a href="#">booking</a></li>
                    <li><a href="#">calndar</a></li>
                    <li><a href="#">my listing</a></li>
                </ul>

            </div>
        </nav>
    </div>
</div>

<section class="first">
    <div class="container">
    <div class="row">
        <div class="col-md-3 info-web col-sm-12">
            <h4>I junior</h3>
            <p class="info">missing Information</p>
        </div>
        <div class="col-md-8 col-sm-12">
        <ul class="links">
          <li><i class="fa fa-home  icon-links"></i><span class="step-name"><a href="#">Homeaaa</a></span></li>
            <li><i class="fa fa-home  icon-links"></i><span class="step-name"><a href="#">Home</a></span></li>
            <li><i class="fa fa-home  icon-links"></i><span class="step-name"><a href="#">Home</a></span></li>
            <li><i class="fa fa-home icon-links"></i><span class="step-name"><a href="#">Home</a></span></li>
        </ul>
        </div>
    </div>
        
    </div>
</section>

<Br>
<section class="two">
    <div class="container-fluid">
        <p>Your profile missing information</p>
    </div>
</section>
-->
<section class="three" style="margin-top:50px;">
    <div class="container">
    <div class="row profile-info">
        <div class="col-md-8">
            <h4>{{$data->name}} {{$data->surname}} {{$data->middlename}}</h4>
            <p>{{$id_stud}}</p>
        </div>
        <div class="col-md-4 text-right" style="margin-top: 25px;">
          
            <a href="{{ Route('profile-edit') }}" class="btn btn-primary"><span class="fa fa-pencil"></span> Edit</a>

            <!-- Single button -->
            <div class="btn-group cart-profile">
                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-top:0px !important">
                <span class="fa fa-shopping-cart fa-lg"></span> <span class="badge">{{count($get_fav)}}</span> <span class="caret"></span>
                </button>
                <ul class="dropdown-menu list-group cart-group" id="cartt">
                    @foreach($get_fav as $get_fav)
                        <li class="list-group-item">
                            <div class="row">
                            <a href="program_detail/{{$get_fav->prog_id}}">
                                <div class="col-md-10">
                                    {{$get_fav->specialities}}<br>
                                    {{$get_fav->university_name}}
                                </div>
                            </a>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="btn btn-danger btn-xs" 
                                    onclick="delProgram({{$get_fav->prog_id}})">
                                        <span class="fa fa-remove"></span>
                                    </button>
                                </div>                
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    
        <div class="col-md-3 col-sm-12 col-xs-12" style="margin-top: -20px;">
            <section id="profile-sidebar">
                <div class="junior-section profile">
                    <section class="box-container">
                        <!-- <header class="edit-profile">
                           <div class="row">
                               <div class=" col-md-9 col-sm-9 col-xs-12">

                                </div>
                                <div class=" col-md-3 col-sm-3 col-xs-12">
                                   <span class="edit-section">
                                       <a href="{{ Route('profile-edit') }}" class="btn btn-primary pull-right"><span class="fa fa-pencil"></span> Edit</a>
                                   </span>
                               </div>
                           </div>

                        </header> -->
                        <div class="box-container-body">
                            <div class="row profile-body text-center">
                                <div class="col-md-12 col-xs-12 ">

                                
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
                                  
                            </div>
                            <div class="row up-photo">
                                <div class="col-md-12 col-sm-12 col-xs-12 text-center"> 
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Update photo</button>
                                </div>
                              
                            </div>
                            <br>
                        <div class="row user-menu-smm">
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li class="{{ !empty($overview) ? 'active' : '' }}">
                            <a href="{{Route('profile-info')}}">
                            <i class="glyphicon glyphicon-home"></i>
                            Overview </a>
                        </li>
                        <li class="{{ !empty($zayavka) ? 'active' : '' }}">
                            <a href="{{Route('application_info')}}">
                            <i class="glyphicon glyphicon-user"></i>
                             Application </a>
                        </li>
                        <!-- <li>
                            <a href="#">
                            <i class="glyphicon glyphicon-ok"></i>
                            Tasks </a>
                        </li>
                        <li>
                            <a href="#">
                            <i class="glyphicon glyphicon-flag"></i>
                            Help </a>
                        </li> -->
                    </ul>
                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </section>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12 col-xs-12 col-sm-12 tab-content">
                   @yield('user_content')
                </div>
                <!-- <div class="col-md-2 col-sm-hidden user-menu">
                    <div class="profile-usermenu">
                    <ul class="nav">
                        <li class="{{ !empty($overview) ? 'active' : '' }}">
                            <a href="{{Route('profile-info')}}">
                            <i class="glyphicon glyphicon-home"></i>
                            Overview </a>
                        </li>
                        <li class="{{ !empty($zayavka) ? 'active' : '' }}">
                            <a href="">
                            <i class="glyphicon glyphicon-user"></i>
                             Application </a>
                        </li>
                        <li>
                            <a href="#">
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
                </div>        -->
            </div>
        </div>

    </div>
</section>

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
		  
			<form action="{{ Route('ajaxImageUpload') }}" enctype="multipart/form-data" method="POST">
				
				
				<div class="alert alert-danger print-error-msg" style="display:none">
					<ul></ul>
				</div>
			
			
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<div class="alert alert-warning alert-dismissable fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <p>The downloaded file should not exceed 1024kb</p>
                        <p>Supported image formats .jpg | .png | .gif</p>
                        <p>The best image size is 500x500</p>
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



</header>

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
  
  function printFav(data){
    console.log(data);
    var txt = '';

    for(let fav of data){
        txt+=`
            <li class="list-group-item">
                <div class="row">
                <a href="program_detail/${fav.prog_id}">
                    <div class="col-md-10">
                        ${fav.specialities}<br>
                        ${fav.university_name}
                    </div>
                </a>
                    <div class="col-md-2 text-right">
                        <button type="button" class="btn btn-danger btn-xs" onclick='delProgram(${fav.id})'>
                            <span class="fa fa-remove"></span>
                        </button>
                    </div>                
                </div>
            </li>
        `
    }
        if(data.length > 0){
            $('#cartt').html(txt);
            $('.badge').text(data.length);
        }else{
            $('#cartt').html('');
            $('.badge').text(0);
        }
}

function delProgram(id){
var _token = $("input[name='_token']").val();

    $.ajax({
        url: "/delFavorite",
        type:'POST',
        data: {
            _token:_token,
            id: id,
        },
        success: function(data) {
            printFav(data);
        }
    });
}
</script>

@endsection