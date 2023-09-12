<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Users List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    @if (session('message'))
    <div class="alert alert-success" id="success-message">
        {{ session('message') }}
    </div>
    <script>
        // Automatically hide the success message after 3 seconds (3000 milliseconds)
        setTimeout(function() {
            document.getElementById('success-message').style.display = 'none';
        }, 2000);
    </script>
@endif
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1>All Users List</h1>
                <a href="/newuser" class="btn btn-success btn-sm mb-3"> Add New</a>
                <table class="table table-bordered table-striped" >
                    <tr>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>AGE</th>
                        <th>CITY</th>
                        <th>VIEW</th>
                        <th>DELETE</th>
                        <th>UPDATE</th>
                    </tr>
                    @foreach($data as $id =>$user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->age}}</td>
                            <td>{{$user->city}}</td>
                            <td><a href="{{route('view.user', $user->id)}}" class="btn btn-primary btn-sm" >View</a></td>
                            <td><a href="{{route('delete.user', $user->id)}}" class="btn btn-danger btn-sm" >Delete</a></td>
                            <td><a href="{{route('update.page', $user->id)}}" class="btn btn-warning btn-sm" >Update</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</body>
</html>


