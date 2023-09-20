<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Update User</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-4">
            <h1>Add User</h1>
            <form action="<?php echo e(route('update.user', $data->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                    <label for="">Enter Name</label>
                    <input type="text" value="<?php echo e($data->name); ?>" placeholder="Faria Ansari" name="name" class="form-control" id="" required>
                </div>
                <div class="mb-3">
                    <label for="">Email</label>
                    <input type="email" value="<?php echo e($data->email); ?>" placeholder="hello@gmail.com" name="email" class="form-control" id="" required>
                </div>
                <div class="mb-3">
                    <label for="">Age</label>
                    <input type="number" value="<?php echo e($data->age); ?>" placeholder="21" name="age" class="form-control" id="" required>
                </div>
                <div class="mb-3">
                    <label for="">City</label>
                    <input type="text" value="<?php echo e($data->city); ?>" placeholder="Mith" name="city" class="form-control" id="" required>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Update Student</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
<?php /**PATH C:\Users\baboo.mehandro\Desktop\Progress\Practice\layouts\resources\views/UpdateUser.blade.php ENDPATH**/ ?>