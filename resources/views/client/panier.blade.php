@extends('client.layout.header')
@section('content')
<div class="cs-height_150 cs-height_lg_80"></div>
<div class="container">
    <div class="row">
        <div class="col-xl-8">
            <div class="table-responsive">
                <table class="cs-cart_table">
                    <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Soustotal</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($content as $item)
                    <tr>
                        <td>
                            <div class="cs-cart_table_media">
                                <img src="{{ env('IMAGES_PATH') }}/{{ $item->picture }}" alt="Thumb" />
                                <h3>{{ $item->name }}</h3>
                            </div>
                        </td>
                        <td>{{ number_format($item->price) }}  Fr CFA</td>
                        <td>
                            <div class="cs-quantity">
                                <input type="text" hidden value="{{ $item->id }}" name="productId">

                                <input type="number" class="cs-quantity_input"
                                       id="quantity" name="quantity"
                                       value="{{ $item->quantity }}" min="1"
                                       onchange="updateQuantity(event, {{ $item->id }})">

                            </div>
                        </td>
                        <td>{{ number_format($item->price * $item->quantity) }} Fr CFA</td>
                        <td class="text-center">
                            <form action="/delet_produit" method="POST">
                                @csrf
                                <input type="text" hidden value="{{ $item->id }}" name="id">
                                <button type="submit"class="btn btn-danger rounded-0 btn-ecomm cs-cart-table-close">  <i class="fa-solid fa-xmark"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach<!-- END TR-->


                    </tbody>
                </table>
            </div>
            <div class="cs-height_5 cs-height_lg_5"></div>
            <div class="cs-cart-offer">
                <div>
                    <a href="/" class="cs-product_btn cs-semi_bold bg-dark"
                    >Continuer mes achats</a
                    >
                </div>
            </div>
            <div class="cs-height_30 cs-height_lg_30"></div>
        </div>
        <div class="col-xl-4">
            <div class="cs-shop-side-spacing">
                <div class="cs-shop-card">
                    <h2>Total de mes achats</h2>
                    <table class="cs-white_color">
                        <tbody>
                        <tr>
                            <td class="cs-semi_bold">Soustotal</td>
                            <td class="text-end">{{ number_format($total) }} Fr CFA</td>
                        </tr>
                        <tr class="cs-semi_bold">
                            <td>Total</td>
                            <td class="text-end">{{ number_format($total) }} Fr CFA</td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="cs-height_30 cs-height_lg_30"></div>
                    <a href="/checkout" class="cs-product_btn cs-semi_bold w-100 bg-dark">Procédez à l'achat</a>
                </div>
                <div class="cs-height_30 cs-height_lg_30"></div>
            </div>
        </div>
    </div>
</div>
<div class="cs-height_150 cs-height_lg_80"></div>
@endsection
@section('javascript')

@endsection
