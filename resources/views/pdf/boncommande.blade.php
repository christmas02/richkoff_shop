<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            background-color: #fff;
            margin: 0;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px;
        }

        .justify-content-center {
            justify-content: center !important;
        }

        .col-xxl-9 {
            flex: 0 0 auto;
            width: 100%;
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
        }

        .card-header {
            padding: .75rem 1.25rem;
            margin-bottom: 0;
            background-color: rgba(0, 0, 0, .03);
            border-bottom: 1px solid rgba(0, 0, 0, .125);
        }

        .border-bottom-dashed {
            border-bottom: 1px dashed rgba(0, 0, 0, .125);
        }

        .p-4 {
            padding: 1.5rem !important;
        }

        .d-flex {
            display: flex !important;
        }

        .flex-grow-1 {
            flex-grow: 1 !important;
        }

        .flex-shrink-0 {
            flex-shrink: 0 !important;
        }

        .mt-sm-5,
        .my-sm-5 {
            margin-top: 3rem !important;
        }

        .mt-4,
        .my-4 {
            margin-top: 1.5rem !important;
        }

        .mt-sm-0,
        .my-sm-0 {
            margin-top: 0 !important;
        }

        .mt-3,
        .my-3 {
            margin-top: 1rem !important;
        }

        .text-muted {
            color: #6c757d !important;
        }

        .text-uppercase {
            text-transform: uppercase !important;
        }

        .fw-semibold {
            font-weight: 600 !important;
        }

        .fw-normal {
            font-weight: 400 !important;
        }

        .mb-1,
        .my-1 {
            margin-bottom: .25rem !important;
        }

        .mb-0,
        .my-0 {
            margin-bottom: 0 !important;
        }

        .link-primary {
            color: #0d6efd;
            text-decoration: none;
        }

        .link-primary:hover {
            color: #0a58ca;
            text-decoration: underline;
        }

        .fs-14 {
            font-size: 14px !important;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
        }

        .table-borderless tbody+tbody {
            border-top: 0;
        }

        .text-center {
            text-align: center !important;
        }

        .table-nowrap {
            white-space: nowrap;
        }

        .align-middle {
            vertical-align: middle !important;
        }

        .mb-0,
        .my-0 {
            margin-bottom: 0 !important;
        }

        .table-active {
            background-color: rgba(0, 0, 0, .075);
        }

        .text-end {
            text-align: right !important;
        }

        .border-top {
            border-top: 1px solid #dee2e6 !important;
        }

        .border-top-dashed {
            border-top: 1px dashed rgba(0, 0, 0, .125) !important;
        }

        .fs-15 {
            font-size: 15px !important;
        }

        .ms-auto {
            margin-left: auto !important;
        }

        .alert {
            position: relative;
            padding: .75rem 1.25rem;
            margin-bottom: 1rem;
            border: 1px solid transparent;
            border-radius: .25rem;
        }

        .alert-info {
            color: #084298;
            background-color: #cff4fc;
            border-color: #b6effb;
        }

        .bg-success-subtle {
            background-color: #d1e7dd !important;
        }

        .text-success {
            color: #198754 !important;
        }

        .fs-11 {
            font-size: 11px !important;
        }
    </style>

</head>

<body>
<div class="">
    <div class="row justify-content-center">
        <div class="col-xxl-9">
            <div class="card" id="demo">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="border-bottom-dashed p-4">
                            <table class="table table-borderless">
                                <tr>
                                    <td class="align-top" style="width: 70%">
                                            <span style="height: 100px; width: 256px;">
                                                <img src="https://richkoff.com/assets/images_/commun/logo-bg-dark.png" class="card-logo card-logo-light" alt="logo light" height="50" />
                                            </span>
                                        <br><br>
                                        <div class="mt-sm-5 mt-4">
                                            <p class="text-muted mb-2 text-uppercase fw-semibold">Address</p>
                                            <h6 class="text-muted mb-1" id="address-details" style="margin: 5px;"> xxxxxxxxxxxxxxxxxx </h6>
                                            <h6 class="text-muted mb-0" id="zip-code" style="margin: 5px;"> xxxxxxxxxxxxxxxxx </h6>
                                        </div>
                                    </td>
                                    <td class="align-top" style="width: 30%">
                                        <h6 style="margin: 5px;"><span class="text-muted fw-normal">Registre de commerce:</span> xxxxxxxxxxxxx </h6>
                                        <h6 style="margin: 5px;"><span class="text-muted fw-normal">Email:</span> xxxxxxxxxxxxxxxx </h6>
                                        <h6 style="margin: 5px;"><span class="text-muted fw-normal">Site:</span> xxxxxxxxxxxxxxxxxxx </h6>
                                        <h6 class="mb-0" style="margin: 5px;"><span class="text-muted fw-normal">Contact: </span> xxxxxxxxxxxxxxx </h6>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="col-lg-12" style="margin-top: -15px;">
                        <div class="card-body p-4">
                            <table class="table table-borderless">
                                <tr>
                                    <td>
                                        <p class="text-muted mb-2 text-uppercase fw-semibold">N° facture</p>
                                        <h5 class="fs-14 mb-0">{{$data["id_boncommande"]}}</h5>
                                    </td>
                                    <td>
                                        <p class="text-muted mb-2 text-uppercase fw-semibold">Date</p>
                                        <h5 class="fs-14 mb-0"><span id="invoice-date">{{ date('d/m/Y') }}</span></h5>
                                    </td>

                                    <td>
                                        <p class="text-muted mb-2 text-uppercase fw-semibold">Montant total</p>
                                        <h5 class="fs-14 mb-0">{{$data["amount_ttc"]}}</h5>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="col-lg-12" style="margin-top: -15px;">
                        <div class="card-body p-4 border-top border-top-dashed">
                            <div>
                                <div class="col-6">
                                    <p class="text-muted mb-2 text-uppercase fw-semibold">ADRESSE DE FACTURATION</p>
                                </div>
                                <h6 style="margin: 5px;"><span class="text-muted fw-normal">{{$data["name_customer"]}}</span></h6>
                                <h6 style="margin: 5px;"><span class="text-muted fw-normal">{{$data["phone_customer"]}}</span></h6>
                                <h6 style="margin: 5px;"><span class="text-muted fw-normal">{{$data["email_customer"]}}</span></h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12" style="margin-top: -15px;">
                        <div class="card-body p-4">
                            <div class="table-responsive">
                                <table class="table table-borderless table-nowrap align-middle mb-0">
                                    <thead>
                                    <tr class="table-active">
                                        <th scope="col" style="width: 50px">#</th>
                                        <th scope="col">Produit Details</th>
                                        <th scope="col">Prix unitaire</th>
                                        <th scope="col">Quantité</th>
                                        <th scope="col" class="text-end">Montant</th>
                                    </tr>
                                    </thead>
                                    <tbody id="products-list">
                                    @foreach($data['products'] as $item)
                                    <tr>
                                        <th scope="row"></th>
                                        <td class="text-start">
                                            <span class="fw-medium">{{$item->name_product}}</span>
                                        </td>
                                        <td> {{ number_format($item->priceUnit) }} Fr CFA</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td class="text-end">{{ number_format($item->prices) }} Fr CFA</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="border-top border-top-dashed mt-2">
                                <table class="table table-borderless table-nowrap align-middle mb-0 ms-auto" style="width: 250px">
                                    <tbody>

                                    <tr class="border-top border-top-dashed fs-15">
                                        <th scope="row">Montant total</th>
                                        <th class="text-end"> {{ number_format($data['amount_ttc']) }} Fr CFA</th>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-12" style="margin-top: -15px;">
                        <div class="card-footer border-top border-top-dashed p-4">

                            <div class="alert alert-info">
                                <p class="mb-0">
                                    <span class="fw-semibold">NOTES:</span>
                                    <span id="note" class="fw-normal">Tous les comptes doivent être payés dans les 7 jours suivant la réception de la facture. A régler par chèque ou carte bancaire ou paiement direct en ligne. Si le compte n'est pas payé dans les 7 jours, les détails des crédits fournis comme confirmation du travail entrepris seront facturés aux frais convenus indiqués ci-dessus.</span>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>
