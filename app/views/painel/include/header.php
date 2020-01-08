<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= SITE_NOME; ?> | Painel Administrativo</title>

    <!-- Favicon -->
    <link href="<?= BASE_URL; ?>arquivos/painel/img/brand/favicon.png" rel="icon" type="image/png">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <!-- Icons -->
    <link href="<?= BASE_URL; ?>arquivos/painel/js/plugins/nucleo/css/nucleo.css" rel="stylesheet"/>
    <link href="<?= BASE_URL; ?>arquivos/painel/js/plugins/@fortawesome/fontawesome-free/css/all.min.css"
          rel="stylesheet"/>

    <!-- Plugins -->
    <link rel="stylesheet" href="<?= BASE_URL; ?>arquivos/plugins/datatables/css/css.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASE_URL; ?>arquivos/plugins/dropify/css/dropify.css">

    <!-- CSS Files -->
    <link href="<?= BASE_URL; ?>arquivos/painel/css/argon-dashboard.css?v=1.1.1" rel="stylesheet"/>
</head>

<body class="">
<!-- MENU -->
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
                aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Brand -->
        <a class="navbar-brand pt-0" href="<?= BASE_URL; ?>painel">
            <img src="<?= BASE_URL; ?>arquivos/assets/img/logo-laranja.png" class="navbar-brand-img" alt="Momesso">
        </a>

        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">

            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="<?= BASE_URL; ?>painel">
                            <img src="<?= BASE_URL; ?>arquivos/assets/img/logo-laranja.png">
                        </a>
                    </div>

                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse"
                                data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                                aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>


            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL; ?>painel">
                        <i class="ni ni-chart-bar-32 text-dark"></i> Início
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?= BASE_URL; ?>painel/categorias">
                        <i class="ni ni-app text-dark"></i> Categorias
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?= BASE_URL; ?>painel/produtos">
                        <i class="ni ni-bag-17 text-dark"></i> Produtos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?= BASE_URL; ?>painel/noticias">
                        <i class="ni ni-single-copy-04 text-dark"></i> Notícias
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?= BASE_URL; ?>painel/usuarios">
                        <i class="ni ni-single-02 text-dark"></i> Usuários
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL; ?>sair">
                        <i class="ni ni-button-power text-dark"></i> Sair
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- END >> MENU -->