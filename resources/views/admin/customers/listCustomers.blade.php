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
                        <h4 class="mb-sm-0">Liste des clients</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            @include('admin.status')

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0"> </h5>
                        </div>
                        <div class="card-header border-bottom-dashed">

                            <div class="row g-4 align-items-center">
                                <div class="col-sm">
                                    <div>
                                        <h5 class="card-title mb-0"></h5>
                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                    <div class="d-flex flex-wrap align-items-start gap-2">
                                        <button class="btn btn-soft-danger" id="remove-actions" onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th></th>
                                        <th>CUSTOMER</th>
                                        <th>E-MAIL</th>
                                        <th>TÉLÉPHONE</th>
                                        <th>ADRESSE DE LIVRAISON</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($customers as $customer)
                                    <tr>
                                        <td></td>
                                        <td><img src="{{asset('/admin/assets/images/users/user-dummy-img.jpg')}}" height="30"></td>
                                        <td>{{ $customer->name_customer }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td>{{ $customer->phone }}</td>
                                        <td>{{ $customer->adresse }}</td>
                                        <!--<td>
                                            <ul class="list-inline hstack gap-2 mb-0">
                                                <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" aria-label="Edit" data-bs-original-title="Edit">
                                                    <a href="#editModal{{ $customer->id  }}" data-bs-toggle="modal" class="text-primary d-inline-block edit-item-btn">
                                                        <i class="ri-pencil-fill fs-16"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </td>-->
                                    </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end row-->


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
                        Design & Develop by etrapci-sarl
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- end main content-->
@foreach($customers as $customer)
<div class="modal fade" id="editModal{{ $customer->id  }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="exampleModalLabel">Modification des informations</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form class="tablelist-form" autocomplete="off" method="POST" action="/updateCustomer" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id-field" />
                    <div class="mb-3">
                        <input type="hidden" value="{{ $customer->id }}" name="id">
                        <label for="customername-field" class="form-label">Entreprise</label>
                        <input type="text" name="entreprise" value="{{ $customer->entreprise }}" class="form-control" required />
                        <div class="invalid-feedback">Please enter a customer name.</div>
                    </div>

                    <div class="mb-3">
                        <label for="customername-field" class="form-label">Nom du représentant</label>
                        <input type="text" name="representant" value="{{ $customer->representant }}" class="form-control"  required />
                        <div class="invalid-feedback">Please enter a customer name.</div>
                    </div>

                    <div class="mb-3">
                        <label for="email-field" class="form-label">Adresse e-mail</label>
                        <input type="email" name="email" value="{{ $customer->email }}"  class="form-control" required />
                        <div class="invalid-feedback">Please enter an email.</div>
                    </div>

                    <div class="mb-3">
                        <label for="phone-field" class="form-label">Téléphhone</label>
                        <input type="text" name="phone" value="{{ $customer->phone }}" class="form-control" required />
                        <div class="invalid-feedback">Please enter a phone.</div>
                    </div>

                    <div class="mb-3">
                        <label for="date-field" class="form-label">Adresse localisation</label>
                        <input type="text" name="adresse" value="{{ $customer->adresse }}" class="form-control" required />
                        <div class="invalid-feedback">Please select a date.</div>
                    </div>


                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-success" id="add-btn">Mise a jour </button>
                        <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

<div class="modal fade" id="showModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un client</h5>
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
                        <div class="invalid-feedback">Please enter an email.</div>
                    </div>

                    <div class="mb-3">
                        <label for="phone-field" class="form-label">Téléphhone</label>
                        <input type="text" name="phone" id="phone-field" class="form-control" placeholder="Enter phone no." required />
                        <div class="invalid-feedback">Please enter a phone.</div>
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
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-success" id="add-btn">Enregistrer</button>
                        <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection


