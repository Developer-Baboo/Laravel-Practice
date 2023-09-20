<h1>User Detials</h1>
<div>
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <h3> Name: <?php echo e($user->name); ?></h3>
        <h3>Email : <?php echo e($user->email); ?></h3>
        <h3>Age: <?php echo e($user->age); ?></h3>
        <h3>City <?php echo e($user->city); ?></h3>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH C:\Users\baboo.mehandro\Desktop\Progress\Practice\layouts\resources\views/pages/singleUser.blade.php ENDPATH**/ ?>