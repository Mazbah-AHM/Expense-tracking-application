<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registration</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="assets/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">TYE</h1>

            </div>
            <h3>Register to TYE</h3>
            <p>Create an account here.</p>
            <form class="m-t" method="post" role="form" action="{{ url('register_user') }}">
                @if (Session::has('fail'))
                    <div class="alert alert-warning">{{ Session::get('fail') }}</div>
                @endif
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name='name' placeholder="Name" value="{{ old('name') }}"
                        required="">
                    <span class="text-danger">@error('name') {{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name='email' placeholder="Email"
                        value="{{ old('email') }}" required="">
                    <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <input type="tel" class="form-control" name='contact' placeholder="Contact no"
                        value="{{ old('contact') }}" required="">
                    <span class="text-danger">@error('contact') {{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name='password' placeholder="Password" required="">
                    <span class="text-danger">@error('password') {{ $message }} @enderror</span>
                </div>

                <button type="submit" class="btn btn-primary block full-width m-b">Register</button>

                <p class="text-muted text-center"><small>Already have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="{{ url('login') }}">Login</a>
            </form>
            <p class="m-t"> <small>All rights reserved by Mazbah &copy; 2022</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="assets/js/jquery-3.1.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <!-- iCheck -->
    <script src="assets/js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
</body>

</html>
