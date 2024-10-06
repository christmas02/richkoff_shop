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
                        <h4 class="mb-sm-0">Liste des produits</h4>
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
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <td></td>
                                        <th>Nom du product</th>
                                        <th>Code produit</th>
                                        <th>Montant</th>
                                        <th>Catégorie</th>
                                        <th>Sous catégorie</th>
                                        <th>Quantité en stock</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($produits as $produit)
                                    <tr>
                                        <td>{{ $produit['code_product'] }}</td>
                                        <td><img src="{{asset('uploads/'.$produit['picture'])}}"  style="width:42px; height:42px;"></td>
                                        <td>{{ $produit['name'] }}</td>
                                        <td> <b> {{ $produit['code_product'] }} </b> </td>
                                        <td> {{ number_format($produit['amount'] ) }} CFA</td>
                                        <td>{{ $produit['category'] }}</td>
                                        <td>{{ $produit['subcategory'] }}</td>
                                        <td>
                                            @if( $produit['quantity'] <= 5 )
                                            <p class="btn btn-sm btn-soft-danger">{{ $produit['quantity'] }} stocks</p>
                                            @else
                                            <p class="btn btn-sm btn-soft-success">{{ $produit['quantity'] }} stocks</p>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <div class="edit">
                                                    <a href="/detail/product/{{ $produit['code_product'] }}" class="btn btn-sm btn-success edit-item-btn">Voire</a>
                                                </div>
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
                        Design & Develop by Richkoff
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- end main content-->


@endsection

