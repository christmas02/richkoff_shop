@extends('client.layout.header')
@section('content')
<div class="cs-height_150 cs-height_lg_80"></div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2">
            @include('client.layout.sidebar')
        </div>
        <div class="col-lg-10">
            <div class="cs-height_0 cs-height_lg_60"></div>
            <div class="row">
                @if($products)
                @foreach($products as $product)
                    @if( $product['quantity'] != 0 )
                        <div class="col-lg-4 col-sm-6">
                            <div class="cs-product_card cs_style_1">
                                <div class="cs-product_thumb">
                                    <img src="{{ env('IMAGES_PATH') }}/{{ $product['picture'] }}" alt="Product" />
                                    <div class="cs-product_overlay"></div>
                                    <div class="cs-card_btns">
                                        <a href="{{ route('show',['code_product' => $product['code_product']]) }}">
                                            <svg
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <g clip-path="url(#a1)">
                                                    <path
                                                        d="M7 18C5.9 18 5.01 18.9 5.01 20C5.01 21.1 5.9 22 7 22C8.1 22 9 21.1 9 20C9 18.9 8.1 18 7 18ZM1 2V4H3L6.6 11.59L5.25 14.04C5.09 14.32 5 14.65 5 15C5 16.1 5.9 17 7 17H19V15H7.42C7.28 15 7.17 14.89 7.17 14.75L7.2 14.63L8.1 13H15.55C16.3 13 16.96 12.59 17.3 11.97L20.88 5.48C20.96 5.34 21 5.17 21 5C21 4.45 20.55 4 20 4H5.21L4.27 2H1ZM17 18C15.9 18 15.01 18.9 15.01 20C15.01 21.1 15.9 22 17 22C18.1 22 19 21.1 19 20C19 18.9 18.1 18 17 18Z"
                                                        fill="currentColor"
                                                    />
                                                </g>
                                                <defs>
                                                    <clipPath id="a1">
                                                        <rect width="24" height="24" fill="currentColor" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <div class="cs-product_info text-center">
                                    <h2 class="cs-product_title"><a href="#">{{ $product['name'] }}</a></h2>
                                    <p class="cs-product_price">Prix: {{ number_format($product['amount'] ) }}  Fr CFA</p>
                                </div>
                            </div>
                            <div class="cs-height_55 cs-height_lg_25"></div>
                        </div>
                    @else

                    @endif
                @endforeach
                @else
                <h1><center>Aucun produit disponible </center></h1>
                @endif
            </div>

            <ul class="cs-pagination_box cs-white_color cs-mp0 cs-semi_bold">
                <li>
                    <a class="cs-pagination_item cs-center active" href="blog.html"
                    >1</a
                    >
                </li>
                <li>
                    <a class="cs-pagination_item cs-center" href="blog.html">2</a>
                </li>
                <li>
                    <a class="cs-pagination_item cs-center" href="blog.html">3</a>
                </li>
                <li>
                    <a href="#" class="cs-pagination_item cs-center">
                        <svg
                            width="7"
                            height="12"
                            viewBox="0 0 7 12"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M0 1.272L4.55116 6L0 10.728L1.22442 12L7 6L1.22442 0L0 1.272Z"
                                fill="currentColor"
                            ></path>
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="cs-height_150 cs-height_lg_80"></div>
@endsection
