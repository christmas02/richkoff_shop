<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">


<!-- Mirrored from themesbrand.com/velzon/html/default/auth-signin-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Apr 2024 12:26:22 GMT -->
<head>

    <meta charset="utf-8" />
    <title>Richkof |  - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.ico">

    <!-- Layout config Js -->
    <script src="admin/assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="admin/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="admin/assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="admin/assets/css/custom.min.css" rel="stylesheet" type="text/css" />

</head>

<body>

<div class="auth-page-wrapper pt-5">

    <!-- auth page content -->
    <div class="auth-page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @include('admin.status')
                    <div class="text-center mt-sm-5 mb-4 text-white-50">
                        <div>
                            <a href="" class="d-inline-block auth-logo">
                                <img src="{{asset('/image/logo_dark.png')}}" alt="" height="100">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card mt-4">

                        <div class="card-body p-4">

                            <div class="p-2 mt-4">
                                <form action="/connexion" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="username" class="form-label fw-bold">Identifiant</label>
                                        <input type="text" name="email" class="form-control" id="username" placeholder="Enter username">
                                    </div>

                                    <div class="mb-3">
                                        <div class="float-end">
                                            <a href="/mot_de_passe_oublier" class="text-muted">Mot de passe oublier ?</a>
                                        </div>
                                        <label class="form-label" for="password-input fw-bold">Mot de passe</label>
                                        <div class="position-relative auth-pass-inputgroup mb-3">
                                            <input type="password" name="password" class="form-control pe-5 password-input" placeholder="Enter password" id="password-input">
                                            <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                        </div>
                                    </div>



                                    <div class="mt-4">
                                        <button class="btn btn-success btn-color-primary w-100" type="submit">Connexion</button>
                                    </div>


                                </form>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->

                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end auth page content -->

    <!-- footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">

                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->
</div>
<!-- end auth-page-wrapper -->

<!-- JAVASCRIPT -->
<script src="admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="admin/assets/libs/simplebar/simplebar.min.js"></script>
<script src="admin/assets/libs/node-waves/waves.min.js"></script>
<script src="admin/assets/libs/feather-icons/feather.min.js"></script>
<script src="admin/assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
<script src="admin/assets/js/plugins.js"></script>

<!-- particles js -->
<script src="admin/assets/libs/particles.js/particles.js"></script>
<!-- particles app js -->
<script src="admin/assets/js/pages/particles.app.js"></script>
<!-- password-addon init -->
<script src="admin/assets/js/pages/password-addon.init.js"></script>
</body>


<!-- Mirrored from themesbrand.com/velzon/html/default/auth-signin-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Apr 2024 12:26:23 GMT -->
</html>
