<h1>This is post page</h1>
<?php echo $__env->make('pages.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<a href="/">Home</a>
<a href="<?php echo e(route('about')); ?>">About</a>
<?php echo $__env->make('pages.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\Users\baboo.mehandro\Desktop\Progress\Practice\layouts\resources\views/post.blade.php ENDPATH**/ ?>