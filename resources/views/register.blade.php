<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>register page</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="vh-100 gradient-custom bg-secondary p-5">
<div class = "container lead bg-info  text-dark p-5 col-lg-6 border  justify-content-center align-items-center  ">
    <form id = "myform" action = "{{url('user')}}" enctype = "multipart/form-data" method = "post">
        @csrf
        <div class=" row  mt-2">
            <div class="col h3 text-center">
                <p>Please fill the details to Register</p>
                <input type="hidden" name="token" value="{{ csrf_token() }}">
            </div>
        </div>

        <div class="row mt-2">
            <div class="col">
                <label for = "name">User Name</label>
            </div>
            <div class="col">
                <input type = "text" id = "name" name = "name" class="form-control" value = "{{old('name')}}">
                @error('name')
                <p class="invalid-feedback d-block" > {{$message}}</p>
                @enderror
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <label for = "mail">E-Mail</label>
            </div>

            <div class="col">
                <input type = "email" id = "mail" name = "email" class="form-control"  value = "{{old('email')}}"  >
                @error('email')
                <p class="invalid-feedback d-block" > {{$message}}</p>
                @enderror
            </div>
        </div>


        <div class="row mt-2">
            <div class="col">
                <label for = "password">password</label>
            </div>

            <div class="col">
                <input type = "password" id = "password" name = "password" class="form-control"  value = "{{old('password')}}"  >
                @error('password')
                <p class="invalid-feedback d-block" > {{$message}}</p>
                @enderror
            </div>
        </div>

        <div class="row mt-2">
            <div class="col">
                <label for = "password_confirmation">Confirm Password</label>
            </div>

            <div class="col">
                <input type = "password" id = "password_confirmation" name = "password_confirmation" class="form-control" >
            </div>
        </div>

        <div class="row mt-2">
            <div class="col ">
                <input type = "reset" id = "reset" value = "reset" class="btn  btn-outline-warning text-dark" style="background-color: orange;" >
            </div>

            <div class="col text-center">
                <input type = "submit"  id = "submit" class="justify-start btn btn-outline-success text-white" value = "register" style="background-color: #00FF00;">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col mt-1">
                <p class = "text-white fw-bold text-center">Already have an account? <a href = "{{url('login')}}" class = "text-white fw-bold">Login</a>
                </p>
            </div>
        </div>
    </form>
</div>
</body>
</html>
