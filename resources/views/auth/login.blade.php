<html style="height: auto;">

<head>
    <meta charset="utf-8">
    <meta content="noindex, nofollow" name="robots">
    <meta content="PUP Portal" name="Description">
    <meta content="PUP Portal" name="abstract">
    <meta content="PUP" name="author">
    <meta content="Polytechnic University of the Philippines" name="copyright">
    <meta content="Higher Education" name="category">
    <meta content="" name="timestamp">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>STIHS</title>
    <link href="logo\stihslogo.png" rel="icon" type="image/x-icon">

    <!--<link href="https://cdn.pup.edu.ph/frameworks/adminlte3.0.5/dist/css/adminlte.min.css" rel="stylesheet" />-->
    <link href="https://sis8.pup.edu.ph/student/assets/admin/dist/css/adminlte.min.css" rel="stylesheet">

    <link href="https://cdn.pup.edu.ph/css/si.css" rel="stylesheet">

    <!--<link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/044ae73695.js" crossorigin="anonymous"></script>
    <script src="https://sis8.pup.edu.ph/student/assets/admin/plugins/fontawesome/044ae73695.js"></script>
    -->

    <link href="https://sis8.pup.edu.ph/student/assets/admin/plugins/ionicons/css/ionicons.min.css" rel="stylesheet">

</head>

<body class="fixed sidebar-collapse" style="height: auto;">

    <div class="wrapper">
        <div class="content-wrapper" style="min-height: 738px;">
            <div id="" class="bgslider" style="background-image: url('logo/stihs_background.jpg');">
                <div class="col-md-4 card frost">
                    <div class="toplayer login-card-body">
                        <div class="box-header with-border">
                            <div class="mb-2 text-center">
                                <img alt="PUP" class="img-circle" src="logo\stihslogo.png"
                                    style="width: 100px; height: auto;">
                            </div>
                            <h2 class="text-center box-title"><strong>STIHS</strong> Inventory System <sup
                                    class="text-sm font-weight-lighter"></sup></h2>
                        </div>
                        <div class="box-body login-box-msg">
                            <section id="introduction">
                                <p>Log in your account</p>
                            </section>
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
                                        <a href="{{ route('password.request') }}" class="text-muted">
                                            <i class="mdi mdi-lock" class="text-danger"></i> Forgot your password?</a>
                                    </div>
                                    <div class="mt-3 col-sm-5">
                                        <a href="{{ route('register') }}" class="text-muted"><i
                                                class="mdi mdi-account-circle"></i> Create an account</a>
                                    </div>

                                    <br>    <br>
            <div class="mt-2 row">


                </div>
                <div class="col-12">
                    <br>
                       <b>You can also visit<br>
                            <a href="https://www.facebook.com/profile.php?id=100063896989147"></i> Facebook</a></b>


                </div>

            </div>
            <br>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <script src="https://sis8.pup.edu.ph/student/assets/admin/plugins/jquery/jquery-3.7.0.min.js"></script>

        <script src="https://sis8.pup.edu.ph/student/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

        <script src="https://sis8.pup.edu.ph/student/assets/admin/plugins/select2/js/select2.full.min.js"></script>

        <script src="https://sis8.pup.edu.ph/student/assets/admin/dist/js/adminlte.min.js"></script>

        <script src="https://sis8.pup.edu.ph/student/assets/admin/plugins/js/si.js"></script>
        <script src="https://sis8.pup.edu.ph/student/assets/js/authentication/login.js"></script>


    </div>
</body>

</html>
