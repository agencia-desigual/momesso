<!doctype html>
<head>
    <!-- Requisitos meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- SEO Meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="<?= $seo['description'] ?>" />
    <meta name="keywords" content="<?= $seo['keywords'] ?>" />
    <meta name="distribution" content="global" />
    <meta name="revisit-after" content="10 Days" />
    <meta name="robots" content="ALL" />
    <meta name="language" content="pt-br" />
    <meta name="theme-color" content="#f47920">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f47920">
    <meta name="msapplication-navbutton-color" content="#f47920">

    <!-- SMO Facebook -->
    <meta property="og:locale" content="pt_BR">
    <meta property="og:url" content="<?= $smo['url'] ?>">
    <meta property="og:title" content="<?= $smo['title'] ?>">
    <meta property="og:site_name" content="<?= $smo['site_name'] ?>">
    <meta property="og:description" content="<?= $smo['description'] ?>">
    <meta property="og:image" content="<?= $smo['image'] ?>">
    <meta property="og:image:type" content="<?= $smo['image_type'] ?>">
    <meta property="og:image:width" content="<?= $smo['image_width'] ?>">
    <meta property="og:image:height" content="<?= $smo['image_height'] ?>">

    <!-- CSS Bootstrap  -->
    <link rel="stylesheet" href="<?= BASE_URL.'arquivos/assets/css/bootstrap.min.css' ?>">

    <!-- CSS Personalizado -->
    <link rel="stylesheet" href="<?= BASE_URL.'arquivos/assets/css/estilo.css' ?>">

    <!-- CSS Responsivo -->
    <link rel="stylesheet" href="<?= BASE_URL.'arquivos/assets/css/responsivo.css' ?>">

    <title><?= $seo['title'] ?></title>
</head>
<body>

<div class="bg-laranja">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="<?= BASE_URL; ?>arquivos/assets/img/logo_branco.png">
            </div>
            <div class="col-md-8">
                <div style="padding: 20px 0px; text-align: right;">
                    <a href="#" class="menu-itens">HOME</a>
                    <a href="#" class="menu-itens">EMPRESA</a>
                    <a href="#" class="menu-itens">PRODUTOS</a>
                    <a href="#" class="menu-itens">CONTATO</a>
                    <a href="#" class="menu-itens" style="padding: 0px 3px; vertical-align: super"><img width="35px" src="<?= BASE_URL; ?>arquivos/assets/img/icone-face.png"></a>
                    <a href="#" class="menu-itens" style="padding: 0px 3px; vertical-align: super"><img width="35px" src="<?= BASE_URL; ?>arquivos/assets/img/icone-youtube.png"></a>
                </div>
            </div>
        </div>
    </div>
</div>