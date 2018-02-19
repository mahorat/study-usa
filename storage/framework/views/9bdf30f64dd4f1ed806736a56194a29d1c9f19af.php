

<?php $__env->startSection('styles'); ?>
	<?php echo $__env->make('layouts/inbox/jetson/includes.styles', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('top-menu'); ?>
	<?php echo $__env->make('layouts/inbox/jetson/includes.top-menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('left-sidebar-menu'); ?>
	<?php echo $__env->make('layouts/inbox/jetson/includes.left-sidebar-menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
	<?php echo $__env->make('layouts/inbox/jetson/includes.title', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('left-navbar'); ?>
	<?php echo $__env->make('layouts/inbox/jetson/includes.left-navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('layouts/inbox/jetson/includes.compose', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
	<?php echo $__env->make('layouts/inbox/jetson/includes.scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts/inbox/jetson/layouts.inbox-app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>