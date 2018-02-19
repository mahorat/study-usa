


<?php $__env->startSection('title', 'Profile info'); ?>

<?php $__env->startSection('user_content'); ?>

		<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="profile-content">

			   <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
				   <h3>Personal data</h3>
				   <table class="table">
					   <tr>
						   <td>Name</td>
						   <td><?php echo e($data->name); ?></td>
					   </tr>
					   <tr>
						<td>Surname</td>
						<td><?php echo e($data->surname); ?></td>
					</tr>
					<?php if(!empty($data->middlename)): ?>
					<tr>
						<td>Middle name</td>
						<td><?php echo e($data->middlename); ?></td>
					</tr>
					<?php endif; ?>
					<tr>
						<td>Place of the Birth</td>
						<td>
							<?php $__currentLoopData = $place; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $place): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php echo e($place->country_name); ?>

							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</td>
					</tr>
					<tr>
						<td>Date of Birth</td>
						<td><?php echo e($data->day); ?>-<?php echo e($data->month); ?>-<?php echo e($data->year); ?></td>
					</tr>
					<tr>
						<td>Gender</td>
						<td>
							<?php if($data->gender == 1): ?>
								Male
							<?php else: ?>
								Female
							<?php endif; ?>
						</td>
					</tr>
					<tr>
						<td>Citizenship</td>
						<td>
							<?php $__currentLoopData = $citizenship; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $citizenship): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php echo e($citizenship->country_name); ?>

							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</td>
					</tr>
					<tr>
						<td><h3>Contact Information</h3></td>
						<td></td>
					</tr>
					<tr>
						<td>Address of permanent residence</td>
						<td>
							<?php $__currentLoopData = $per_country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $per_country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php echo e($per_country->country_name); ?>, 
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php echo e($data->region); ?>, <?php echo e($data->city); ?>, <?php echo e($data->address); ?>

						</td>
					</tr>
					<tr>
						<td>Email</td>
						<td><?php echo e($data->email); ?></td>
					</tr>
					<tr>
						<td>Phone number</td>
						<td><?php echo e($data->phone_number); ?></td>
					</tr>
					<tr>
						<td><h3>Education</h3></td>
						<td></td>
					</tr>
					<tr>
						<td>Level of education</td>
						<td><?php $__currentLoopData = $level; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php echo e($level->level); ?>

							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td>
					</tr>
					<tr>
						<td>Name of the school</td>
						<td><?php echo e($data->name_of_the_school); ?></td>
					</tr>
					<tr>
						<td>Location of the school</td>
						<td>
							<?php $__currentLoopData = $school_loc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school_loc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php echo e($school_loc->country_name); ?>, 
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php echo e($data->school_city); ?>, <?php echo e($data->school_street); ?>

						</td>
					</tr>
					<tr>
						<td>Year of starting</td>
						<td><?php echo e($data->year_of_starting); ?></td>
					</tr>
					<tr>
						<td>Year of ending</td>
						<td><?php echo e($data->year_of_ending); ?></td>
					</tr>
					<tr>
						<td>Level of english</td>
						<td><?php echo e($data->level_of_english); ?></td>
					</tr>

				   </table>
			   </div>
			</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>





<?php $__env->stopSection(); ?>

<?php echo $__env->make('includes.user_info', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>