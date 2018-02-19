<?php $__env->startSection('content'); ?>
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
    <img src="<?php echo e(URL::to('img/univer-header.jpg')); ?>" width="100%" style="visibility: hidden" alt="">
        <div class="container">
                <span class="uniName"><h1><?php echo e($info->university_name); ?></h1></span >  
        </div>   
</div>
<div class="container main-container ">
  <div class="row">
    <div class="col-md-3 col-lg-3 col-sm-6 col-xs-6 text-left">
          <?php
          $logo = $info->logo;
          $path = \Illuminate\Support\Facades\Auth::user()->id.'/'.$info->logo; 
        ?>
        <?php if($logo != null): ?>
            <img src="<?php echo e(URL::to('storage/app/UniverDocs/'.$path)); ?>" class="img-thumbnail"  alt=""><br>
        <?php else: ?>
            <img src="<?php echo e(URL::to('img/no-logo.jpg')); ?>" class="img-thumbnail" alt=""><br>
        <?php endif; ?>

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
              <li ><a href="<?php echo e(Route('university')); ?>">General information</a></li>
              <li><a href="<?php echo e(Route('add_program')); ?>">Add an educational program</a></li>
              <li class="active"><a href="<?php echo e(Route('candidates')); ?>">Candidates</a></li>
              <!-- <li><a href="#">Posts <span class="badge">3</span></a></li> -->
              <li><a href="<?php echo e(Route('university_edit')); ?>">Edit profile</a></li>
              <li><a href="#">Change password</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <div class="col-md-9 col-lg-9 col-sm-6 col-xs-6">
      <!-- <a href="<?php echo e(Route('university_edit')); ?>"<button type="button" class="btn btn-primary" style="margin-top:15px"><span class="fa fa-pencil"></span> EDIT</button></a> -->
    
      <h3><b>Candidates</b></h3> 
            <table class="table">
              <thead>
                  <tr>
                      <th>Full name</th>
                      <th>View</th>
                      <th>Action</th>
                      <th>Time</th>
                  </tr>
              </thead>
              <tbody>
                  <?php $__currentLoopData = $candidates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $candidates): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <?php $name = DB::table('student_datas')->where('id_user', $candidates->id_user)->first(); ?>
                        <td><b><?php echo e($name->name); ?> <?php echo e($name->surname); ?> <?php echo e($name->middlename); ?></b></td>
                        <td>
                            <form action="" method="post">
                                <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="id_app" value="<?php echo e($candidates->id); ?>">
                               <a href=""> <button type="button" class="btn btn-success btn-sm"><span class="fa fa-eye"></span> View Application</button></a>
                            </form>
                        </td>
                        <td>
                            <form action="" style="margin-bottom:5px;" method="post">
                                <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="id_app" value="<?php echo e($candidates->id); ?>">
                               <a href=""> <button type="button" class="btn btn-success btn-sm"><span class="fa fa-check"></span> Adopted</button></a>
                            </form>
                            <form action="" method="post">
                                <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="id_app" value="<?php echo e($candidates->id); ?>">
                               <a href=""> <button type="button" class="btn btn-danger btn-sm"><span class="fa fa-close"></span> Not adopted</button></a>
                            </form>
                        </td>
                        <td><?php echo e($candidates->created_at); ?></td>
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>

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
		  
			<form action="<?php echo e(route('logoUpload')); ?>" enctype="multipart/form-data" method="POST">
				
				<div class="alert alert-danger print-error-msg" style="display:none">
					<ul></ul>
				</div>
			
			
				<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

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

        <script src="<?php echo e(URL::to('js/jquery.form.js')); ?>"></script>


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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>