@extends('admin.layout')
@section('content')
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col">

                    <div class="h-100">
                        <div class="row mb-3 pb-1">
                            <div class="col-12">
                                <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                    <div class="flex-grow-1">
                                        <h4 class="fs-16 mb-1">Espace de gestion et d'administration !</h4>
                                        <p class="text-muted mb-0"> </p>
                                    </div>
                                </div><!-- end card header -->
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                        <div class="card">
                            <div class="card-header border-0 rounded">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                            <h4 class="mb-sm-0">Derniers produits ajouter</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col-xl-8">
                                        <div class="search-box">
                                            <input type="text" class="form-control" autocomplete="off" id="searchResultList" placeholder="Search for sellers & owner name or something..."> <i class="ri-search-line search-icon"></i>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <!--end col-->
                                    <div class="col-lg-auto">
                                        <div class="hstack gap-2">
                                            <button type="button" class="btn btn-danger"><i class="ri-equalizer-fill me-1 align-bottom"></i> Filters</button>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                                <hr>

                                <div class="row">

                                </div>

                            </div>
                        </div>



                        <div class="row">

                            <!-- end col -->
                        </div>

                        <div class="row">

                        </div> <!-- end row-->

                        <div class="row">

                        </div> <!-- end row-->

                    </div> <!-- end .h-100-->

                </div> <!-- end col -->

            </div>

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>document.write(new Date().getFullYear())</script> © Velzon.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Design & Develop by Richkoff
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- end main content-->
@endsection

