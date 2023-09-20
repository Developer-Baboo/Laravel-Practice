<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All User List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <?php if(session('message')): ?>
    <div class="alert alert-success" id="success-message">
        <?php echo e(session('message')); ?>

    </div>
    <?php endif; ?>
    <script>
        // Automatically hide the success message after 3 seconds (3000 milliseconds)
        setTimeout(function() {
            document.getElementById('success-message').style.display = 'none';
        }, 2000);
    </script>

<div class="container">
    <div class="row">
        <div class="col-6">
            <h1>All User List</h1>
            <a href="/newuser" class="btn btn-primary btn-sm mb-3">Add User</a>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>City</th>
                    <th>View</th>
                    <th>Delete</th>
                    <th>Update</th>
                </tr>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($user->name); ?></td>
                    <td><?php echo e($user->email); ?></td>
                    <td><?php echo e($user->age); ?></td>
                    <td><?php echo e($user->city); ?></td>
                    <td><a href="<?php echo e(route('view.user', $user->id)); ?>" class="btn btn-primary btn-sm">View</a></td>
                    <td><a href="<?php echo e(route('delete.user', $user->id)); ?>" class="btn btn-danger btn-sm">Delete</a></td>
                    <td>
                        <a href="<?php echo e(route('update.user', $user->id)); ?>" class="btn btn-warning btn-sm">Update</a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!-- This line was missing -->
            </table>
        </div>
    </div>
</div>





<?php /**PATH C:\Users\baboo.mehandro\Desktop\Progress\Practice\layouts\resources\views/allusers.blade.php ENDPATH**/ ?>