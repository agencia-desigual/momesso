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
<style>

</style>

<!-- MENU MOBILE -->
<div class="sidebar-menu-mobile">

    <div class="row">
        <div style="height: 95px;width: 95%;background-color: #323232;text-align: center">
            <img style="width: 150px;margin-top: 30px;" src="<?= BASE_URL; ?>arquivos/assets/img/logo_branco.png">
        </div>
    </div>

    <div class="container">
        <div style="margin-top: 30px" class="row">
            <div class="col-md-12">
                <a href="#" class="menu-itens-mobile">HOME</a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <a href="#" id="abreEmpresa" class="menu-itens-mobile">EMPRESA &nbsp;<img style="transform: rotate(-90deg);" width="10px" src="<?= BASE_URL; ?>arquivos/assets/img/dropdown.png"></a>
            </div>

            <!-- SUBMENU -->
            <div class="submenu-empresa" style="margin: 10px 0px; display: none">
                <div style="padding: 5px 15px" class="col-md-12">
                    <a href="#" class="submenu-itens-mobile">A MOMESSO</a>
                </div>
                <div style="padding: 5px 15px" class="col-md-12">
                    <a href="#" class="submenu-itens-mobile">NOSSO DIFERENCIAL</a>
                </div>
                <div style="padding: 5px 15px" class="col-md-12">
                    <a href="#" class="submenu-itens-mobile">NOTÍCIAS</a>
                </div>
                <div style="padding: 5px 15px" class="col-md-12">
                    <a href="#" class="submenu-itens-mobile">PARCERIA CIMBRIA</a>
                </div>
                <div style="padding: 5px 15px" class="col-md-12">
                    <a href="#" class="submenu-itens-mobile">TRABALHE CONOSCO</a>
                </div>
                <div style="padding: 5px 15px" class="col-md-12">
                    <a href="#" class="submenu-itens-mobile">WEB VENDAS</a>
                </div>
            </div>
            <!-- FIM SUBMENU -->


        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <a href="#" id="abreProduto" class="menu-itens-mobile">PRODUTOS &nbsp;<img style="transform: rotate(-90deg);" width="10px" src="<?= BASE_URL; ?>arquivos/assets/img/dropdown.png"></a>
            </div>

            <!-- SUBMENU -->
            <div class="submenu-produtos" style="margin: 10px 0px; display: none">
                <div style="padding: 5px 15px" class="col-md-12">
                    <a href="#" class="submenu-itens-mobile">A MOMESSO</a>
                </div>
                <div style="padding: 5px 15px" class="col-md-12">
                    <a href="#" class="submenu-itens-mobile">NOSSO DIFERENCIAL</a>
                </div>
                <div style="padding: 5px 15px" class="col-md-12">
                    <a href="#" class="submenu-itens-mobile">NOTÍCIAS</a>
                </div>
                <div style="padding: 5px 15px" class="col-md-12">
                    <a href="#" class="submenu-itens-mobile">PARCERIA CIMBRIA</a>
                </div>
                <div style="padding: 5px 15px" class="col-md-12">
                    <a href="#" class="submenu-itens-mobile">TRABALHE CONOSCO</a>
                </div>
                <div style="padding: 5px 15px" class="col-md-12">
                    <a href="#" class="submenu-itens-mobile">WEB VENDAS</a>
                </div>
            </div>
            <!-- FIM SUBMENU -->
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <a href="#" class="menu-itens-mobile">CONTATO</a>
            </div>
        </div>
        <hr>
        <div class="row text-left">
            <div style="padding: 0px 30px;" class="col-md-12">
                <a href="#" class="menu-itens-mobile" style="padding: 0px 3px; vertical-align: super"><img width="35px" src="<?= BASE_URL; ?>arquivos/assets/img/icone-face.png"></a>
                <a href="#" class="menu-itens-mobile" style="padding: 0px 3px; vertical-align: super"><img width="35px" src="<?= BASE_URL; ?>arquivos/assets/img/icone-youtube.png"></a>
            </div>
        </div>
    </div>
</div>
<div class="fundo-menu" onclick="menu('fecha')"></div>
<div class="bg-laranja menu-mobile">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <img style="width: 210px;" src="<?= BASE_URL; ?>arquivos/assets/img/logo_branco.png">
                <button class="btn" style="float: right; margin-top: 3px;" onclick="menu('abre')">
                    <img src="<?= BASE_URL; ?>arquivos/assets/img/icone-menu.png">
                </button>
            </div>
        </div>
    </div>
</div>
<!-- FIM MENU MOBILE -->

<!-- MENU DESKTOP -->
<div class="bg-laranja menu-desktop">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <a href="<?= BASE_URL; ?>"> <img src="<?= BASE_URL; ?>arquivos/assets/img/logo_branco.png"></a>
            </div>
            <div class="col-md-8">

                <div style="padding: 20px 0px; text-align: right;">
                    <a style="text-decoration: none;" href="<?= BASE_URL ?>">
                        <span class="menu-itens">HOME</span>
                    </a>
                    <div class="dropdown">
                        <span class="menu-itens menu-drop-hover">EMPRESA &nbsp;<img width="10px" src="<?= BASE_URL; ?>arquivos/assets/img/dropdown.png"></span>
                        <div class="dropdown-content">
                            <a style="text-decoration: none;" href="<?= BASE_URL ?>empresa">
                                <p>a momesso</p>
                            </a>
                            <hr style="border-top: 1px solid #3b3b3b">
                            <p>nosso diferencial</p>
                            <hr style="border-top: 1px solid #3b3b3b">
                            <a style="text-decoration: none;" href="<?= BASE_URL ?>noticias">
                                <p>notícias</p>
                            </a>
                            <hr style="border-top: 1px solid #3b3b3b">
                            <p>perceria cimbra</p>
                            <hr style="border-top: 1px solid #3b3b3b">
                            <p>trabalhe conosco</p>
                            <hr style="border-top: 1px solid #3b3b3b">
                            <p>webvendas</p>
                            <hr style="border-top: 1px solid #3b3b3b">
                        </div>
                    </div>
                    <div class="dropdown">
                        <span class="menu-itens menu-drop-hover">PRODUTOS &nbsp;<img width="10px" src="<?= BASE_URL; ?>arquivos/assets/img/dropdown.png"></span>
                        <div class="dropdown-content">
                            <a style="text-decoration: none;" href="<?= BASE_URL ?>produtos">
                                <p>Agro</p>
                            </a>
                            <hr style="border-top: 1px solid #3b3b3b">
                            <a style="text-decoration: none;" href="<?= BASE_URL ?>produtos">
                                <p>Plástico</p>
                            </a>
                            <hr style="border-top: 1px solid #3b3b3b">
                        </div>
                    </div>
                    <a style="text-decoration: none;" href="<?= BASE_URL ?>contato">
                        <span class="menu-itens">CONTATO</span>
                    </a>
                    <a href="https://www.facebook.com/momessoind" target="_blank" class="menu-itens" style="padding: 0px 3px; vertical-align: super"><img width="35px" src="<?= BASE_URL; ?>arquivos/assets/img/icone-face.png"></a>
                    <a href="https://www.youtube.com/channel/UC5oMMEt26KSpIXh-UGhcJ6Q/feed" target="_blank" class="menu-itens" style="padding: 0px 3px; vertical-align: super"><img width="35px" src="<?= BASE_URL; ?>arquivos/assets/img/icone-youtube.png"></a>

                </div>


                <!-- BACKUP -->
                <div style="padding: 20px 0px; text-align: right; display: none">
                    <a href="<?= BASE_URL; ?>" class="menu-itens">HOME</a>


                    <span id="menu-empresa" class="menu-drop-hover" style="position: relative">
                        <a href="<?= BASE_URL; ?>" class="menu-itens">EMPRESA <img width="10px" src="<?= BASE_URL; ?>arquivos/assets/img/dropdown.png"></a>
                    </span>
                    <span class="sub-menu-empresa" style="position: absolute; background-color: #323232;top: 90px;left: calc(100% - 461px); display: none;">
                        <a href="#" class="menu-itens">CONTATO</a><br>
                        <a href="#" class="menu-itens">CONTATO</a><br>
                        <a href="#" class="menu-itens">CONTATO</a><br>
                    </span>


                    <span class="menu-drop-hover">
                        <a href="#" class="menu-itens">PRODUTOS <img width="10px" src="<?= BASE_URL; ?>arquivos/assets/img/dropdown.png"></a>
                    </span>
                    <a href="<?= BASE_URL; ?>contato" class="menu-itens">CONTATO</a>
                    <a href="#" class="menu-itens" style="padding: 0px 3px; vertical-align: super"><img width="35px" src="<?= BASE_URL; ?>arquivos/assets/img/icone-face.png"></a>
                    <a href="#" class="menu-itens" style="padding: 0px 3px; vertical-align: super"><img width="35px" src="<?= BASE_URL; ?>arquivos/assets/img/icone-youtube.png"></a>
                </div>
                <!-- BACKUP -->


            </div>
        </div>
    </div>
</div>
<!-- FIM MENU DESKTOP -->