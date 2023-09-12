<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-4">

            <h1>Add New User</h1>
            {{-- @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                <li class="alert alert-danger">{{ $error }}</li>
                @endforeach
            </ul>
            @endif --}}
            <form action="{{route('addUser')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-control">Name</label>
                    <input type="text" name="user_name" value="{{old('user_name')}}"  class="form-control @error('user_name') is-invalid  @enderror" id="">
                    <span class="text-danger" >
                        @error('user_name')
                            {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="" class="form-control ">Email</label>
                    <input type="text" name="user_email" value="{{old('user_email')}}" class="form-control @error('user_email') is-invalid  @enderror" id="">
                    <span class="text-danger" >
                        @error('user_email')
                            {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="" class="form-control ">Password</label>
                    <input type="text" name="user_password" value="{{old('user_password')}}" class="form-control @error('user_password') is-invalid  @enderror" id="">
                    <span class="text-danger" >
                        @error('user_password')
                            {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="" class="form-control ">Age</label>
                    <input type="text" name="user_age" value="{{old('user_age')}}" class="form-control @error('user_age') is-invalid  @enderror" id="">
                    <span class="text-danger" >
                        @error('user_age')
                            {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="" class="form-control">City</label>
                    <select class="form-control" name="user_city" id="">
                        <option class="form-control" value="mithi">Mithi</option>
                        <option class="form-control" value="diplo">Diplo</option>
                        <option class="form-control" value="chhachhro">chhachhro</option>
                        <option class="form-control" value="chelhar">Chelhar</option>
                    </select>
                    <span class="text-danger" >
                        @error('user_city')
                            {{$message}}
                        @enderror
                    </span>
                </div>
                <button type="submit" class="btn btn-primary" >Submit</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
