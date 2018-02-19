<?php $__env->startSection('content'); ?>

<?php $__env->startSection('title', 'Search Educational Program'); ?>

<link rel="stylesheet" href="<?php echo e(URL::to('css/nouislider.min.css')); ?>">
<script src="<?php echo e(URL::to('js/nouislider.min.js')); ?>"></script>
<script src="<?php echo e(URL::to('js/md5.js')); ?>"></script>

<!-- Cart program -->

<?php if(Auth::check()): ?>
    <div class="btn-group cart">
                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-top:0px !important">
                <span class="fa fa-shopping-cart fa-lg"></span> <span class="badge"><?php echo e(count($get_fav)); ?></span> <span class="caret"></span>
                </button>
                <ul class="dropdown-menu list-group cart-group" id="cartt">
                  
                    <?php $__currentLoopData = $get_fav; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $get_fav): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="list-group-item">
                            <div class="row">
                            <a href="program_detail/<?php echo e($get_fav->prog_id); ?>">
                                <div class="col-md-10">
                                    <?php echo e($get_fav->specialities); ?><br>
                                    <?php echo e($get_fav->university_name); ?>

                                </div>
                            </a>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="btn btn-danger btn-xs" 
                                    onclick="delProgram(<?php echo e($get_fav->prog_id); ?>)">
                                        <span class="fa fa-remove"></span>
                                    </button>
                                </div>                
                            </div>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 
                </ul>
            </div>
 <?php else: ?>
                 
<?php endif; ?>

<div class="menu-bg"></div>
    <div class="search-bg">
        <h2 class="bg-header">Search Educational Program</h2>
    </div>
    <div class="container search-header"><br>
        <div class="c col-md-3">
            <form>
                <?php echo e(csrf_field()); ?>

                <div class="form-group">
                    <label for="">School Location</label>
                    <select name="school_location" onchange="cchange()" class="form-control">
                        <option value="0">All states</option>
                    <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($state->id); ?>"><?php echo e($state->state); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">College/University</label>
                    <select name="spec_id" onchange="selectt()" class="form-control">
                        <option value="0">All school</option>
                        <?php $__currentLoopData = $school; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($school->id); ?>" <?php echo e($school->id == $arr[0] ? 'selected' : ''); ?>><?php echo e($school->school); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    
                </div>
                <div class="form-group">
                    <label for="">Degree Level</label>
                    <select id="specId"  name="level" onchange="cchange()" class="form-control">
                        <option value="0">All Levels</option>
                    <?php $__currentLoopData = $DegreeLevel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Degree): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($Degree->id); ?>" <?php echo e($Degree->id == $arr[1] ? 'selected' : ''); ?>><?php echo e($Degree->degreeLevel); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Field of Study</label>
                    <select name="spec" onchange="cchange()" class="form-control">
                        <option value="0">All specialities</option>
                    <?php $__currentLoopData = $speciality; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($spec->id); ?>" <?php echo e($spec->id == $arr[2] ? 'selected' : ''); ?>><?php echo e($spec->specialities); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Price</label>
                    <select id="price"  onchange="cchange()" class="form-control">
                        <option value="" selected disabled hidden>Please select</option>
                        <option value="500,5000">$500 - $5,000</option>
                        <option value="5000,15000">$5,000 - $15,000</option>
                        <option value="15000,25000">$15,000 - $25,000</option>
                        <option value="25000,1000000000000000">above $25,000</option>
                    </select><br>
                    <input type="checkbox" id="budget" name="budjet">
                    <label for="budget" style="font-weight:normal">Scholarship</label>
                    <!-- <div id="slider"></div>
                    <br>
                     -->
                </div>
            </form><br><br>
        </div>
        <div class="col-md-9" id="listPrograms">
            
        </div>
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <div class="text-center">
                    <nav aria-label="...">
                        <ul class="pagination">
                            <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
                            <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                            <li class=""><a href="#">2 <span class="sr-only">(current)</span></a></li>
                            <li class=""><a href="#">3 <span class="sr-only">(current)</span></a></li>
                            <li class=""><a href="#">4 <span class="sr-only">(current)</span></a></li>
                            <li class=""><a href="#" aria-label="Previous"><span aria-hidden="true">&raquo;</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
<script src="<?php echo e(URL::to('js/filter.js?version=10')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>