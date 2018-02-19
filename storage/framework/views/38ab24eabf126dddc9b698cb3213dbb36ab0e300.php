

<?php $__env->startSection('title', 'Profile info'); ?>

<?php $__env->startSection('user_content'); ?>

<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php $__currentLoopData = $candidate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $candidate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="profile-content">
            <h4>EDUCATION IMFORMATION</h4>
            <table class="table">
                <tr>
                    <td>School/University name</td>
                    <td><?php echo e($data->name_of_the_school); ?></td>
                </tr>
                <tr>
                    <td>School's address</td>
                    <td><?php echo e($data->school_street); ?></td>
                </tr>
                <tr>
                    <td>School's city</td>
                    <td><?php echo e($data->school_city); ?></td>
                </tr>
                <tr>
                    <td>School's Region</td>
                    <td><?php echo e($data->region); ?></td>
                </tr>
                <tr>
                    <td>School's location</td>
                    <td>
                        <?php $school_country = $country ?>
                        <?php $__currentLoopData = $school_country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school_country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($school_country->id == $data->school_location): ?>
                                <?php echo e($school_country->country_name); ?>

                            <?php else: ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>
                </tr>
                <tr>
                    <td>Phone number</td>
                    <td><?php echo e($candidate->school_phone); ?></td>
                </tr>
                <tr>
                    <td>Other contact</td>
                    <td><?php echo e($candidate->other_contact); ?></td>
                </tr>
                <tr>
                    <td>Year of starting</td>
                    <td><?php echo e($candidate->year_of_starting); ?></td>
                </tr>
                <tr>
                    <td>Year of Ending</td>
                    <td><?php echo e($candidate->year_of_ending); ?></td>
                </tr>
                <tr>
                    <td>Level of English</td>
                    <td><?php echo e($candidate->level_of_english); ?></td>
                </tr>
                <tr>
                    <td><h4>SPONSOR INFORMATION </h4></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Your sponsor</td>
                    <td><?php echo e($candidate->sponsor); ?></td>
                </tr>
                <tr>
                    <td>Sponsor full Name</td>
                    <td><?php echo e($candidate->sponsor_name); ?> <?php echo e($candidate->sponsor_middlename); ?>  <?php echo e($candidate->sponsor_lastname); ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo e($candidate->sponsor_email); ?></td>
                </tr>
                <tr>
                    <td>Phone number</td>
                    <td><?php echo e($candidate->sponsor_phone); ?></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><?php echo e($candidate->sponsor_address); ?></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td><?php echo e($candidate->sponsor_city); ?></td>
                </tr>
                <tr>
                    <td>Region</td>
                    <td><?php echo e($candidate->sponsor_region); ?></td>
                </tr>
                <tr>
                    <td>Postal / Zip Code</td>
                    <td><?php echo e($candidate->sponsor_zip); ?></td>
                </tr>
                <tr>
                    <td>Country</td>
                    <td>
                        <?php $school_country = $country ?>
                        <?php $__currentLoopData = $school_country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school_country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($school_country->id == $candidate->sponsor_country): ?>
                                <?php echo e($school_country->country_name); ?>

                            <?php else: ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>
                </tr>
                <tr>
                    <td><h4>PARENT INFORMATION</h4></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Father's Full name</td>
                    <td><?php echo e($candidate->father_name); ?></td>
                </tr>
                <tr>
                    <td>Father Occupation</td>
                    <td><?php echo e($candidate->father_occupation); ?></td>
                </tr>
                <tr>
                    <td>Mather's Full name</td>
                    <td><?php echo e($candidate->mother_name); ?></td>
                </tr>
                <tr>
                    <td>Mather Occupation</td>
                    <td><?php echo e($candidate->mather_occupation); ?></td>
                </tr>
                <tr>
                    <td>Gross annual income of your family</td>
                    <td><?php echo e($candidate->indicate_your_family); ?></td>
                </tr>
                <tr>
                    <td>Address </td>
                    <td><?php echo e($candidate->parent_address); ?></td>
                </tr>
                <tr>
                    <td>Address 2</td>
                    <td><?php echo e($candidate->parent_address2); ?></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td><?php echo e($candidate->parent_city); ?></td>
                </tr>
                <tr>
                    <td>Region</td>
                    <td><?php echo e($candidate->region); ?></td>
                </tr>
                <tr>
                    <td>Country</td>
                    <td>
                        <?php $school_country = $country ?>
                        <?php $__currentLoopData = $school_country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school_country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($school_country->id == $candidate->sponsor_country): ?>
                                <?php echo e($school_country->country_name); ?>

                            <?php else: ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>
                </tr>
            </table>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('includes.user_info', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>