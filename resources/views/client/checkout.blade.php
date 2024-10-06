@extends('client.layout.header')
@section('content')
<div class="cs-height_150 cs-height_lg_80"></div>
<div class="container">
    <form method="post" name="formulaire1" action="/save_commande" class="info">
        @csrf
    <div class="row">
        <div class="col-xl-7">
            <div class="cs-height_40 cs-height_lg_40"></div>
            <h2 class="cs-checkout-title">Détails de votre commande</h2>
            <div class="cs-height_45 cs-height_lg_40"></div>
            <div class="row">
                <div class="col-lg-6">
                    <label class="cs-shop-label">Nom *</label>
                    <input type="text" name="username" class="cs-shop-input" />
                </div>
                <div class="col-lg-6">
                    <label class="cs-shop-label">Prénoms *</label>
                    <input type="text" name="firstname" class="cs-shop-input" />
                </div>
                <div class="col-lg-12">
                    <label class="cs-shop-label">Email *</label>
                    <input type="email" name="email" class="cs-shop-input" />
                </div>
                <div class="col-lg-12">
                    <label class="cs-shop-label">Contact *</label>
                    <input type="number" name="phone" class="cs-shop-input" />
                </div>
                <div class="col-lg-12">
                    <label class="cs-shop-label">Lieux de livraison *</label>
                    <input type="text" name="lieux_de_livraison" class="cs-shop-input" />
                </div>
            </div>
            <div class="cs-height_45 cs-height_lg_45"></div>
            <h2 class="cs-checkout-title">Informations complémentaires</h2>
            <div class="cs-height_30 cs-height_lg_30"></div>
            <label class="cs-shop-label"
            >S'il y'a des points à prendre en compte veuillez les signaler ici
                (optionel)</label
            >
            <textarea cols="30" rows="6" class="cs-shop-input" name="message"></textarea>
            <div class="cs-height_30 cs-height_lg_30"></div>
        </div>
        <div class="col-xl-5">
            <div class="cs-shop-side-spacing">
                <div class="cs-shop-card">
                    <h2>Votre commande</h2>

                    <table class="cs-white_color">
                        <tbody>
                        @foreach ($content as $item)
                        <tr class="cs-semi_bold">
                            <td>{{ $item->name }}</td>
                            <td class="text-end">{{ number_format($item->price * $item->quantity) }} Fr CFA</td>
                        </tr>
                        @endforeach


                        <tr class="cs-semi_bold">
                            <td>Total</td>
                            <td class="text-end">{{ number_format($total) }} Fr CFA</td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="cs-height_30 cs-height_lg_30"></div>
                    <button type="submit" class="cs-product_btn cs-semi_bold w-100 bg-dark">Procéder au paiement</button>
                </div>
                <div class="cs-height_50 cs-height_lg_30"></div>

                <div class="cs-height_30 cs-height_lg_30"></div>
            </div>
        </div>
    </div>
    </form>
</div>
<div class="cs-height_120 cs-height_lg_50"></div>
@endsection
