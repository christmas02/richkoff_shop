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
                        <h4 class="mb-sm-0">Détail commandes</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            @include('admin.status')
            <div class="row">
                <div class="col-xl-9">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h5 class="card-title flex-grow-1 mb-0">Commande N° # {{ $command['command']->identifiant_commande }}</h5>
                                <a href="{{asset('/invoices' )}}/{{ $command['command']->invoice }}" target="_blank"
                                   class="btn btn-success btn-sm"><i class="ri-download-2-fill align-middle me-1"></i> Commande</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table class="table table-nowrap align-middle table-borderless mb-0">
                                    <thead class="table-light text-muted">
                                    <tr>
                                        <th scope="col">Details Produit</th>
                                        <th scope="col">Prix unitaire</th>
                                        <th scope="col">Quantité</th>
                                        <th scope="col" class="text-end">Prix Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($command['products'] as $product)
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 avatar-md bg-light rounded p-1">
                                                    <img src="{{asset('uploads/'.$product['picture'])}}" alt="" class="img-fluid d-block">
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h5 class="fs-15"><a href="" class="link-primary">{{ $product['name'] }}</a></h5>
                                                    <p class="text-muted mb-0">Code Produit: <span class="fw-medium">{{ $product['code_product'] }}</span></p>

                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ number_format($product['priceUnit'] ) }} CFAs</td>
                                        <td>{{ $product['quantity'] }}</td>

                                        <td class="fw-medium text-end">
                                            {{ number_format($product['prices']) }} CFA
                                        </td>
                                    </tr>
                                    @endforeach

                                    <tr class="border-top border-top-dashed">
                                        <td colspan="3"></td>
                                        <td colspan="2" class="fw-medium p-0">
                                            <table class="table table-borderless mb-0">
                                                <tbody>

                                                <tr class="border-top border-top-dashed">
                                                    <th scope="row">TOTAL A PAYER (XOF) :</th>
                                                    <th class="text-end"> {{ number_format( $command['command']->amount ) }} CFA CFA</th>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--end card-->

                </div>
                <!--end col-->
                <div class="col-xl-3">

                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex">
                                <h5 class="card-title flex-grow-1 mb-0">Information du client</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled mb-0 vstack gap-3">
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <img src="{{asset('/admin/assets/images/users/user-dummy-img.jpg')}}" alt="" class="avatar-sm rounded">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="fs-14 mb-1">{{ $command['command']->username }}</h6>
                                            <p class="text-muted mb-0">{{ $command['command']->firstname }}</p>
                                        </div>
                                    </div>
                                </li>
                                <li><i class="ri-mail-line me-2 align-middle text-muted fs-16"></i>{{ $command['command']->email }}</li>
                                <li><i class="ri-phone-line me-2 align-middle text-muted fs-16"></i>{{ $command['command']->phone }}</li>
                            </ul>
                        </div>
                    </div>
                    <!--end card-->

                    <!--end card-->

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title flex-grow-1 mb-0">Statu de la commande</h5>
                        </div>
                        <div class="card-body">
                            <div class="flex-shrink-0 mt-2 mt-sm-0">
                                @if( $command['command']->send_mail == 1)
                                <div class=" justify-content-end">
                                    @if( $command['command']->statut == 0)
                                    <form action="/save/statucommande" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="choices-publish-status-input" class="form-label">Indiquer le statut </label>
                                            <input type="hidden" value=" {{ $products }} " name="products">
                                            <input type="hidden" value="{{ $command['command']->identifiant_commande }}" name="id_commande">
                                            <select name="statut" class="form-select">
                                                <option value="">--Choisir la Catégorie--</option>
                                                @foreach($status as $statu)
                                                <option value="{{ $statu['value'] }}"> {{ $statu['libel'] }} </option>
                                                @endforeach
                                            </select>
                                            <br>
                                            <button type="submit" class="btn btn-warning form-control"> <b>Validé</b>  </button>
                                        </div>
                                    </form>
                                    @elseif( $command['command']->statut == 1)
                                    <h5 class="text-bg-success p-md-2">
                                        Ce bon de commande a été executé !
                                    </h5>
                                    @elseif( $command['command']->statut == 11)
                                    <h5 class="text-bg-danger p-md-2">
                                        Ce bon de commande a été Annulée !
                                    </h5>
                                    @endif
                                </div>
                                @else
                                <div class="">
                                    <h5 class="text-bg-danger p-md-2">
                                        Ce bon de commande na pas été transmis au client !
                                    </h5>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!--end card-->



                </div>
                <!--end col-->
            </div>
            <!--end row-->



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


