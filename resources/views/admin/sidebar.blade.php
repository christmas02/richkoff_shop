<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{asset('/site/img/logo/logo.png')}}" alt="" height="22">
                    </span>
            <span class="logo-lg">
                        <img src="{{asset('/site/img/logo/logo.png')}}" alt="" height="17">
                    </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{asset('/site/img/logo/logo-footer.png')}}" alt="" height="17ss">
                    </span>
            <span class="logo-lg">
                        <img src="{{asset('/site/img/logo/logo-footer.png')}}" alt="" height="50">
                    </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>

            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" role="button" aria-expanded="false" aria-controls="sidebarUI">
                        <i class="ri-pencil-ruler-2-line"></i> <span data-key=""> <b>Tableau de brod</b> </span>
                    </a>
                    <div class="col-lg-12">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="/espace/administrateur" class="nav-link" data-key="t-alerts">Tableau de bord</a>
                            </li>
                        </ul>
                    </div>

                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" role="button" aria-expanded="false" aria-controls="sidebarUI">
                        <i class="ri-pencil-ruler-2-line"></i> <span data-key=""> <b>Gestion commandes</b> </span>
                    </a>
                    <div class="col-lg-12">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="/list/command" class="nav-link" data-key="t-badges">Liste des commande</a>
                            </li>
                            <li class="nav-item">
                                <a href="/list/client" class="nav-link" data-key="t-badges">Liste des clients</a>
                            </li>
                        </ul>
                    </div>

                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" role="button" aria-expanded="false" aria-controls="sidebarUI">
                        <i class="ri-pencil-ruler-2-line"></i> <span data-key=""> <b>Gestion du stock</b> </span>
                    </a>

                    <div class="col-lg-12">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="/create/product" class="nav-link" data-key="t-alerts">Ajouter un produit</a>
                            </li>
                            <li class="nav-item">
                                <a href="/list/product" class="nav-link" data-key="t-badges">Liste des produits</a>
                            </li>
                            <li class="nav-item">
                                <a href="/list/categorie" class="nav-link" data-key="t-badges">Liste des catégorie</a>
                            </li>
                            <li class="nav-item">
                                <a href="/list/sous/categorie" class="nav-link" data-key="t-badges">Liste des sous categorie</a>
                            </li>

                        </ul>
                    </div>

                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" role="button" aria-expanded="false" aria-controls="sidebarUI">
                        <i class="ri-pencil-ruler-2-line"></i> <span data-key=""> <b>Administrateur</b> </span>
                    </a>

                    <div class="col-lg-12">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="/nouveau/administrateur" class="nav-link" data-key="t-alerts">Ajouter Administrateur</a>
                            </li>
                            <li class="nav-item">
                                <a href="/liste/administrateur" class="nav-link" data-key="t-alerts">Liste Administrateurs</a>
                            </li>

                        </ul>
                    </div>

                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
