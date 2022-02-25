<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">TYE</h1>

            </div>
            <h3>Welcome to TYE</h3>
            
            {{-- <span class= "text-success">{{ $message }} </span> --}}
            
            <form class="m-t" method='post' role="form" action="{{ url('login_user') }}">
                @if (Session::has('fail'))
                    <div class="alert alert-warning">{{ Session::get('fail') }}</div>
                @endif
                @csrf
                <div class="form-group">
                    <input type="email" class="form-control" name='email' placeholder="Email" required="">
                    <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name = 'password' placeholder="Password" required="">
                    <span class="text-danger">@error('password') {{ $message }} @enderror</span>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                <a href="#"><small>Forgot password?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="{{ url('registration') }}">Create an account</a>
            </form>
            <p class="m-t"> <small>All rights reserved by Mazbah &copy; 2022</small> </p>

        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="assets/js/jquery-3.1.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>

</body>

</html>
