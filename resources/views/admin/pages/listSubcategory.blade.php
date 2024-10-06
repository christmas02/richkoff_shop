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
                        <h4 class="mb-sm-0">Liste des sous catégories</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            @include('admin.status')

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"> Ajouter une sous catégorie </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date de création</th>
                                        <th>Nom de la sous catégorie</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($souscategorie as $categorie)
                                    <tr>
                                        <td></td>
                                        <td>{{ $categorie->created_at }}</td>
                                        <td>{{ $categorie->name }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <div class="edit">
                                                    <button type="button" class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#update{{ $categorie->id }}"> Modifier </button>
                                                </div>
                                                <div class="remove">
                                                    <a href="#" data-bs-toggle="modal"  data-bs-target="#remove{{ $categorie->id }}" class="btn btn-sm btn-danger edit-item-btn"> Supprimer</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td></td>
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

    <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                </div>
                <form class="tablelist-form" action="/saveSouscategory" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="email-field" class="form-label">Choix de la catégorie</label>
                            <select class="js-example-basic-single" name="id_category">
                                @foreach($categories as $categorie)
                                <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="email-field" class="form-label">Nom de la sous catégorie</label>
                            <input type="text" name="nom_subcategory"  class="form-control" placeholder="Nom de la catégorie" required />
                            <div class="invalid-feedback">Entrée le nom de la categorie.</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" id="add-btn">Enregistrer</button>
                            <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                        </div>
                    </div>
                </form class="tablelist-form">
            </div>
        </div>
    </div>
    @foreach($souscategorie as $value)
    <div class="modal fade" id="update{{ $value->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel">Modification</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                </div>
                <form class="tablelist-form" action="/updateSouscategory" method="POST">
                    @csrf
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="email-field" class="form-label">Nom de la sous catégorie</label>
                            <input type="hidden" value="{{ $value->id }}" name="id_subcategory">
                            <input type="text" name="nom_subcategory"  class="form-control" value="{{ $value->name }}" required />
                            <div class="invalid-feedback">Entrée le nom de la categorie.</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" id="add-btn">Enregistrer</button>
                            <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                        </div>
                    </div>
                </form class="tablelist-form">
            </div>
        </div>
    </div>
    @endforeach

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


