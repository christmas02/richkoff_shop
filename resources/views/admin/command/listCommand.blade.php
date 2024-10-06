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
                        <h4 class="mb-sm-0">Liste des commandes</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0"> </h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ID</th>
                                        <th>CLIENTS</th>
                                        <th>E-MAIL</th>
                                        <th>TÉLÉPHONE</th>
                                        <th>DATE DE COMMANDE</th>
                                        <th>STATUS COMMANDE</th>
                                        <th>ACTION</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($commands as $command)
                                    <tr>
                                        <td></td>
                                        <td> {{ $command->identifiant_commande }} </td>
                                        <td>{{ $command->username }} {{ $command->firstname }} </td>
                                        <td> {{ $command->email }} </td>
                                        <td> {{ $command->phone }} </td>
                                        <td> {{ $command->created_at }}  </td>
                                        <td>
                                            @if($command->statut == 0)
                                            <p class="btn btn-sm btn-soft-danger">TRAITEMENT EN COURS</p>
                                            @elseif($command->statut == 11)
                                            <p class="btn btn-sm btn-soft-warning">COMMANDE ANNULER</p>
                                            @elseif($command->statut == 1)
                                            <p class="btn btn-sm btn-soft-success">COMMANDE TRAITER</p>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a class="btn btn-sm btn-success edit-item-btn" href="/detail/commande/{{ $command->identifiant_commande }}" ><i class="ri-eye-fill align-bottom me-2 "></i>
                                                    Voir</a>
                                            </div>
                                        </td>

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
@endsection


