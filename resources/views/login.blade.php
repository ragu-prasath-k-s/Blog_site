<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width = device-width, initial-scale = 1">
    <title>Login Page</title>
    <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity = "sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin = "anonymous"></script>
    <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel = "stylesheet" integrity = "sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin = "anonymous">
</head>
<body>
<section class = "vh-100 gradient-custom">
    <div class = "container py-5 h-100">
        <div class = "row d-flex justify-content-center align-items-center h-100">
            <div class = "col-12 col-md-8 col-lg-6 col-xl-5">
                <div class = "card bg-secondary text-white" style = "border-radius: 1rem;">
                    <div class = "card-body p-5 text-center">

                        <div class = "mb-md-5 mt-md-4 pb-5">

                            <form action="authenticateduser" method="post">
                                @csrf
                                <h2 class = "fw-bold mb-2 text-uppercase">Login</h2>
                                <p class = "text-white mb-5">Please enter your email and password!</p>
                                @error('login')
                                <p class="h5 text-dark" > {{$message}}</p>
                                @enderror
                                <div class = "form-outline form-white mb-4">
                                    <label class = "form-label" for = "email">Email</label>
                                    <input type = "email" id = "email" class = "form-control form-control-lg" value="{{old('email')}}" name = "email" >
                                    @error('email')
                                    <p class="h5 text-dark" > {{$message}}</p>
                                    @enderror
                                </div>

                                <div class = "form-outline form-white mb-4">
                                    <label class = "form-label" for = "password">Password</label>
                                    <input type = "password" id = "password" class = "form-control form-control-lg" value="{{old('password')}}" name = "password" >
                                    @error('password')
                                    <p class="h5 text-dark" > {{$message}}</p>
                                    @enderror
                                </div>

                                {{--                            <p class = "small mb-5 pb-lg-2"><a class = "text-white-50" href = "#!">Forgot password?</a></p>--}}

                                <button class = "btn btn-outline-light btn-lg px-5" type = "submit">Login</button>

                            </form>

                        </div>

                        <div>
                            <p class = "mb-0">Don't have an account? <a href = "{{url('register')}}" class = "text-white fw-bold">Sign Up</a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
