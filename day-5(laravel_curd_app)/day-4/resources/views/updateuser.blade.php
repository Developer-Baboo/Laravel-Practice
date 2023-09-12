<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
<div class="container">
        <div class="row">
            <div class="col-4">
                <h1>Update User</h1>
                <form action="{{ route('update.user', $data->id) }}" method="POST" >
                    @csrf

                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" class="form-control" value="{{$data->name}}" name="username" >
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="text" class="form-control" value="{{$data->email}}" name="useremail" >
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Age</label>
                        <input type="text" class="form-control" value="{{$data->age}}" name="userage" >
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">City</label>
                        <input type="text" class="form-control" value="{{$data->city}}" name="usercity" >
                    </div>
                    <button type="submit"  class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
</div>
</body>
</html>
