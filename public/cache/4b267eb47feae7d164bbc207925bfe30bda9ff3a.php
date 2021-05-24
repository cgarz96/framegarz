<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


	<?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	 <?php echo e($usuario->nombre); ?>

	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\framegarz\views/list.blade.php ENDPATH**/ ?>