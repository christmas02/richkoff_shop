@extends('client.layout.header')
@section('content')
<div class="cs-height_150 cs-height_lg_80"></div>
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="cs-single_product_thumb">
                <div class="cs-single_product_thumb_item">
                    <img src="{{ env('IMAGES_PATH') }}/{{ $product['picture'] }}" alt="Thumb" />
                </div>
                @foreach($product['galerie'] as $items)
                <div class="cs-single_product_thumb_item">
                    <img src="{{ env('IMAGES_PATH') }}/{{ $items->image }}" alt="Thumb" />
                </div>
                @endforeach

            </div>
            <div class="cs-single_product_nav">
                <div class="cs-single_product_thumb_mini">
                    <img src="{{ env('IMAGES_PATH') }}/{{ $product['picture'] }}" alt="Thumb" />
                </div>
                @foreach($product['galerie'] as $items)
                <div class="cs-single_product_thumb_item">
                    <img src="{{ env('IMAGES_PATH') }}/{{ $items->image }}" alt="Thumb" />
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-lg-6">
            <div class="cs-single-product-details">
                <h2>{{ $product['name'] }}</h2>
                <div class="cs-single_product-price_review">
                    <div class="cs-single_product_price cs-accent_color cs-primary_font cs-semi_bold">
                        {{ number_format($product['amount'] ) }}  Fr CFA
                    </div>
                </div>
                <div class="cs-height_25 cs-height_lg_25"></div>
                <div class="cs-single-product-details-text">
                    {!! $product['description'] !!}
                </div>
                <div class="cs-height_35 cs-height_lg_35"></div>
                <div class="cs-quantity_and_btn">
                    <form class="mt-3" method="POST" action="/add_cart">
                        @csrf
                        <div class="box-quantity">
                            <input type="hidden" id="id" name="id" value="{{ $product['id'] }}">
                            <input id="quantity" hidden="" name="quantity" type="number" value="1" min="1">
                            <input type="submit" class="cs-product_btn cs-semi_bold bg-dark" value="Ajouter au panier">
                        </div>
                    </form>
                </div>
                <div class="cs-height_40 cs-height_lg_30"></div>
                <ul class="cs-single_product_info">
                    <li><b>identifiant: </b>{{ $product['code_product'] }}</li>
                    <li><b>Categories: </b>{{ $product['category'] }}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="cs-height_100 cs-height_lg_60"></div>
    <div class="cs-product_meta_info">
        <div class="cs-tabs cs-style1">
            <ul class="cs-tab_links cs-product_tab cs-primary_font cs-semi_bold">
                <li class="active"><a href="#tab_1">Description</a></li>
                <li><a href="#tab_2">Additional information</a></li>
            </ul>
            <div class="cs-height_50 cs-height_lg_40"></div>
            <div class="cs-tab_body">
                <div class="cs-tab active" id="tab_1">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Vestibulum sagittis orci ac odio dictum tincidunt. Donec ut metus
                    leo. Class aptent taciti sociosqu ad litora torquent per conubia
                    nostra, per inceptos himenaeos. Sed luctus, dui eu sagittis
                    sodales, nulla nibh sagittis augue, vel porttitor diam enim non
                    metus. Vestibulum aliquam augue neque. Phasellus tincidunt odio
                    eget ullamcorper efficitur. Cras placerat ut turpis pellentesque
                    vulputate. Nam sed consequat tortor. Curabitur finibus sapien
                    dolor. Ut eleifend tellus nec erat pulvinar dignissim. Nam non
                    arcu purus. Vivamus et massa massa.
                </div>
                <!-- .cs-tab -->
                <div class="cs-tab" id="tab_2">
                    <table class="m-0">
                        <tbody>
                        <tr>
                            <td>Color</td>
                            <td>Blue, Gray, Green, Red, Yellow</td>
                        </tr>
                        <tr>
                            <td>Size</td>
                            <td>Large, Medium, Small</td>
                        </tr>
                        </tbody>
                    </table>
                    <hr />
                </div>
                <!-- .cs-tab -->
            </div>
            <!-- .cs-tab_body -->
        </div>
        <!-- .cs-tabs -->
    </div>
</div>
<div class="cs-height_150 cs-height_lg_80"></div>
@endsection
