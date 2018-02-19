											<aside class="col-lg-9 col-md-8 pl-0">
												<div class="panel panel-refresh pa-0">
													<div class="refresh-container">
														<div class="la-anim-1"></div>
													</div>
													<div class="panel-heading pt-20 pb-20 pl-15 pr-15">
														<div class="pull-left">
															<h6 class="panel-title txt-dark">compose</h6>
														</div>
													</div>
														<div class="modal-body">
															<form role="form" class="form-horizontal" action="" method="POST">
																<?php echo e(csrf_field()); ?>


																<div class="form-group">
																	<label class="col-lg-2 control-label">To</label>
																	<div class="col-lg-10">
																		<input type="text" placeholder="" id="inputEmail1" class="form-control" name="recipient" value="<?php echo e(old('recipient')); ?>">
																	</div>
																</div>
																<?php if(session('error') !== null): ?>
																<div class="form-group">
																<label class="col-lg-2 control-label"></label>	
																<div class="col-lg-10">						
																	<div class="alert alert-danger">
																        <ul>
																            <li><?php echo e(session('error')); ?></li>
																        </ul>
																    </div>
																</div>
															    </div>
																<?php endif; ?>
																<?php if($errors->has('recipient')): ?>
																<div class="form-group">
																<label class="col-lg-2 control-label"></label>	
																<div class="col-lg-10">						
																	<div class="alert alert-danger">
																        <ul>
																            <?php $__currentLoopData = $errors->get('recipient'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																                <li><?php echo e($error); ?></li>
																            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																        </ul>
																    </div>
																</div>
															    </div>
																<?php endif; ?>
																<div class="form-group">
																	<label class="col-lg-2 control-label">Subject</label>
																	<div class="col-lg-10">
																		<input type="text" placeholder="" id="inputPassword1" class="form-control" name="subject" value="<?php echo e(old('subject')); ?>">
																	</div>
																</div>
																<?php if($errors->has('subject')): ?>
																<div class="form-group">
																<label class="col-lg-2 control-label"></label>	
																<div class="col-lg-10">						
																	<div class="alert alert-danger">
																        <ul>
																            <?php $__currentLoopData = $errors->get('subject'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																                <li><?php echo e($error); ?></li>
																            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																        </ul>
																    </div>
																</div>
															    </div>
																<?php endif; ?>
																<div class="form-group">
																	<label class="col-lg-2 control-label">Message</label>
																	<div class="col-lg-10">
																		<textarea class="textarea_editor form-control" rows="15" placeholder="Enter text ..." name="message"><?php echo e(old('message')); ?></textarea>
																	</div>
																</div>
																<?php if($errors->has('message')): ?>
																<div class="form-group">
																<label class="col-lg-2 control-label"></label>	
																<div class="col-lg-10">						
																	<div class="alert alert-danger">
																        <ul>
																            <?php $__currentLoopData = $errors->get('message'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																                <li><?php echo e($error); ?></li>
																            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																        </ul>
																    </div>
																</div>
															    </div>
																<?php endif; ?>
																<div class="form-group">
																	<div class="col-lg-offset-2 col-lg-10">
																		<button class="btn btn-success" type="submit">Send</button>
																	</div>
																</div>
															</form>
														</div>
												</div>
											</aside>