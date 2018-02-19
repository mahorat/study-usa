<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo $__env->yieldContent('title'); ?></title>
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(URL::to('css/style.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(URL::to('css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::to('css/font-awesome.min.css')); ?>">

    <script src="<?php echo e(URL::to('js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(URL::to('js/bootstrap.min.js')); ?>"></script>

</head>
<body>
<link rel="stylesheet" href="<?php echo e(URL::to('css/application.css')); ?>">

  <div class="menu-bg"></div>
<div class="scroll-class"></div>
<div class="navbar-wrapper">
        <div class="container-fluid">
            <nav class="navbar navbar-fixed-top" id="transparent">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"
                            aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                        <a class="navbar-brand" href="<?php echo e(Route('welcome')); ?>">Logo</a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav pull-nav">
                            <li class="active"><a href="#" class="">HOME</a></li>
                            <li><a href="#">ABOUT US</a></li>
                            <li><a href="#">PROGRAMS</a></li>
                            <li><a href="#">CONTACTS</a></li>
                            <?php
                                if (Auth::check())
                                {
                                ?>
                                 <li><a href="<?php echo e(Route('logout')); ?>">LOGOUT</a></li>
                                <?php 
                                }else{
                                    echo '<li><a href="#" data-toggle="modal" data-target="#loginModal">LOGIN</a></li>
                                    <li><a href="#" data-toggle="modal" data-target="#registerModal">SIGNUP</a></li>';
                                }
                                
                            ?>
                            <li class="divider-vertical"></li>
                            <?php if(Auth::check()): ?>
                                <?php if(Auth::user()->id_schools_name==2): ?>
                                    <li><a href="<?php echo e(Route('university')); ?>"><span class="login-btn">Login page</span></a></li>
                                <?php else: ?>
                                    <?php $info = DB::table('student_datas')->where('id_user', Auth::user()->id)->first(); ?>
                                    <?php if(count($info) > 0): ?>
                                        <li><a href="<?php echo e(Route('profile-info')); ?>"><span class="login-btn">Login page</span></a></li>                                        
                                    <?php else: ?>
                                        <li><a href="<?php echo e(Route('profile-filling')); ?>"><span class="login-btn">Login page</span></a></li>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php else: ?>
                                <li><a href="#"><span class="login-btn" data-toggle="modal" data-target="#loginModal">Login page</span></a></li>
                            <?php endif; ?>
                            <li class="dropdown text-justify"><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true"
                                    aria-expanded="false"><img src="<?php echo e(URL::to('img/usa.png')); ?>" alt="" class="img img-responsive lang pull-left">
                                    </a>
                                <ul class="dropdown-menu langd">
                                    <li><a href="#"><img src="<?php echo e(URL::to('img/esp.png')); ?>" alt="" class="img img-responsive lang pull-left"></a></li>
                                    <li><a href="#"><img src="<?php echo e(URL::to('img/rus.png')); ?>" alt="" class="img img-responsive lang pull-left"></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>


<br><br><br>

<form id="msform" action="<?php echo e(Route('candidate_save')); ?>" enctype="multipart/form-data" method="post" novalidate>
        <?php echo e(csrf_field()); ?>


    <div class="container">

            <!-- progressbar -->
            <ul id="progressbar">
                <li class="active">Education Information</li>
                <li>Sponsor Information</li>
                <li>Parent Information</li>
                <li>Documents Upload Section</li>
                <li>Account Setup</li>
            </ul>
            <!-- fieldsets -->
    <?php $__currentLoopData = $student_datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <fieldset>
                <h2 class="fs-title">Education imformation</h2>
                <div class="form-group">
                    <div class="form-inline">
                        <div class="row">
                            <div class="col-md-6 <?php echo e($errors->has('name_of_the_school') ? 'has-error' : ''); ?>">
                                <label for="s_u">School/University name<span class="starrr"> *</span></label>
                                <input type="text" id="s_u" class="form-control" name="name_of_the_school" placeholder="School name" value="<?php echo e($student_data->name_of_the_school); ?>">
                                <span class="text-danger"><?php echo e($errors->first('name_of_the_school')); ?></span>
                            </div>
                            <div class="col-md-6 <?php echo e($errors->has('school_street') ? 'has-error' : ''); ?>">
                                <label for="school">School's address<span class="starrr"> *</span></label>
                                <input type="text" id="school" class="form-control" name="school_street" placeholder="Address line" value="<?php echo e($student_data->school_street); ?>">
                                <span class="text-danger"><?php echo e($errors->first('school_street')); ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 <?php echo e($errors->has('city') ? 'has-error' : ''); ?>">
                                <input type="text" class="form-control" placeholder="City" name="city" value="<?php echo e($student_data->city); ?>">
                                <span class="text-danger"><?php echo e($errors->first('city')); ?></span>
                            </div>
                            <div class="col-md-6 <?php echo e($errors->has('school_region') ? 'has-error' : ''); ?>">
                                <input type="text" class="form-control" placeholder="State / Province / Region" name="school_region" value="<?php echo e($student_data->region); ?>">
                                <span class="text-danger"><?php echo e($errors->first('school_region')); ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 <?php echo e($errors->has('school_zip') ? 'has-error' : ''); ?>">
                                <input type="text" class="form-control" placeholder="Postal / Zip Code" name="school_zip" value="<?php echo e(old('school_zip')); ?>">
                                <span class="text-danger"><?php echo e($errors->first('school_zip')); ?></span>
                            </div>
                            <div class="col-md-6">
                                <?php $place_of_birth = $student_data->school_location; ?>
                                <select class="form-control">
                                <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $countr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($countr->id == $place_of_birth): ?>
                                        <option value="<?php echo e($countr->id); ?>" selected><?php echo e($countr->country_name); ?></option>
                                    <?php else: ?>
                                        <option value="<?php echo e($countr->id); ?>"><?php echo e($countr->country_name); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 <?php echo e($errors->has('school_phone') ? 'has-error' : ''); ?>">
                                <label for="phone">Phone<span class="starrr"> *</span></label>
                                <input type="text" id="phone" class="form-control" name="school_phone" value="<?php echo e(old('school_phone')); ?>" required>
                                <span class="text-danger"><?php echo e($errors->first('school_phone')); ?></span>
                            </div>
                           
                            <div class="col-md-6">
                                <label for="contact">Other contact</label>
                                <input type="text" id="contact" class="form-control" name="other_contact" value="<?php echo e(old('other_contact')); ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 <?php echo e($errors->has('year_of_starting') ? 'has-error' : ''); ?>">
                                <label for="year">What year are you in<span class="starrr"> *</span></label>
                                <input id="year" class="form-control" type="text" name="year_of_starting" value="<?php echo e($student_data->year_of_starting); ?>">
                                <span class="text-danger"><?php echo e($errors->first('year_of_starting')); ?></span>
                            </div>
                           
                            <div class="col-md-6 <?php echo e($errors->has('year_of_ending') ? 'has-error' : ''); ?>">
                                <label for="stud">What are you stading<span class="starrr"> *</span></label>
                                <input id="stud" class="form-control" type="number" name="year_of_ending" value="<?php echo e($student_data->year_of_ending); ?>">
                                <span class="text-danger"><?php echo e($errors->first('year_of_ending')); ?></span>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-md-6 <?php echo e($errors->has('level_of_english') ? 'has-error' : ''); ?>">
                                <label for="lavel">Lavel of English<span class="starrr"> *</span></label>
                                <input id="lavel" class="form-control" type="text" name="level_of_english" value="<?php echo e($student_data->level_of_english); ?>">
                                <span class="text-danger"><?php echo e($errors->first('level_of_english')); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="button" name="next" class="next action-button" value="Next"/>
            </fieldset>

            <fieldset>
                <h2 class="fs-title">Sponsor Information</h2>
                <div class="form-group">
                    <div class="form-inline">
                    
                        <div class="row">
                           <div class="col-md-4">
                               <label for="sponsor">Who is your sponsor?<span class="starrr"> *</span></label>
                               <select id="sponsor" class="form-control" name="sponsor">
                                   <option disabled selected>Please Select</option>
                                   <option value="Self">Self</option>
                                   <option value="Parents">Parents</option>
                                   <option value="Relatives">Relatives</option>
                                   <option value="Guardians">Guardians</option>
                                   <option value="Organiztion/Company">Organiztion/Company</option>
                                   <option value="other">other</option>
                               </select>
                           </div>

                        </div>
                    </div>
                    <label for="exampleInputName1">Sponsor's full Name<span class="starrr"> *</span></label>
                    <div class="form-inline">
                        <div class="row">
                            <div class="col-md-4 <?php echo e($errors->has('sponsor_name') ? 'has-error' : ''); ?>">
                                <input type="text" class="form-control" id="exampleInputName1" name="sponsor_name" placeholder="First" value="<?php echo e(old('sponsor_name')); ?>">
                                <span class="text-danger"><?php echo e($errors->first('sponsor_name')); ?></span>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" placeholder="Middle" name="sponsor_middlename" value="<?php echo e(old('sponsor_middlename')); ?>">
                            </div>
                            <div class="col-md-4 <?php echo e($errors->has('sponsor_lastname') ? 'has-error' : ''); ?>">
                                <input type="text" class="form-control" placeholder="Last" name="sponsor_lastname" value="<?php echo e(old('sponsor_lastname')); ?>">
                                <span class="text-danger"><?php echo e($errors->first('sponsor_lastname')); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-inline">
                        <div class="row">
                            <div class="col-md-6 <?php echo e($errors->has('sponsor_email') ? 'has-error' : ''); ?>">
                                <label for="mail">Sponsor Email<span class="starrr"> *</span></label>
                                <input type="email" class="form-control" name="sponsor_email" id="mail" value="<?php echo e(old('sponsor_email')); ?>">
                                <span class="text-danger"><?php echo e($errors->first('sponsor_email')); ?></span>
                            </div>
                            <div class="col-md-6 <?php echo e($errors->has('sponsor_phone') ? 'has-error' : ''); ?>">
                                <label for="phone">Phone<span class="starrr"> *</span></label>
                                <input type="email" class="form-control" name="sponsor_phone" id="phone" value="<?php echo e(old('sponsor_phone')); ?>">
                                <span class="text-danger"><?php echo e($errors->first('sponsor_phone')); ?></span>
                            </div>
                        </div>

                    </div>
                    <div class="form-inline">
                        <div class="row">
                                <label for="home" class="col-md-12">Sponsors's address<span class="starrr"> *</span></label>
                            <div class="col-md-6 <?php echo e($errors->has('sponsor_address') ? 'has-error' : ''); ?>" >
                                <input type="text" class="form-control" placeholder="Street Address" name="sponsor_address" value="<?php echo e(old('sponsor_address')); ?>">
                                <span class="text-danger"><?php echo e($errors->first('sponsor_address')); ?></span>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Address line 2" name="sponsor_address2" value="<?php echo e(old('sponsor_address2')); ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 <?php echo e($errors->has('sponsor_city') ? 'has-error' : ''); ?>">
                                <input type="text" class="form-control" placeholder="City" name="sponsor_city" value="<?php echo e(old('sponsor_city')); ?>">
                                <span class="text-danger"><?php echo e($errors->first('sponsor_city')); ?></span>
                            </div>
                            <div class="col-md-6 <?php echo e($errors->has('sponsor_region') ? 'has-error' : ''); ?>">
                                <input type="text" class="form-control" placeholder="State / Province / Region" name="sponsor_region" value="<?php echo e(old('sponsor_region')); ?>">
                                <span class="text-danger"><?php echo e($errors->first('sponsor_region')); ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 <?php echo e($errors->has('sponsor_zip') ? 'has-error' : ''); ?>">
                                <input type="text" class="form-control" placeholder="Postal / Zip Code" name="sponsor_zip" value="<?php echo e(old('sponsor_zip')); ?>">
                                <span class="text-danger"><?php echo e($errors->first('sponsor_zip')); ?></span>
                            </div>
                            <div class="col-md-6">
                                <select name="sponsor_country" class="form-control" id="">
                                    <option disabled selected>Country / Region</option>
                                    <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $countr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($countr->id); ?>"><?php echo e($countr->country_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="button" name="next" class="next action-button" value="Next"/>
            </fieldset>

            <fieldset>
                <h2 class="fs-title">Parent Information</h2>
                <div class="form-group">
                    <div class="form-inline">
                        <div class="row">
                            <div class="col-md-6 <?php echo e($errors->has('father_name') ? 'has-error' : ''); ?>">
                                <label for="parent">Father's Full name<span class="starrr"> *</span></label>
                                <input class="form-control" id="parent" placeholder="Please write your parent's occupation" name="father_name" value="<?php echo e(old('father_name')); ?>">
                                <span class="text-danger"><?php echo e($errors->first('father_name')); ?></span>
                            </div>
                            <div class="col-md-6 <?php echo e($errors->has('father_occupation') ? 'has-error' : ''); ?>">
                                <label for="parent">Occupation<span class="starrr"> *</span> </label>
                                <input class="form-control" id="parent" placeholder="Please write your parent's occupation" name="father_occupation" value="<?php echo e(old('father_occupation')); ?>">
                                <span class="text-danger"><?php echo e($errors->first('father_occupation')); ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 <?php echo e($errors->has('mother_name') ? 'has-error' : ''); ?>">
                                <label for="parent">Mather's Full name<span class="starrr"> *</span></label>
                                <input class="form-control" id="parent" placeholder="Please write your parent's occupation" name="mother_name" value="<?php echo e(old('mother_name')); ?>">
                                <span class="text-danger"><?php echo e($errors->first('mother_name')); ?></span>
                            </div>
                            <div class="col-md-6 <?php echo e($errors->has('mather_occupation') ? 'has-error' : ''); ?>">
                                <label for="parent">Occupation<span class="starrr"> *</span></label>
                                <input class="form-control" id="parent" placeholder="Please write your parent's occupation" name="mather_occupation" value="<?php echo e(old('mather_occupation')); ?>">
                                <span class="text-danger"><?php echo e($errors->first('mather_occupation')); ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="indicate">Please indicate your family's gross annual income</label>
                                <select class="form-control" name="indicate_your_family">
                                    <option selected disabled>Please select<span class="starrr"> *</span></option>
                                    <option value="Less then $20,000">Less then $20,000</option>
                                    <option value="$20,000 - $39,999">$20,000 - $39,999</option>
                                    <option value="$40,000 - $59,999">$40,000 - $59,999</option>
                                    <option value="$60,000 - $79,999">$60,000 - $79,999</option>
                                    <option value="$80,000 - more">$80,000 - more</oprion>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 ">
                                <input type="checkbox" class="chek" name="both_of_my_parents_live_here[]" value="Both of my parents live here">Both of my parents live here
                            </div>
                            <div class="col-md-4"> <input type="checkbox" name="both_of_my_parents_live_here[]" class="chek" value="My father lives here">My father lives here</div>
                            <div class="col-md-4"> <input type="checkbox" class="chek" name="both_of_my_parents_live_here[]" value="My mother lives here">My mother lives here</div>
                        </div>
                        <label for="home">Address<span class="starrr"> *</span></label>
                        <div class="row">
                            <div class="col-md-6 <?php echo e($errors->has('parent_address') ? 'has-error' : ''); ?>">
                                <input type="text" class="form-control" placeholder="Street Address" name="parent_address" value="<?php echo e(old('parent_address')); ?>">
                                <span class="text-danger"><?php echo e($errors->first('parent_address')); ?></span>
                            </div>
                            <div class="col-md-6 ">
                                <input type="text" class="form-control" name="parent_address2" placeholder="Address line 2">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 <?php echo e($errors->has('parent_city') ? 'has-error' : ''); ?>">
                                <input type="text" class="form-control" placeholder="City" name="parent_city" value="<?php echo e(old('parent_city')); ?>">
                                <span class="text-danger"><?php echo e($errors->first('parent_city')); ?></span>
                            </div>
                            <div class="col-md-6 <?php echo e($errors->has('parent_region') ? 'has-error' : ''); ?>">
                                <input type="text" class="form-control" placeholder="State / Province / Region" name="parent_region" value="<?php echo e(old('parent_region')); ?>">
                                <span class="text-danger"><?php echo e($errors->first('parent_region')); ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 <?php echo e($errors->has('parent_zip') ? 'has-error' : ''); ?>">
                                <input type="text" class="form-control" placeholder="Postal / Zip Code" name="parent_zip" value="<?php echo e(old('parent_zip')); ?>">
                                <span class="text-danger"><?php echo e($errors->first('parent_zip')); ?></span>
                            </div>
                            <div class="col-md-6">
                                <select class="form-control" name="parent_country">
                                <option disabled selected>Please select</option>
                                <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $countr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($countr->id); ?>"><?php echo e($countr->country_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="button" name="next" class="next action-button" value="Next"/>
            </fieldset>
            <fieldset>
                <h2 class="fs-title">Documents Upload Section</h2>
                <div class="form-group">
                    <div class="form-inline">
                        <div class="row part4">
                            <div class="col-md-12">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Document</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Passport</td>
                                                <td>
                                                    <div class="col-md-3 row">
                                                        <label class="btn-bs-file" style="margin-top: 0px">
                                                        <span class="fa fa-file">
                                                            <input type="file" name="file" id="file1">
                                                        </span>
                                                    </label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div id="progressBar" class="progressBar1">

                                                        </div>
                                                    </div>
                                                    <div id="statusUpload1" class="col-md-1 row">
                                                            
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Transcript </td>
                                                <td>
                                                    <div class="col-md-3 row">
                                                        <label class="btn-bs-file" style="margin-top: 0px">
                                                        <span class="fa fa-file">
                                                            <input type="file" name="file" id="file2">
                                                        </span>
                                                    </label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div id="progressBar" class="progressBar2">

                                                        </div>
                                                    </div>
                                                    <div id="statusUpload2" class="col-md-1 row">
                                                            
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Diploma</td>
                                                <td>
                                                    <div class="col-md-3 row">
                                                        <label class="btn-bs-file" style="margin-top: 0px">
                                                        <span class="fa fa-file">
                                                            <input type="file" name="file" id="file3">
                                                        </span>
                                                    </label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div id="progressBar" class="progressBar3">

                                                        </div>
                                                    </div>
                                                    <div id="statusUpload3" class="col-md-1 row">
                                                            
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Test score</td>
                                                <td>
                                                    <div class="col-md-3 row">
                                                        <label class="btn-bs-file" style="margin-top: 0px">
                                                        <span class="fa fa-file">
                                                            <input type="file" name="file" id="file4">
                                                        </span>
                                                    </label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div id="progressBar" class="progressBar4">

                                                        </div>
                                                    </div>
                                                    <div id="statusUpload4" class="col-md-1 row">
                                                            
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Other document</td>
                                                <td>
                                                    <div class="col-md-3 row">
                                                        <label class="btn-bs-file" style="margin-top: 0px">
                                                        <span class="fa fa-file">
                                                            <input type="file" name="file" id="file5">
                                                        </span>
                                                    </label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div id="progressBar" class="progressBar5">

                                                        </div>
                                                    </div>
                                                    <div id="statusUpload5" class="col-md-1 row">
                                                            
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Other document</td>
                                                <td>
                                                    <div class="col-md-3 row">
                                                        <label class="btn-bs-file" style="margin-top: 0px">
                                                        <span class="fa fa-file">
                                                            <input type="file" name="file" id="file6">
                                                        </span>
                                                    </label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div id="progressBar" class="progressBar6">

                                                        </div>
                                                    </div>
                                                    <div id="statusUpload6" class="col-md-1 row">
                                                            
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                            </div>
                        
                        </div>
                    </div>
                </div>
                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="button" name="next" class="next action-button" value="Next"/>
            </fieldset>
            <fieldset>
            <h2 class="fs-title">Additional Information</h2>
                <div class="form-group">
                    <div class="form-inline">
                        <div class="row">
                            <div class="col-md-6">
                                <label>How did you find us?</label><br>
                                <textarea name="how_did_you_find_us" class="form-control" id="" cols="30" rows="10"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label>Comments</label><br>
                                <textarea name="comment" class="form-control" id="" cols="30" rows="10"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label>Who colmplated this application?</label><br>
                                <textarea name="who_complated_this_app" class="form-control" id="" cols="30" rows="10"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label>Full name of the person</label><br>
                                <textarea name="full_name_of_the_person" class="form-control" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <p>Statement of Certification</p>
                <p>Please sign, indicate date and submit your application</p>
                <p class="last"><input type="checkbox" class="chek">I, herby certify that the above information provided is true and
                    correct into the best of my knowledge and belief</p>
                <input type="submit" id="submit" class="submit action-button" value="Submit"/>
            </fieldset>
    
    </div>
    <br>
</form>
<script src="<?php echo e(URL::to('js/fileUpload.js')); ?>"></script>
<script src="<?php echo e(URL::to('js/fileUploader.js')); ?>"></script>
<script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>
<script src="<?php echo e(URL::to('js/application.js')); ?>"></script>

<script>
        function processSelectedFiles(fileInput) {
            var files = fileInput.files;

            for (var i = 0; i < files.length; i++) {
                alert("Filename " + files[i].name);
            }
        }
    </script>


<script>
        var secondaryNav = $('.scroll-class'),
            secondaryNavTopPosition = secondaryNav.offset().top;

        $(window).on('scroll', function () {

            if ($(window).scrollTop() > secondaryNavTopPosition) {
                $(".navbar-fixed-top").addClass('nav-scroll');
            } else {
                $(".navbar-fixed-top").removeClass('nav-scroll');
            }
        });
        initParalaxBg();
    </script>
<br><br>
</body>
</html>
