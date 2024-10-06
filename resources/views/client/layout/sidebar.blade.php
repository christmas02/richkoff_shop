<div class="cs-shop_sidebar">
    <div class="cs-shop_sidebar_widget">
        <img src="client/assets/images_/commun/logo.png" alt="" />
        <hr style="margin: 30%" />
        @foreach($categories as $categorie)
        <h2 class="cs-shop_sidebar_widget_title">{{ $categorie->name }}</h2>
        <ul class="cs-shop_sidebar_category_list">
            @foreach($categorie->sousCategorie as $souscategorie)
            <li><a href="/produits_de_la_souscategories/{{ $souscategorie->id }}/{{ $souscategorie->name }}">{{ $souscategorie->name }}</a></li>
            <!--<li><a href="{{ route('produitScat',['name' => $souscategorie->id, $categorie->code ]) }}">{{ $souscategorie->name }}</a></li>-->
            @endforeach
        </ul>
        <hr style="margin: 10%" />
        @endforeach
    </div>


</div>
