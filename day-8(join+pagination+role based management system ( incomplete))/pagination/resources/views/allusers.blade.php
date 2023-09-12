<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Users List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        nav .w-5{
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center"> <!-- Center the content horizontally -->
            <div class="col-md-8"> <!-- Adjust the column width based on your preference -->
                <h1 class="text-center">All Users List</h1>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>EMAIL</th>
                                <th>AGE</th>
                                <th>CITY</th>
                                <th>VIEW</th>
                                <th>EDIT</th>
                                <th>DELETE</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $id => $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->age}}</td>
                                    <td>{{$user->city}}</td>
                                    <td><a href="{{route('view.user', $user->id)}}" class="btn btn-primary btn-sm">View</a></td>
                                    <td><a href="#" class="btn btn-warning btn-sm">EDIT</a></td>
                                    <td><a href="#" class="btn btn-danger btn-sm">DELETE</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-5" >
                        {{-- {{$data->links()}} --}}
                        {{$data->links('pagination::bootstrap-5')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


