

<?php $__env->startSection('content'); ?>

    <?php
        $info = DB::table('university_datas')->where('user_id', Auth::user()->id)->first();

    ?>

    <?php if(count($info) > 0): ?>
        <?php echo $__env->make('includes.university_info', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php else: ?>
        <?php echo $__env->make('includes.university_filling', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>