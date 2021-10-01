<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Page</title>
    <link rel="stylesheet" href="{{asset('styles/bootstrap-3.1.1/css/bootstrap.min.css') }}">
</head>

<body>

<div class="container">
    <div class="row" style="margin-top: 45px">
        <div class="col-md-4 col-md-offset-4">
            <h4>User register</h4>
            <hr>
            <form action="{{route('auth.create')}}" method="post">
                @csrf
                <div class="results">
                    @if(\Illuminate\Support\Facades\Session::get('success'))
                        <div class="alert alert-success">
                            {{\Illuminate\Support\Facades\Session::get('success')}}
                        </div>
                    @endif

                    @if(\Illuminate\Support\Facades\Session::get('fail'))
                            <div class="alert alert-success">
                                {{\Illuminate\Support\Facades\Session::get('fail')}}
                            </div>
                        @endif
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter full name" value="{{
                        old('name')}}">
                    <span class="text-danger">@error('name'){{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="email">email</label>
                    <input type="text" class="form-control" name="email" placeholder="Enter email" value="{{
                        old('email')}}">
                    <span class="text-danger">@error('email'){{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter password">
                    <span class="text-danger">@error('password'){{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-primary">Register</button>
                </div>
                <br>
                <a href="login"> I already have an account</a>
            </form>
        </div>
    </div>
</div>

</body>
</html>
