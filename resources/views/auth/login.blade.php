
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Login</title>

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800;900&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

    <link href="{{asset('admin/css/materialdesignicons.min.css')}}" rel="stylesheet" />

    <!-- Ekka CSS -->
    <link id="ekka-css" rel="stylesheet" href="{{asset('admin/assets/css/ekka.css')}}" />

</head>

<body class="sign-inup" id="body">
<div class="container d-flex align-items-center justify-content-center form-height-login pt-24px pb-24px">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card">
                <div class="card-header" style="background-color: #88aaf3 !important;">
                    <div class="ec-brand">
                        @if($errors->any())
                            <div class="alert alert-danger" style=" margin-top: 15px;">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <a href="#" title="">
                            <img class="ec-brand-icon img-fluid img" src="{{asset('media/logos/iconic-mark-white.png')}}" alt="" />
                        </a>
                    </div>
                </div>
                <div class="card-body p-5">
                    <h4 class="text-dark mb-5">Sign In</h4>

                    <form action="login" method="POST" class="form" novalidate="novalidate" id="kt_login_signin_form">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-12 mb-4">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                            </div>

                            <div class="form-group col-md-12 ">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            </div>

                            <div class="col-md-12">
                                <div class="d-flex my-2 justify-content-between">
                                    <div class="d-inline-block mr-3">
                                        {{--                                        <div class="control control-checkbox">Remember me--}}
                                        {{--                                            <input type="checkbox" />--}}
                                        {{--                                            <div class="control-indicator"></div>--}}
                                        {{--                                        </div>--}}
                                    </div>
                                    {{--                                    <p><a class="text-blue" href="#">Forgot Password?</a></p>--}}
                                </div>

                                <button type="submit" class="btn btn-primary btn-block mb-4">Sign In</button>

                                {{--                                <p class="sign-upp">Don't have an account yet ?--}}
                                {{--                                    <a class="text-blue" href="sign-up.html">Sign Up</a>--}}
                                {{--                                </p>--}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Javascript -->
<script src="assets/plugins/jquery/jquery-3.5.1.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/plugins/jquery-zoom/jquery.zoom.min.js"></script>
<script src="assets/plugins/slick/slick.min.js"></script>

<!-- Ekka Custom -->
<script src="assets/js/ekka.js"></script>
</body>
</html>
