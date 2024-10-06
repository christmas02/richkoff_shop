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
                        <h4 class="mb-sm-0">Ajouter un administrateur</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            @include('admin.status')

            <form id="createproduct-form" autocomplete="off" class="needs-validation" method="POST" action="/save/administrateur" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label" for="product-title-input">Nom et Prénom</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="product-title-input">Adresse Élèctronique</label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="product-title-input">Numéro de téléphone</label>
                                    <input type="number" class="form-control" name="phone" value="{{ old('phone') }}" required>
                                    @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="choices-publish-status-input" class="form-label">Role de l'administrateur</label>
                                    <select name="role" class="form-select">
                                        @foreach($roles as $role)
                                        <option value="{{ $role['value'] }}"> {{ $role['libel'] }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="product-title-input">Mot de passe </label>
                                    <input type="password" class="form-control" name="password" value="{{ old('password') }}" required>
                                    @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="product-title-input">Confirmation du mot de passe</label>
                                    <input type="password" class="form-control" name="password_confirmation"  required>

                                </div>


                            </div>
                            <!-- end card body -->


                        </div>
                        <!-- end card -->

                        <div class="text-end mb-3">
                            <button type="submit" class="btn btn-success w-sm">Enregistrer</button>
                        </div>
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

<div class="modal fade" id="showModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form class="tablelist-form" autocomplete="off" method="POST" action="/saveCustomer" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id-field" />
                    <div class="mb-3">
                        <label for="customername-field" class="form-label">Entreprise</label>
                        <input type="text" name="entreprise" id="customername-field" class="form-control" placeholder="Enter name" required />
                        <div class="invalid-feedback">Please enter a customer name.</div>
                    </div>

                    <div class="mb-3">
                        <label for="customername-field" class="form-label">Nom du représentant</label>
                        <input type="text" name="representant" id="customername-field" class="form-control" placeholder="Enter name" required />
                        <div class="invalid-feedback">Please enter a customer name.</div>
                    </div>

                    <div class="mb-3">
                        <label for="email-field" class="form-label">Adresse e-mail</label>
                        <input type="email" name="email" id="email-field" class="form-control" placeholder="Enter email" required />

                    </div>

                    <div class="mb-3">
                        <label for="phone-field" class="form-label">Téléphhone</label>
                        <input type="text" name="phone" id="phone-field" class="form-control" placeholder="Enter phone no." required />

                    </div>

                    <div class="mb-3">
                        <label for="date-field" class="form-label">Adresse localisation</label>
                        <input type="text" name="adresse" id="date-field" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" required placeholder="Select date" />
                        <div class="invalid-feedback">Please select a date.</div>
                    </div>

                    <div class="mb-3">
                        <label for="phone-field" class="form-label">Logo de l'entreprise</label>
                        <input type="file" name="picture" id="phone-field" class="form-control" placeholder="Enter phone no." />
                        <div class="invalid-feedback">Please enter a phone.</div>
                    </div>

                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-success" id="add-btn">Enregistrer</button>
                        <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection


