<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
<!-- Mirrored from themesbrand.com/velzon/html/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Apr 2024 12:18:09 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Dashboard | Velzon - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="P" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.ico">
    <!--datatable css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <!--datatable responsive css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Plugins css -->
    <link href="{{asset('/admin/assets/libs/dropzone/dropzone.css')}}" rel="stylesheet" type="text/css" />
    <!-- Layout config Js -->
    <script src="{{asset('/admin/assets/js/layout.js')}}"></script>
    <!-- Bootstrap Css -->
    <link href="{{asset('/admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('/admin/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('/admin/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{asset('/admin/assets/css/custom.min.css')}}" rel="stylesheet" type="text/css" />

    <!--datatable css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <!--datatable responsive css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

</head>

@yield('content')

<body>

<!-- Begin page -->
<div id="layout-wrapper">
    @include('admin.header');

    <!-- removeNotificationModal -->

    @include('admin.sidebar');

    <!--modals profile for user-->
    <div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Modification du profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/update/profiluser" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <div class="profile-user position-relative d-inline-block mx-auto mb-4">
                                        @if(Auth::user()->picture != NULL)
                                        <img class="rounded-circle header-profile-user avatar-xl img-thumbnail" src="{{ env('IMAGES_PATH') }}/{{ Auth::user()->picture  }}" alt="User Avatar">
                                        <!-- <img class="rounded-circle header-profile-user" src="{{ asset('storage/' . Auth::user()->picture) }}" alt="User Avatar"> -->

                                        @else
                                        <img class="rounded-circle header-profile-user avatar-xl img-thumbnail" src="{{asset('/admin/assets/images/users/avatar-1.jpg')}}" alt="User Avatar">
                                        @endif
                                        <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                            <input id="profile-img-file-input" name="file" type="file" class="profile-img-file-input">
                                            <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                                    <span class="avatar-title rounded-circle bg-light text-body">
                                                        <i class="ri-camera-fill"></i>
                                                    </span>
                                            </label>
                                        </div>
                                    </div>
                                    <h5 class="fs-16 mb-1">{{ auth()->user()->name }}</h5>
                                    <p class="text-muted mb-0">Lead Designer / Developer</p>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-xxl-12">
                                <div>
                                    <label for="firstName" class="form-label">Utilisateur</label>
                                    <input type="hidden" name="id" value="{{ auth()->user()->id }}">
                                    <input type="text" name="name" class="form-control" id="firstName" value="{{ auth()->user()->name }}">
                                </div>
                            </div><!--end col-->
                            <!-- <div class="col-xxl-6">
                                <div>
                                    <label for="lastName" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" placeholder="Enter lastname">
                                </div>
                            </div>end col -->
                            <!-- <div class="col-lg-12">
                                <label for="genderInput" class="form-label">Gender</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                        <label class="form-check-label" for="inlineRadio1">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                        <label class="form-check-label" for="inlineRadio2">Female</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                        <label class="form-check-label" for="inlineRadio3">Others</label>
                                    </div>
                                </div>
                            </div>end col -->
                            <div class="col-xxl-12">
                                <div>
                                    <label for="emailInput" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="emailInput" value="{{ auth()->user()->email }}">
                                </div>
                            </div><!--end col-->
                            <div class="col-xxl-6">
                                <div>
                                    <label for="phoneInput" class="form-label">Téléphone</label>
                                    <input type="phone" name="phone" class="form-control" id="phoneInput" value="{{ auth()->user()->phone }}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-primary">Sauvegarder</button>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--modals pour modifier le mot de passe-->
    <div class="modal fade" id="passwordModalgrid" tabindex="-1" aria-labelledby="passwordModalgridLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Modification du mot de passe</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/update/changePasswordUser" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="">
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <div class="profile-user position-relative d-inline-block mx-auto mb-4">
                                        @if(Auth::user()->picture != NULL)
                                        <img class="rounded-circle header-profile-user avatar-xl img-thumbnail" src="{{ env('IMAGES_PATH') }}/{{ Auth::user()->picture  }}" alt="User Avatar">
                                        <!-- <img class="rounded-circle header-profile-user" src="{{ asset('storage/' . Auth::user()->picture) }}" alt="User Avatar"> -->

                                        @else
                                        <img class="rounded-circle header-profile-user avatar-xl img-thumbnail" src="{{asset('/admin/assets/images/users/avatar-1.jpg')}}" alt="User Avatar">
                                        @endif
                                        <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                            <input id="profile-img-file-input" type="file" class="profile-img-file-input">
                                        </div>
                                    </div>
                                    <h5 class="fs-16 mb-1">{{ auth()->user()->name }}</h5>
                                    <p class="text-muted mb-0">Lead Designer / Developer</p>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3">

                            <div class="mb-3">
                                <label class="form-label" for="password-input">Nouveau mot de passe</label>
                                <div class="position-relative auth-pass-inputgroup">
                                    <input type="password" name="password" class="form-control pe-5 password-input" placeholder="Enter password" id="password-input" aria-describedby="passwordInput" required>
                                    <input type="hidden" name="id" value="{{ auth()->user()->id }}">
                                    <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                </div>
                                <div id="passwordInput" class="form-text">Doit contenir au moins 8 caractères.</div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="confirm-password-input">Confirmer mot de passe</label>
                                <div class="position-relative auth-pass-inputgroup mb-3">
                                    <input type="password" name="password_confirmation" class="form-control pe-5 password-input" placeholder="Confirm password" required>
                                    <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="confirm-password-input"><i class="ri-eye-fill align-middle"></i></button>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-primary">Sauvegarder</button>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </form>
                </div>
            </div>
        </div>
    </div>



</div>
<!-- END layout-wrapper -->

<!--start back-to-top-->
<button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
    <i class="ri-arrow-up-line"></i>
</button>
<!--end back-to-top-->

<!--preloader-->
<div id="preloader">
    <div id="status">
        <div class="spinner-border text-primary avatar-sm" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
</div>
@stack('scripts')
<!--jquery cdn-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!-- function Js de traitement de categorie et sous categorie -->
<script>
    $(document).ready(function() {
        $('#categorie').on('change', function(e) {
            console.log(e);
            var cat_id = e.target.value;
            //ajax
            $.get('/ajax_souscategorie?cat_id=' + cat_id, function(data) {
                //success data
                console.log(data);
                $('#souscategorie').empty();
                $.each(data, function(index, subcatObj) {
                    $('#souscategorie').append('<option value="' + subcatObj.id + '">' + subcatObj.name + '</option>');
                });
            });
        });

    })
</script>


<!-- JAVASCRIPT -->
<script src="{{asset('/admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('/admin/assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('/admin/assets/libs/node-waves/waves.min.js')}}"></script>
<script src="{{asset('/admin/assets/libs/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('/admin/assets/js/pages/plugins/lord-icon-2.1.0.js')}}"></script>
<script src="{{asset('/admin/assets/js/plugins.js')}}"></script>
<!-- Dashboard init -->
<script src="{{asset('/admin/assets/js/pages/dashboard-ecommerce.init.js')}}"></script>

<!--datatable js-->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script src="{{asset('/admin/assets/js/pages/datatables.init.js')}}"></script>



<!--jquery cdn-->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
<!--select2 cdn-->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{asset('/admin/assets/js/pages/select2.init.js')}}"></script>
<!-- ckeditor -->
<script src="{{asset('/admin/assets/libs/%40ckeditor/ckeditor5-build-classic/build/ckeditor.js')}}"></script>
<!-- dropzone js -->
<script src="{{asset('/admin/assets/libs/dropzone/dropzone-min.js')}}"></script>
<script src="{{asset('/admin/assets/js/pages/ecommerce-product-create.init.js')}}"></script>

<!-- dropzone min -->
<script src="{{asset('/admin/assets/libs/dropzone/dropzone-min.js')}}"></script>

<!-- cleave.js -->
<script src="{{asset('/admin/assets/libs/cleave.js/cleave.min.js')}}"></script>

<!--Invoice create init js-->
<script src="{{asset('/admin/assets/js/pages/invoicecreate.init.js')}}"></script>

<!-- Sweet Alerts js -->
<script src="{{asset('/admin/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>

<!-- ecommerce product details init -->
<script src="{{asset('/admin/assets/js/pages/ecommerce-product-details.init.js')}}"></script>
<!-- profile-setting init js -->
<script src="{{asset('/admin/assets/js/pages/profile-setting.init.js')}}"></script>
<!-- password-addon init -->
<script src="{{asset('/admin/assets/js/pages/passowrd-create.init.js')}}"></script>
<!-- App js -->
<script src="{{asset('/admin/assets/js/app.js')}}"></script>

</body>
<!-- Mirrored from themesbrand.com/velzon/html/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Apr 2024 12:22:31 GMT -->

</html>
