<?php echo $__env->make('pages.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<h1>About Page</h1>
<a href="<?php echo e(route('post')); ?>">POST</a>

<H1>content</H1>
<?php echo $__env->make('pages.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('Layout.masterlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\baboo.mehandro\Desktop\Progress\Practice\layouts\resources\views/about.blade.php ENDPATH**/ ?>