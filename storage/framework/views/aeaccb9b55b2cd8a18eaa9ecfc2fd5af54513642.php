;

<?php $__env->startSection('title', 'Add a educational program'); ?>

<?php $__env->startSection('content'); ?>
<div class="menu-bg"></div>
<br><br>

    <div class="container">
            <h1>Add a educational program</h1>
    <div class="col-md-5 ">
        <form action="<?php echo e(Route('addProgram')); ?>" method="Post" id="myForm">
            <?php echo e(CSRF_Field()); ?>

            <div class="form-group" id="levelAfter">
                <label for="">Degree Level</label>
                <select name="level" id="levels" onchange="levell()" class="form-control">
                <?php $__currentLoopData = $DegreeLevel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Degree): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($Degree->id); ?>"><?php echo e($Degree->degreeLevel); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group" id="filedOfStudy">
                <label for="">Field of Study</label>
                <select name="specialities" id="" class="form-control">
                <?php $__currentLoopData = $speciality; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($spec->id); ?>"><?php echo e($spec->specialities); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
          <!--  <div class="form-group">
                <label for=""></label>
                <select name="" id="" class="form-control">
                    <option value=""></option>
                </select>
            </div>-->
            <div class="form-group">
                <label for="budget">Budget </label>
                <div class="rdio rdio-default">
                    <input type="radio" name="budget" onclick="disab()" id="radioDefault" value="1">
                    <label for="radioDefault">Yes</label>
                    <input type="radio" name="budget" onclick="enab()" id="radioDefault2" value="0" checked="checked">
                    <label for="radioDefault2">No</label>
                </div>
            </div>
            <div class="form-group" >
                <label for="education_price">Cost of education</label>
                <div class="col-md-12 input-group">
                <input type="number" min="0" name="education_price" id="inputPrice" class="form-control" required>
                <div class="input-group-addon"> USD for a year</div>
                </div>
            </div>
            <div class="form-group">
                <label for="duration">Duration</label>
                <div class="col-md-12 input-group">
                <input type="number" min="0" name="duration" class="form-control" value="" required >
                <div class="input-group-addon"> months</div>
                </div>
            </div>
            <div class="form-group">
                <label for="place">Number of seats</label>
                <input type="number" min="0" name="place" class="form-control" value="" required >
            </div>

            <div class="form-group">
                <label for="place">Year</label>
                <input type="number" min="2016" name="year" class="form-control" value="" required >
            </div>
            <button type="submit" class="btn btn-success"><span class="fa fa-plus"></span> Add program</button>
            <button type="button" class="btn btn-danger" onclick="document.getElementById('myForm').reset();"><span class="fa fa-eraser"></span> Clear</button>

        </form>
        
    </div>
 
       <div class="col-md-12" style="margin-top:50px">
            <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'Associate')" id="defaultOpen">Associate / Community College</button>
            <button class="tablinks" onclick="openCity(event, 'Bachelors')">Bachelors / Undergraduate</button>
            <button class="tablinks" onclick="openCity(event, 'Certificate')">Certificate</button>
            <button class="tablinks" onclick="openCity(event, 'Doctorate')">Doctorate</button>
            <button class="tablinks" onclick="openCity(event, 'Masters')">Masters / Graduate</button>
            <button class="tablinks" onclick="openCity(event, 'Languages')">Languages</button>
            <button class="tablinks" onclick="openCity(event, 'Double')">Double degrees</button>
            <button class="tablinks" onclick="openCity(event, 'Official')">Official Degrees</button>
            <button class="tablinks" onclick="openCity(event, 'Degree')">Degree</button>
            <button class="tablinks" onclick="openCity(event, 'PhD')">PhD</button>
            <button class="tablinks" onclick="openCity(event, 'Continuing')">Continuing education</button>
            <button class="tablinks" onclick="openCity(event, 'Executive')">Executive education</button>
            <button class="tablinks" onclick="openCity(event, 'Study')">Study abroad</button>
            </div>
            
            <div id="Associate" class="tabcontent">
                <table class="table">
                    <tr>
                        <th>Specialities</th>
                        <th>Cost of education</th>
                        <th>Duration</th>
                        <th>Number of seats</th>
                        <th>Action</th>
                    </tr>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                        <?php if($data->id_degree_level == 1): ?>              
                            <tr>
                                <td><?php echo e($data->specialities); ?></td>
                                <?php if(empty($data->price)): ?>
                                    <td>Budget</td>
                                <?php else: ?>
                                    <td><?php echo e($data->price); ?></td>
                                <?php endif; ?>
                            
                                <td><?php echo e($data->duration); ?></td>
                                <td><?php echo e($data->seats); ?></td>
                                <td>
                                    <form action="<?php echo e(Route('editProgram')); ?>" method="Post">
                                        <?php echo e(csrf_field()); ?>

                                        <input type="hidden" name="id" value="<?php echo e($data->id); ?>">
                                        <input type="hidden" name="token" value="<?php echo e(bcrypt($data->id)); ?>">
                                        <button type="submit" class="btn btn-success btn-sm"><span class="fa fa-pencil"></span></button>
                                        <button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></button>                            
                                    </form>
                                </td>
                            </tr>
                        <?php else: ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>
            
            <div id="Bachelors" class="tabcontent">
                    <table class="table">
                    <tr>
                        <th>Specialities</th>
                        <th>Cost of education</th>
                        <th>Duration</th>
                        <th>Number of seats</th>
                        <th>Action</th>
                    </tr>
                    <?php $__currentLoopData = $data2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                        <?php if($data2->id_degree_level == 2): ?>              
                            <tr>
                                <td><?php echo e($data2->specialities); ?></td>
                                <?php if(empty($data2->price)): ?>
                                    <td>Budget</td>
                                <?php else: ?>
                                    <td><?php echo e($data2->price); ?></td>
                                <?php endif; ?>
                            
                                <td><?php echo e($data2->duration); ?></td>
                                <td><?php echo e($data2->seats); ?></td>
                                <td>
                                    <form action="<?php echo e(Route('editProgram')); ?>" method="Post">
                                        <?php echo e(csrf_field()); ?>

                                        <input type="hidden" name="id" value="<?php echo e($data2->id); ?>">
                                        <input type="hidden" name="token" value="<?php echo e(bcrypt($data->id)); ?>">
                                        <button type="submit" class="btn btn-success btn-sm"><span class="fa fa-pencil"></span></button>
                                        <button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></button>                            
                                    </form>
                                </td>
                            </tr>
                        <?php else: ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>
            
            <div id="Certificate" class="tabcontent">
                    <table class="table">
                            <tr>
                                <th>Specialities</th>
                                <th>Cost of education</th>
                                <th>Duration</th>
                                <th>Number of seats</th>
                                <th>Action</th>
                            </tr>
                            <?php $__currentLoopData = $data3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                <?php if($data3->id_degree_level == 3): ?>              
                                    <tr>
                                        <td><?php echo e($data3->specialities); ?></td>
                                        <?php if(empty($data3->price)): ?>
                                            <td>Budget</td>
                                        <?php else: ?>
                                            <td><?php echo e($data3->price); ?></td>
                                        <?php endif; ?>
                                    
                                        <td><?php echo e($data3->duration); ?></td>
                                        <td><?php echo e($data3->seats); ?></td>
                                        <td>
                                            <form action="<?php echo e(Route('editProgram')); ?>" method="Post">
                                                <?php echo e(csrf_field()); ?>

                                                <input type="hidden" name="id" value="<?php echo e($data3->id); ?>">
                                                <input type="hidden" name="token" value="<?php echo e(bcrypt($data->id)); ?>">
                                                <button type="submit" class="btn btn-success btn-sm"><span class="fa fa-pencil"></span></button>
                                                <button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></button>                            
                                            </form>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                </div>

            <div id="Doctorate" class="tabcontent">
                    <table class="table">
                            <tr>
                                <th>Specialities</th>
                                <th>Cost of education</th>
                                <th>Duration</th>
                                <th>Number of seats</th>
                                <th>Action</th>
                            </tr>
                            <?php $__currentLoopData = $data4; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data4): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                <?php if($data4->id_degree_level == 4): ?>              
                                    <tr>
                                        <td><?php echo e($data3->specialities); ?></td>
                                        <?php if(empty($data4->price)): ?>
                                            <td>Budget</td>
                                        <?php else: ?>
                                            <td><?php echo e($data4->price); ?></td>
                                        <?php endif; ?>
                                    
                                        <td><?php echo e($data4->duration); ?></td>
                                        <td><?php echo e($data4->seats); ?></td>
                                        <td>
                                            <form action="<?php echo e(Route('editProgram')); ?>" method="Post">
                                                <?php echo e(csrf_field()); ?>

                                                <input type="hidden" name="id" value="<?php echo e($data4->id); ?>">
                                                <input type="hidden" name="token" value="<?php echo e(bcrypt($data->id)); ?>">
                                                <button type="submit" class="btn btn-success btn-sm"><span class="fa fa-pencil"></span></button>
                                                <button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></button>                            
                                            </form>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                </div>
                
                <div id="Masters" class="tabcontent">
                        <table class="table">
                                <tr>
                                    <th>Specialities</th>
                                    <th>Cost of education</th>
                                    <th>Duration</th>
                                    <th>Number of seats</th>
                                    <th>Action</th>
                                </tr>
                                <?php $__currentLoopData = $data5; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data5): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <?php if($data4->id_degree_level == 5): ?>              
                                        <tr>
                                            <td><?php echo e($data5->specialities); ?></td>
                                            <?php if(empty($data5->price)): ?>
                                                <td>Budget</td>
                                            <?php else: ?>
                                                <td><?php echo e($data5->price); ?></td>
                                            <?php endif; ?>
                                        
                                            <td><?php echo e($data5->duration); ?></td>
                                            <td><?php echo e($data5->seats); ?></td>
                                            <td>
                                                <form action="<?php echo e(Route('editProgram')); ?>" method="Post">
                                                    <?php echo e(csrf_field()); ?>

                                                    <input type="hidden" name="id" value="<?php echo e($data5->id); ?>">
                                                    <input type="hidden" name="token" value="<?php echo e(bcrypt($data->id)); ?>">
                                                    <button type="submit" class="btn btn-success btn-sm"><span class="fa fa-pencil"></span></button>
                                                    <button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></button>                            
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                    </div>
        
                    <div id="Languages" class="tabcontent">
                        <table class="table">
                            <tr>
                                <th>Specialities</th>
                                <th>Cost of education</th>
                                <th>Duration</th>
                                <th>Number of seats</th>
                                <th>Action</th>
                            </tr>
                            <?php $__currentLoopData = $data6; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data6): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                <?php if($data6->id_degree_level == 6): ?>              
                                    <tr>
                                        <td><?php echo e($data6->specialities); ?></td>
                                        <?php if(empty($data6->price)): ?>
                                            <td>Budget</td>
                                        <?php else: ?>
                                            <td><?php echo e($data6->price); ?></td>
                                        <?php endif; ?>
                                    
                                        <td><?php echo e($data6->duration); ?></td>
                                        <td><?php echo e($data6->seats); ?></td>
                                        <td>
                                            <form action="<?php echo e(Route('editProgram')); ?>" method="Post">
                                                <?php echo e(csrf_field()); ?>

                                                <input type="hidden" name="id" value="<?php echo e($data6->id); ?>">
                                                <input type="hidden" name="token" value="<?php echo e(bcrypt($data->id)); ?>">
                                                <button type="submit" class="btn btn-success btn-sm"><span class="fa fa-pencil"></span></button>
                                                <button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></button>                            
                                            </form>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    </div>
        
                    <div id="Double" class="tabcontent">
                        <table class="table">
                            <tr>
                                <th>Specialities</th>
                                <th>Cost of education</th>
                                <th>Duration</th>
                                <th>Number of seats</th>
                                <th>Action</th>
                            </tr>
                            <?php $__currentLoopData = $data7; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data7): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                <?php if($data7->id_degree_level == 7): ?>              
                                    <tr>
                                        <td><?php echo e($data7->specialities); ?></td>
                                        <?php if(empty($data6->price)): ?>
                                            <td>Budget</td>
                                        <?php else: ?>
                                            <td><?php echo e($data6->price); ?></td>
                                        <?php endif; ?>
                                    
                                        <td><?php echo e($data7->duration); ?></td>
                                        <td><?php echo e($data7->seats); ?></td>
                                        <td>
                                            <form action="<?php echo e(Route('editProgram')); ?>" method="Post">
                                                <?php echo e(csrf_field()); ?>

                                                <input type="hidden" name="id" value="<?php echo e($data7->id); ?>">
                                                <input type="hidden" name="token" value="<?php echo e(bcrypt($data->id)); ?>">
                                                <button type="submit" class="btn btn-success btn-sm"><span class="fa fa-pencil"></span></button>
                                                <button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></button>                            
                                            </form>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    </div>
        
                    <div id="Official" class="tabcontent">
                        <table class="table">
                            <tr>
                                <th>Specialities</th>
                                <th>Cost of education</th>
                                <th>Duration</th>
                                <th>Number of seats</th>
                                <th>Action</th>
                            </tr>
                            <?php $__currentLoopData = $data8; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data8): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                <?php if($data8->id_degree_level == 8): ?>              
                                    <tr>
                                        <td><?php echo e($data8->specialities); ?></td>
                                        <?php if(empty($data8->price)): ?>
                                            <td>Budget</td>
                                        <?php else: ?>
                                            <td><?php echo e($data8->price); ?></td>
                                        <?php endif; ?>
                                    
                                        <td><?php echo e($data8->duration); ?></td>
                                        <td><?php echo e($data8->seats); ?></td>
                                        <td>
                                            <form action="<?php echo e(Route('editProgram')); ?>" method="Post">
                                                <?php echo e(csrf_field()); ?>

                                                <input type="hidden" name="id" value="<?php echo e($data8->id); ?>">
                                                <input type="hidden" name="token" value="<?php echo e(bcrypt($data->id)); ?>">
                                                <button type="submit" class="btn btn-success btn-sm"><span class="fa fa-pencil"></span></button>
                                                <button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></button>                            
                                            </form>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    </div>
        
                    <div id="Degree" class="tabcontent">
                        <table class="table">
                            <tr>
                                <th>Specialities</th>
                                <th>Cost of education</th>
                                <th>Duration</th>
                                <th>Number of seats</th>
                                <th>Action</th>
                            </tr>
                            <?php $__currentLoopData = $data9; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data9): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                <?php if($data->id_degree_level == 9): ?>              
                                    <tr>
                                        <td><?php echo e($data9->specialities); ?></td>
                                        <?php if(empty($data9->price)): ?>
                                            <td>Budget</td>
                                        <?php else: ?>
                                            <td><?php echo e($data9->price); ?></td>
                                        <?php endif; ?>
                                    
                                        <td><?php echo e($data9->duration); ?></td>
                                        <td><?php echo e($data9->seats); ?></td>
                                        <td>
                                            <form action="<?php echo e(Route('editProgram')); ?>" method="Post">
                                                <?php echo e(csrf_field()); ?>

                                                <input type="hidden" name="id" value="<?php echo e($data9->id); ?>">
                                                <input type="hidden" name="token" value="<?php echo e(bcrypt($data->id)); ?>">
                                                <button type="submit" class="btn btn-success btn-sm"><span class="fa fa-pencil"></span></button>
                                                <button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></button>                            
                                            </form>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    </div>
        
                    <div id="PhD" class="tabcontent">
                        <table class="table">
                            <tr>
                                <th>Specialities</th>
                                <th>Cost of education</th>
                                <th>Duration</th>
                                <th>Number of seats</th>
                                <th>Action</th>
                            </tr>
                            <?php $__currentLoopData = $data10; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data10): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                <?php if($data10->id_degree_level == 10): ?>              
                                    <tr>
                                        <td><?php echo e($data10->specialities); ?></td>
                                        <?php if(empty($data10->price)): ?>
                                            <td>Budget</td>
                                        <?php else: ?>
                                            <td><?php echo e($data10->price); ?></td>
                                        <?php endif; ?>
                                    
                                        <td><?php echo e($data10->duration); ?></td>
                                        <td><?php echo e($data10->seats); ?></td>
                                        <td>
                                            <form action="<?php echo e(Route('editProgram')); ?>" method="Post">
                                                <?php echo e(csrf_field()); ?>

                                                <input type="hidden" name="id" value="<?php echo e($data10->id); ?>">
                                                <input type="hidden" name="token" value="<?php echo e(bcrypt($data->id)); ?>">
                                                <button type="submit" class="btn btn-success btn-sm"><span class="fa fa-pencil"></span></button>
                                                <button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></button>                            
                                            </form>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    </div>
        
                    <div id="Continuing" class="tabcontent">
                        <table class="table">
                            <tr>
                                <th>Specialities</th>
                                <th>Cost of education</th>
                                <th>Duration</th>
                                <th>Number of seats</th>
                                <th>Action</th>
                            </tr>
                            <?php $__currentLoopData = $data11; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data11): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                <?php if($data11->id_degree_level == 11): ?>              
                                    <tr>
                                        <td><?php echo e($data11->specialities); ?></td>
                                        <?php if(empty($data11->price)): ?>
                                            <td>Budget</td>
                                        <?php else: ?>
                                            <td><?php echo e($data11->price); ?></td>
                                        <?php endif; ?>
                                    
                                        <td><?php echo e($data11->duration); ?></td>
                                        <td><?php echo e($data11->seats); ?></td>
                                        <td>
                                            <form action="<?php echo e(Route('editProgram')); ?>" method="Post">
                                                <?php echo e(csrf_field()); ?>

                                                <input type="hidden" name="id" value="<?php echo e($data11->id); ?>">
                                                <input type="hidden" name="token" value="<?php echo e(bcrypt($data->id)); ?>">
                                                <button type="submit" class="btn btn-success btn-sm"><span class="fa fa-pencil"></span></button>
                                                <button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></button>                            
                                            </form>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    </div>
        
                    <div id="Executive" class="tabcontent">
                        <table class="table">
                            <tr>
                                <th>Specialities</th>
                                <th>Cost of education</th>
                                <th>Duration</th>
                                <th>Number of seats</th>
                                <th>Action</th>
                            </tr>
                            <?php $__currentLoopData = $data12; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data12): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                <?php if($data12->id_degree_level == 12): ?>              
                                    <tr>
                                        <td><?php echo e($data12->specialities); ?></td>
                                        <?php if(empty($data12->price)): ?>
                                            <td>Budget</td>
                                        <?php else: ?>
                                            <td><?php echo e($data12->price); ?></td>
                                        <?php endif; ?>
                                    
                                        <td><?php echo e($data12->duration); ?></td>
                                        <td><?php echo e($data12->seats); ?></td>
                                        <td>
                                            <form action="<?php echo e(Route('editProgram')); ?>" method="Post">
                                                <?php echo e(csrf_field()); ?>

                                                <input type="hidden" name="id" value="<?php echo e($data12->id); ?>">
                                                <input type="hidden" name="token" value="<?php echo e(bcrypt($data->id)); ?>">
                                                <button type="submit" class="btn btn-success btn-sm"><span class="fa fa-pencil"></span></button>
                                                <button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></button>                            
                                            </form>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    </div>
        
                    <div id="Study" class="tabcontent">
                        <table class="table">
                            <tr>
                                <th>Specialities</th>
                                <th>Cost of education</th>
                                <th>Duration</th>
                                <th>Number of seats</th>
                                <th>Action</th>
                            </tr>
                            <?php $__currentLoopData = $data13; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data13): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                <?php if($data13->id_degree_level == 13): ?>              
                                    <tr>
                                        <td><?php echo e($data13->specialities); ?></td>
                                        <?php if(empty($data13->price)): ?>
                                            <td>Budget</td>
                                        <?php else: ?>
                                            <td><?php echo e($data13->price); ?></td>
                                        <?php endif; ?>
                                    
                                        <td><?php echo e($data13->duration); ?></td>
                                        <td><?php echo e($data13->seats); ?></td>
                                        <td>
                                            <form action="<?php echo e(Route('editProgram')); ?>" method="Post">
                                                <?php echo e(csrf_field()); ?>

                                                <input type="hidden" name="id" value="<?php echo e($data13->id); ?>">
                                                <input type="hidden" name="token" value="<?php echo e(bcrypt($data->id)); ?>">
                                                <button type="submit" class="btn btn-success btn-sm"><span class="fa fa-pencil"></span></button>
                                                <button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></button>                            
                                            </form>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    </div>
               </div>  
    </div>
</div>
<script>
//language

function levell(){
    
    if ($('#levels').val() == '6'){
        $('#filedOfStudy').addClass('form-group hidden');
        $('#levelAfter').after(`
            <div class="form-group" id="delLang">
                <label for="">Language</label>
                <input type="text" name="language" class="form-control">
            </div>
        `);
    }else{
        $('#delLang').remove();
        $('#filedOfStudy').removeClass('hidden'); 
    }
   
}

// price textBox
function disab(){
    $('#inputPrice').attr('disabled', 'disabled');
    $('#inputPrice').removeAttr('required');
}

function enab() {
    $('#inputPrice').removeAttr('disabled');
    $('#inputPrice').attr('required', 'required');
}


// tabs
    document.getElementById("defaultOpen").click();

    function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>