<?php $__env->startSection('content'); ?>

<style>
  .navbar-default .navbar-nav > li > a {
     color: black !important; 
}
</style>
   <!-- <div class="bg-nav" style="background-color:white; opacity:.7; height:65px;"></div> -->

    <div class="univer-bg-image" >
        <img src="../../../img/live-here.jpg" style="visibility: hidden; max-height:326px; min-height:100px;">
      <?php $iddd=2; ?>
<?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $programs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="detail-desc-blog">
            <h1 class="detail-univer-name detail-univer-bg"><?php echo e($programs->university_name); ?></h1>
          <?php $state_name = DB::table('states')->select('state')->where('id', $programs->id)->first(); ?>
          <h1 class="detail-univer-bg" style="font-size: 10.3px; font-weight: 600; margin-bottom:25px; text-transform:uppercase">I JUNIOR IN <?php echo e($programs->city); ?> - <?php echo e($state_name->state); ?>, USA</h1>
          <?php $statee = DB::table('states')->select('state')->where('id', $programs->id_state)->first(); ?>

            <div class="col-md-4" style="margin-left: -15px;">
            <?php if(Auth::check()): ?>
                <form action="<?php echo e(Route('candidate')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                  <?php $iddd = $programs->id_univer; ?>
                    <input type="hidden" value="<?php echo e($programs->id_univer); ?>" name="id_univer">
                    <input type="hidden" value="<?php echo e($programs->id); ?>" name="id_program">
                    <button type="submit" class="detail-desc-blog-btn" <?php echo e($status == 'false' ? 'disabled' : ''); ?>><?php echo e($statusText); ?></button>
                </form>
            <?php else: ?>
                <button class="detail-desc-blog-btn" data-toggle="modal" data-target="#loginModal" onclick="showsignin()">APPLY NOW</button>
            <?php endif; ?>
            </div>
            <div class=" col-md-5" style="line-height:30px; margin-left:5px;">
                <img src="<?php echo e(URL::to('img/star.png')); ?>" width="25px" alt="">
                <img src="<?php echo e(URL::to('img/star.png')); ?>" width="25px" alt="">
                <img src="<?php echo e(URL::to('img/star.png')); ?>" width="25px" alt="">
                <img src="<?php echo e(URL::to('img/star.png')); ?>" width="25px" alt="">
                <img src="<?php echo e(URL::to('img/star.png')); ?>" width="25px" alt="">
            </div>
        </div>
    </div>
    <nav class="navbar navbar-bg">
        <div class="container">
            <div class="col-md-3"></div>
            <div class="col-md-9 row">
                <ul class="nav navbar-nav" id="navNavbar">
                <li><a onclick="tab('overview')" style="cursor:pointer">OVERVIEW</a></li>
                <li><a onclick="tab('programs')" style="cursor:pointer">PROGRAMMS</a></li>
                <li><a onclick="tab('photos')" style="cursor:pointer">PHOTOS</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="col-md-3" >
            <div class="detail-side-bar">
                <h4 class="UNIOFALABAM">UNIOFALABAM</h4>
                <div class="side-bar-logo text-center">
                    <?php if($programs->logo == null): ?>
                        <img src="<?php echo e(URL::to('img/no-logo.jpg')); ?>" class="img-circle" width="155px">
                    <?php else: ?>
                    <?php 
                  		$id123 = DB::table('programs')->select('id_univer')->where('id', $programs->id)->first();
                  		$idd12 = DB::table('university_datas')->select('user_id')->where('id', $id123->id_univer)->first();
                  

                  		$logo = 'storage/app/UniverDocs/'.$idd12->user_id.'/'.$programs->logo; 
                  	?>
                        <img src="<?php echo e(URL::to($logo)); ?>" class="img-circle" width="155px">
                        <img src="<?php echo e(URL::to('img/verified.png')); ?>" class="img-circle img-secure" width="32px">
                    <?php endif; ?>
                </div>

                <h4 class="SLOGAN-UNIVERSITY">SLOGAN UNIVERSITY</h4>
                <hr>
                <span class="ABOUT-UNiVERSITY">ABOUT UNIVERSITY</span>
                <p><?php echo e($programs->short_description); ?></p>
                <hr>
                <span class="ABOUT-UNiVERSITY">CONTACT DETILES</span>
                <table class="contact-table">
                    <tr>
                        <td class="contact-table-td">PHONE:</td>
                        <td><?php echo e($programs->emp_phone); ?></td>
                    </tr>
                    <tr>
                        <td class="contact-table-td">EMAIL:</td>
                        <td>
                            <?php 
                                $user_email = DB::table('users')->select('email')->where('id',$programs->user_id)->first();
                                echo $user_email->email;
                           ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="contact-table-td">WEB:</td>
                        <td><?php echo e($programs->university_website); ?></td>
                    </tr>
                    <tr>
                        <td class="contact-table-td">ADRESS:</td>
                        <?php $state = DB::table('states')->select('state')->where('id', $programs->id_state)->first() ?>
                        <td>America, <?php echo e($state->state); ?>,
                            <?php echo e($programs->city); ?> <?php echo e($programs->street); ?></td>
                    </tr>
                </table>
                <br><br>
            </div>
        </div>
        <div class="row col-md-9">
            <br>
        <div id="overview" class="hidden">lorem</div>
        <div id="photos" class="hidden">lorem2</div>
        <div id="programs" class="">
            <div id="content">
                <div class="row col-md-3 sidebar sidebar-left">


                    <ul class="nav  nav-stacked">
                    <?php
                        $data1 = $data22 = $data33 = $data44 = $data55 = $data66 = $data77 = $data88 = $data99 = $data110 = $data111 = $data112 = $data113 = '0';
                        foreach ($prog1 as $v) {
  
                            switch ($v->id_degree_level) {
                                case 1:
                                    $data11 = '1';
                                    break;
                                case 2:
                                    $data22 = '1';
                                    break;
                                case 3:
                                    $data33 = '1';
                                    break;
                                case 4:
                                    $data44 = '1';
                                    break;
                                case 5:
                                    $data55 = '1';
                                    break;
                                case 6:
                                    $data66 = '1';
                                    break;
                                case 7:
                                    $data77 = '1';
                                    break;
                                case 8:
                                    $data88 = '1';
                                    break;
                                case 9:
                                    $data99 = '1';
                                    break;
                                case 10:
                                    $data110 = '1';
                                    break;
                                case 11:
                                    $data111 = '1';
                                    break;
                                case 12:
                                    $data112 = '1';
                                    break;
                                case 13:
                                    $data113 = '1';
                                    break;
                            }
                        }
                    ?>
                        <?php if($data11 == '1'): ?>
                        <li><a data-toggle="pill" href="#Associate">Associate</a></li>
                        <?php endif; ?>
                        <?php if($data22 == '1'): ?>
                        <li><a data-toggle="pill" href="#Bachelors">Bachelors</a></li>
                        <?php endif; ?>
                        <?php if($data33 == '1'): ?>
                        <li><a data-toggle="pill" href="#Certificate">Certificate</a></li>
                        <?php endif; ?>
                        <?php if($data44 == '1'): ?>
                        <li><a data-toggle="pill" href="#Doctorate">Doctorate</a></li>
                        <?php endif; ?>
                        <?php if($data55 == '1'): ?>
                        <li><a data-toggle="pill" href="#Masters">Masters / Graduate</a></li>
                        <?php endif; ?>
                        <?php if($data66 == '1'): ?>
                        <li><a data-toggle="pill" href="#Languages">Languages</a></li>
                        <?php endif; ?>
                        <?php if($data77 == '1'): ?>
                        <li><a data-toggle="pill" href="#Double">Double degrees</a></li>
                        <?php endif; ?>
                        <?php if($data88 == '1'): ?>
                        <li><a data-toggle="pill" href="#Official">Official Degrees</a></li>
                        <?php endif; ?>
                        <?php if($data99 == '1'): ?>
                        <li><a data-toggle="pill" href="#Degree">Degree</a></li>
                        <?php endif; ?>
                        <?php if($data110 == '1'): ?>
                        <li><a data-toggle="pill" href="#PhD">PhD</a></li>
                        <?php endif; ?>
                        <?php if($data111 == '1'): ?>
                        <li><a data-toggle="pill" href="#Continuing">Continuing education</a></li>
                        <?php endif; ?>
                        <?php if($data112 == '1'): ?>
                        <li><a data-toggle="pill" href="#Executive">Executive education</a></li>
                        <?php endif; ?>
                        <?php if($data113 == '1'): ?>
                        <li><a data-toggle="pill" href="#Study">Study abroad</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                    <?php if($data11 == '1'): ?>
                        <div id="Associate" class="tab-pane fade in">
                            <table class="table">
                                <tr>
                                    <th>Specialities</th>
                                    <th>Cost of education</th>
                                    <th>Number of seats</th>
                                </tr>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <?php if($data->id_degree_level == 1): ?>              
                                        <tr>
                                            <td><a href="<?php echo e($data->id); ?>"><?php echo e($data->specialities); ?></a></td>
                                            <?php if(empty($data->price)): ?>
                                                <td>Budget</td>
                                            <?php else: ?>
                                                <td><?php echo e($data->price); ?></td>
                                            <?php endif; ?>
                                        
                                            <td><?php echo e($data->seats); ?></td>
                                        </tr>
                                    <?php else: ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>  
                        </div>
                        <?php endif; ?>

                        <?php if($data22 == '1'): ?>
                        <div id="Bachelors" class="tab-pane fade in ">
                        <table class="table">
                            <tr>
                                <th>Specialities</th>
                                <th>Cost of education</th>
                                <th>Number of seats</th>
                            </tr>
                            <?php $__currentLoopData = $data2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                <?php if($data2->id_degree_level == 2): ?>              
                                    <tr>
                                        <td><a href="<?php echo e($data2->id); ?>"><?php echo e($data2->specialities); ?></a></td>
                                        <?php if(empty($data2->price)): ?>
                                            <td>Budget</td>
                                        <?php else: ?>
                                            <td><?php echo e($data2->price); ?></td>
                                        <?php endif; ?>
                                    
                                        <td><?php echo e($data2->seats); ?></td>
                                    </tr>
                                <?php else: ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                        </div>
                        <?php endif; ?>

                        <?php if($data33 == '1'): ?>
                        <div id="Certificate" class="tab-pane fade active">
                            <table class="table">
                                <tr>
                                    <th>Specialities</th>
                                    <th>Cost of education</th>
                                    <th>Number of seats</th>
                                </tr>
                                <?php $__currentLoopData = $data3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <?php if($data3->id_degree_level == 3): ?>              
                                        <tr>
                                            <td><a href="<?php echo e($data3->id); ?>"><?php echo e($data3->specialities); ?></a></td>
                                            <?php if(empty($data3->price)): ?>
                                                <td>Budget</td>
                                            <?php else: ?>
                                                <td><?php echo e($data3->price); ?></td>
                                            <?php endif; ?>
                                        
                                            <td><?php echo e($data3->seats); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                        </div>
                        <?php endif; ?>

                        <?php if($data44 == '1'): ?>
                        <div id="Doctorate" class="tab-pane fade active">
                            <table class="table">
                                <tr>
                                    <th>Specialities</th>
                                    <th>Cost of education</th>
                                    <th>Number of seats</th>
                                </tr>
                                <?php $__currentLoopData = $data4; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data4): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <?php if($data4->id_degree_level == 4): ?>
                                        <tr>
                                            <td><a href="<?php echo e($data4->id); ?>"><?php echo e($data3->specialities); ?></a></td>
                                            <?php if(empty($data4->price)): ?>
                                                <td>Budget</td>
                                            <?php else: ?>
                                                <td><?php echo e($data4->price); ?></td>
                                            <?php endif; ?>
                                        
                                            <td><?php echo e($data4->seats); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                        </div>
                        <?php endif; ?>

                        <?php if($data55 == '1'): ?>
                        <div id="Masters" class="tab-pane fade active">
                            <table class="table">
                                <tr>
                                    <th>Specialities</th>
                                    <th>Cost of education</th>
                                    <th>Number of seats</th>
                                </tr>
                                <?php $__currentLoopData = $data5; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data5): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <?php if($data5->id_degree_level == 5): ?>              
                                        <tr>
                                            <td><a href="<?php echo e($data5->id); ?>"><?php echo e($data5->specialities); ?></a></td>
                                            <?php if(empty($data5->price)): ?>
                                                <td>Budget</td>
                                            <?php else: ?>
                                                <td><?php echo e($data5->price); ?></td>
                                            <?php endif; ?>
                                        
                                            <td><?php echo e($data5->seats); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                        </div>
                        <?php endif; ?>
                        
                        <?php if($data66 == '1'): ?>
                        <div id="Languages" class="tab-pane fade active">
                            <table class="table">
                                <tr>
                                    <th>Specialities</th>
                                    <th>Cost of education</th>
                                    <th>Number of seats</th>
                                </tr>
                                <?php $__currentLoopData = $data6; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data6): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <?php if($data6->id_degree_level == 6): ?>              
                                        <tr>
                                            <td><a href="<?php echo e($data6->id); ?>"><?php echo e($data6->specialities); ?></a></td>
                                            <?php if(empty($data6->price)): ?>
                                                <td>Budget</td>
                                            <?php else: ?>
                                                <td><?php echo e($data6->price); ?></td>
                                            <?php endif; ?>
                                        
                                            <td><?php echo e($data6->seats); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                        </div>
                        <?php endif; ?>

                        <?php if($data77 == '1'): ?>
                        <div id="Double" class="tab-pane fade active">
                            <table class="table">
                                <tr>
                                    <th>Specialities</th>
                                    <th>Cost of education</th>
                                    <th>Number of seats</th>
                                </tr>
                                <?php $__currentLoopData = $data7; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data7): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <?php if($data7->id_degree_level == 7): ?>              
                                        <tr>
                                            <td><a href="<?php echo e($data7->id); ?>"><?php echo e($data7->specialities); ?></a></td>
                                            <?php if(empty($data6->price)): ?>
                                                <td>Budget</td>
                                            <?php else: ?>
                                                <td><?php echo e($data6->price); ?></td>
                                            <?php endif; ?>
                                        
                                            <td><?php echo e($data7->seats); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                        </div>
                        <?php endif; ?>

                        <?php if($data88 == '1'): ?>
                        <div id="Official" class="tab-pane fade active">
                            <table class="table">
                                <tr>
                                    <th>Specialities</th>
                                    <th>Cost of education</th>
                                    <th>Number of seats</th>
                                </tr>
                                <?php $__currentLoopData = $data8; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data8): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <?php if($data8->id_degree_level == 8): ?>              
                                        <tr>
                                            <td><a href="<?php echo e($data8->id); ?>"><?php echo e($data8->specialities); ?></a></td>
                                            <?php if(empty($data8->price)): ?>
                                                <td>Budget</td>
                                            <?php else: ?>
                                                <td><?php echo e($data8->price); ?></td>
                                            <?php endif; ?>
                                        
                                            <td><?php echo e($data8->seats); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                        </div>
                        <?php endif; ?>

                        <?php if($data99 == '1'): ?>
                        <div id="Degree" class="tab-pane fade active">
                            <table class="table">
                                <tr>
                                    <th>Specialities</th>
                                    <th>Cost of education</th>
                                    <th>Number of seats</th>
                                </tr>
                                <?php $__currentLoopData = $data9; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data9): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <?php if($data9->id_degree_level == 9): ?>              
                                        <tr>
                                            <td><a href="<?php echo e($data9->id); ?>"><?php echo e($data9->specialities); ?></a></td>
                                            <?php if(empty($data9->price)): ?>
                                                <td>Budget</td>
                                            <?php else: ?>
                                                <td><?php echo e($data9->price); ?></td>
                                            <?php endif; ?>
                                        
                                            <td><?php echo e($data9->seats); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                        </div>
                        <?php endif; ?>

                        <?php if($data110 == '1'): ?>
                        <div id="PhD" class="tab-pane fade active active">
                            <table class="table">
                                <tr>
                                    <th>Specialities</th>
                                    <th>Cost of education</th>
                                    <th>Number of seats</th>
                                </tr>
                                <?php $__currentLoopData = $data10; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data10): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <?php if($data10->id_degree_level == 10): ?>              
                                        <tr>
                                            <td><a href="<?php echo e($data10->id); ?>"><?php echo e($data10->specialities); ?></a></td>
                                            <?php if(empty($data10->price)): ?>
                                                <td>Budget</td>
                                            <?php else: ?>
                                                <td><?php echo e($data10->price); ?></td>
                                            <?php endif; ?>
                                        
                                            <td><?php echo e($data10->seats); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                        </div>
                        <?php endif; ?>

                        <?php if($data111 == '1'): ?>
                        <div id="Continuing" class="tab-pane fade active">
                            <table class="table">
                                <tr>
                                    <th>Specialities</th>
                                    <th>Cost of education</th>
                                    <th>Number of seats</th>
                                </tr>
                                <?php $__currentLoopData = $data11; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data11): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <?php if($data11->id_degree_level == 11): ?>              
                                        <tr>
                                            <td><a href="<?php echo e($data11->id); ?>"><?php echo e($data11->specialities); ?></a></td>
                                            <?php if(empty($data11->price)): ?>
                                                <td>Budget</td>
                                            <?php else: ?>
                                                <td><?php echo e($data11->price); ?></td>
                                            <?php endif; ?>
                                        
                                            <td><?php echo e($data11->seats); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                        </div>
                        <?php endif; ?>

                        <?php if($data112 == '1'): ?>
                        <div id="Executive" class="tab-pane fade active">
                            <table class="table">
                                <tr>
                                    <th>Specialities</th>
                                    <th>Cost of education</th>
                                    <th>Number of seats</th>
                                </tr>
                                <?php $__currentLoopData = $data12; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data12): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <?php if($data12->id_degree_level == 12): ?>              
                                        <tr>
                                            <td><a href="<?php echo e($data12->id); ?>"><?php echo e($data12->specialities); ?></a></td>
                                            <?php if(empty($data12->price)): ?>
                                                <td>Budget</td>
                                            <?php else: ?>
                                                <td><?php echo e($data12->price); ?></td>
                                            <?php endif; ?>
                                        
                                            <td><?php echo e($data12->seats); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                        </div>
                        <?php endif; ?>

                        <?php if($data113 == '1'): ?>
                        <div id="Study" class="tab-pane fade active">
                            <table class="table">
                                <tr>
                                    <th>Specialities</th>
                                    <th>Cost of education</th>
                                    <th>Number of seats</th>
                                </tr>
                                <?php $__currentLoopData = $data13; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data13): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <?php if($data13->id_degree_level == 13): ?>              
                                        <tr>
                                            <td><a href="<?php echo e($data13->id); ?>"><?php echo e($data13->specialities); ?></a></td>
                                            <?php if(empty($data13->price)): ?>
                                                <td>Budget</td>
                                            <?php else: ?>
                                                <td><?php echo e($data13->price); ?></td>
                                            <?php endif; ?>
                                        
                                            <td><?php echo e($data13->seats); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        </div>
          <!--  <h4>Title name of programm here</h4>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum necessitatibus earum reiciendis eligendi excepturi maiores sapiente, repellat inventore, sunt ea eaque esse autem iure illum laboriosam numquam! Quisquam, velit eum.
        </div>-->
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

<script>
    function tab(tab){
        switch(tab){
            case 'overview':
                $('#overview').removeClass('hidden');
                $('#programs').addClass('hidden');
                $('#photos').addClass('hidden');
            break;
            case 'programs':
                $('#overview').addClass('hidden');
                $('#programs').removeClass('hidden');
                $('#photos').addClass('hidden');
            break;
            case 'photos':
                $('#overview').addClass('hidden');
                $('#programs').addClass('hidden');
                $('#photos').removeClass('hidden');
            break;
        }
    }
</script>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>