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

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Création d'un nouveau produit </h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <form id="createproduct-form" autocomplete="off" class="needs-validation" method="POST" action="/saveProduct" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label" for="product-title-input">Nom de produit</label>
                                    <input type="text" class="form-control" name="name" value="" required>
                                    <div class="invalid-feedback">Please Enter a product title.</div>
                                </div>
                                <div>
                                    <label>Description du produit</label>
                                    <textarea name="description" id="ckeditor-classic"> </textarea>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Image du produit</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-4">
                                    <div class="text-center">
                                        <div class="position-relative d-inline-block">
                                            <div class="position-absolute top-100 start-100 translate-middle">
                                                <label for="product-image-input" class="mb-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Select Image">
                                                    <div class="avatar-xs">
                                                        <div class="avatar-title bg-light border rounded-circle text-muted cursor-pointer">
                                                            <i class="ri-image-fill"></i>
                                                        </div>
                                                    </div>
                                                </label>
                                                <input class="form-control d-none" value="" id="product-image-input" name="picture" type="file" accept="image/png, image/gif, image/jpeg">
                                            </div>
                                            <div class="avatar-lg">
                                                <div class="avatar-title bg-light rounded">
                                                    <img src="#" id="product-img" class="avatar-md h-auto" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <div class="dropzone d-none">

                                    </div>

                                    <ul class="list-unstyled mb-0" id="dropzone-preview">
                                        <li class="mt-2" id="dropzone-preview-list">
                                            <!-- This is used as the file preview template -->
                                            <div class="border rounded">
                                                <div class="d-flex p-2">
                                                    <div class="flex-shrink-0 me-3">

                                                    </div>
                                                    <div class="flex-grow-1">

                                                    </div>

                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <!-- end dropzon-preview -->
                                </div>

                                <div class="item form-group">
                                    <label for="middle-name" class="col-form-label col-md-12 col-sm-12 label-align">"Choisissez 4 images de plus."</label>
                                    <div class="col-md-12 col-sm-12 ">
                                        <input id="imageInput2" type="file" name="images[]" maxlength="4" accept="image/*" class="form-control" multiple required>
                                        <p class="text-danger">NB : Vous pouvez choisir jusqu'à 4 photos de détail dans ce champ.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->

                        <div class="text-end mb-3">
                            <button type="submit" class="btn btn-success w-sm">Enregistrer</button>
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Catégoeie et sous catégorie</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="choices-publish-status-input" class="form-label">Catégorie</label>
                                    <select name="categorie" id="categorie" class="form-select">
                                        <option value="">--Choisir la Catégorie--</option>
                                        @foreach($categories as $categorie)
                                        <option value="{{ $categorie->id }}"> {{ $categorie->name }} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label for="choices-publish-visibility-input" class="form-label">Sous catégorie</label>
                                    <select name="souscategorie" id="souscategorie" class="form-select" >
                                        <option>--Sous categorie--</option>
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Quantite et prix</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label" for="product-title-input">Quantité</label>
                                    <input type="text" class="form-control d-none" id="product-id-input">
                                    <input type="number" class="form-control" name="quantity" value="" required>
                                    <div class="invalid-feedback">Please Enter a product title.</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="product-title-input">Montant</label>
                                    <input type="text" class="form-control d-none">
                                    <input type="number" class="form-control" name="amount" value=""  required>
                                    <div class="invalid-feedback">Please Enter a product title.</div>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->

            </form>


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

@section('extra-js')

@endsection


