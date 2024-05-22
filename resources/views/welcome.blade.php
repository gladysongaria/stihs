<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Login </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/stihs_background.jpg">

    <!-- Bootstrap Css -->
    <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('backend/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

    <style>
        .bck-img {
            background-image: url('logo/stihs_background.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            height: 40vh;
        }

        .auth-body-bg {
            background-color: rgba(255, 255, 255, 0.30);
            /* Adjust alpha (fourth parameter) to set transparency */
        }

        .card {
            background-color: rgba(255, 255, 255, 0.1);
            /* Adjust alpha for card transparency */
            border: none;
            /* Remove border for a cleaner look */
        }

        .card-body {
            background-color: transparent;
            border-color: #ffffff
                /* Make card body transparent */
        }
    </style>

</head>

<body class="bck-img">
    <div class="bg-overlay"></div>
    <div class="wrapper-page">
        <div class="p-0 container-fluid">
            <div class="card">
                <div class="card-body">

                    <div class="mt-4 text-center">
                        <div class="mb-3">
                            <a href="index.html" class="auth-logo">
                                <img src="{{ asset('logo\stihslogo.png') }}" height="70" class="mx-auto logo-dark"
                                    alt="">
                                <img src="{{ asset('logo\stihslogo.png') }}" height="70" class="mx-auto logo-light"
                                    alt="">
                            </a>
                        </div>
                    </div>

                    <h4 class="text-center text-muted font-size-18"><b>Sign In</b></h4>

                    <div class="p-3">


                        <form class="mt-3 form-horizontal" method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-3 form-group row">
                                <div class="col-12">
                                    <input class="form-control" id="email" name="email" type="text"
                                        required="" placeholder="Email">
                                </div>
                            </div>

                            <div class="mb-3 form-group row">
                                <div class="col-12">
                                    <input class="form-control" id="password" name="password" type="password"
                                        required="" placeholder="Password">
                                </div>
                            </div>

                            <div class="mb-3 form-group row">
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox">

                                    </div>
                                </div>
                            </div>

                            <div class="pt-1 mt-3 mb-3 text-center form-group row">
                                <div class="col-12">
                                    <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Log
                                        In</button>
                                </div>
                            </div>

                            <div class="mt-2 mb-0 form-group row">
                                <div class="mt-3 col-sm-7">
                                    <a href="{{ route('password.request') }}" class="text-muted"><i
                                            class="mdi mdi-lock"></i> Forgot your password?</a>
                                </div>
                                <div class="mt-3 col-sm-5">
                                    <a href="{{ route('register') }}" class="text-muted"><i
                                            class="mdi mdi-account-circle"></i> Create an account</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- end -->
                </div>
                <!-- end cardbody -->
            </div>
            <!-- end card -->
        </div>
        <!-- end container -->
    </div>
    <!-- end -->

    <!-- JAVASCRIPT -->
    <script src="{{ asset('backend/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/node-waves/waves.min.js') }}"></script>

    <script src="{{ asset('backend/assets/js/app.js') }}"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;

                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;

                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;

                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
            }
        @endif
    </script>

</body>

</html>
