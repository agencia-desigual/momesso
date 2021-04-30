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



    <!-- Plugins -->

    <link rel="stylesheet" href="<?= BASE_URL; ?>arquivos/plugins/dropify/css/dropify.css" />

    <link rel="stylesheet" href="<?= BASE_URL; ?>arquivos/plugins/owl.carousel/dist/assets/owl.carousel.min.css" />

    <link rel="stylesheet" href="<?= BASE_URL; ?>arquivos/plugins/owl.carousel/dist/assets/owl.theme.default.css" />



    <title><?= $seo['title'] ?></title>


    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= BASE_URL; ?>arquivos/assets/img/favicon.png" type="image/png" />


    <!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-169605571-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-169605571-1');
	</script>
</head>

<body>

<style>



</style>



<!-- MENU MOBILE -->

<div class="sidebar-menu-mobile">



    <div class="row">

        <div style="height: 95px;width: 95%;background-color: #323232;text-align: center">

            <a href="<?= BASE_URL; ?>">

                <img style="width: 150px;margin-top: 30px;" src="<?= BASE_URL; ?>arquivos/assets/img/logo_branco.png">

            </a>

        </div>

    </div>



    <div class="container">

        <div style="margin-top: 30px" class="row">

            <div class="col-md-12">

                <a href="<?= BASE_URL; ?>" class="menu-itens-mobile">HOME</a>

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

                    <a href="<?= BASE_URL; ?>empresa" class="submenu-itens-mobile">A MOMESSO</a>

                </div>

                <div style="padding: 5px 15px" class="col-md-12">

                    <a href="<?= BASE_URL; ?>diferencial" class="submenu-itens-mobile">NOSSO DIFERENCIAL</a>

                </div>

                <div style="padding: 5px 15px" class="col-md-12">

                    <a href="<?= BASE_URL; ?>noticias" class="submenu-itens-mobile">NOTÍCIAS</a>

                </div>

                <div style="padding: 5px 15px" class="col-md-12">

                    <a href="<?= BASE_URL; ?>cimbria" class="submenu-itens-mobile">PARCERIA CIMBRIA</a>

                </div>

                <div style="padding: 5px 15px" class="col-md-12">

                    <a href="<?= BASE_URL; ?>trabalhe-conosco" class="submenu-itens-mobile">TRABALHE CONOSCO</a>

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

                    <a href="<?= BASE_URL ?>produtos/agro" class="submenu-itens-mobile">AGRO</a>

                </div>

                <div style="padding: 5px 15px" class="col-md-12">

                    <a href="<?= BASE_URL ?>produtos/plastico" class="submenu-itens-mobile">PLÁSTICO</a>

                </div>

                <div style="padding: 5px 15px" class="col-md-12">

                    <a href="<?= BASE_URL ?>produtos" class="submenu-itens-mobile">TODOS</a>

                </div>

            </div>

            <!-- FIM SUBMENU -->

        </div>

        <hr>

        <div class="row">

            <div class="col-md-12">

                <a href="<?= BASE_URL ?>contato" class="menu-itens-mobile">CONTATO</a>

            </div>

        </div>

        <hr>

        <div class="row text-left">

            <div style="padding: 0px 30px;" class="col-md-12">

                <a href="https://www.facebook.com/momessoind/" target="_blank" class="menu-itens-mobile" style="padding: 0px 3px; vertical-align: super"><img width="35px" src="<?= BASE_URL; ?>arquivos/assets/img/icone-face.png"></a>

                <a href="https://www.youtube.com/channel/UC5oMMEt26KSpIXh-UGhcJ6Q" target="_blank" class="menu-itens-mobile" style="padding: 0px 3px; vertical-align: super"><img width="35px" src="<?= BASE_URL; ?>arquivos/assets/img/icone-youtube.png"></a>

                <a href="https://www.instagram.com/momessoind/" target="_blank" class="menu-itens-mobile" style="padding: 0px 3px; vertical-align: super"><img width="35px" src="<?= BASE_URL; ?>arquivos/assets/img/icone-instagram.png"></a>

            </div>

        </div>

    </div>

</div>

<div class="fundo-menu" onclick="menu('fecha')"></div>

<div class="bg-laranja menu-mobile">

    <div class="container">

        <div class="row">

            <div class="col-md-12 text-center">

                <a href="<?= BASE_URL; ?>">

                    <img style="width: 210px;" src="<?= BASE_URL; ?>arquivos/assets/img/logo_branco.png">

                </a>

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

                            <a style="text-decoration: none;" href="<?= BASE_URL ?>diferencial">

                                <p>nosso diferencial</p>

                            </a>

                            <hr style="border-top: 1px solid #3b3b3b">

                            <a style="text-decoration: none;" href="<?= BASE_URL ?>noticias">

                                <p>notícias</p>

                            </a>

                            <hr style="border-top: 1px solid #3b3b3b">

                            <a style="text-decoration: none;" href="<?= BASE_URL ?>cimbria">

                                <p>parceria cimbra</p>

                            </a>

                            <hr style="border-top: 1px solid #3b3b3b">

                            <a style="text-decoration: none;" href="<?= BASE_URL ?>trabalhe-conosco">

                                <p>trabalhe conosco</p>

                            </a>

                        </div>

                    </div>

                    <div class="dropdown">

                        <span class="menu-itens menu-drop-hover">PRODUTOS &nbsp;<img width="10px" src="<?= BASE_URL; ?>arquivos/assets/img/dropdown.png"></span>

                        <div class="dropdown-content">

                            <a style="text-decoration: none;" href="<?= BASE_URL ?>produtos/agro">

                                <p>Agro</p>

                            </a>

                            <hr style="border-top: 1px solid #3b3b3b">

                            <a style="text-decoration: none;" href="<?= BASE_URL ?>produtos/plastico">

                                <p>Plástico</p>

                            </a>

                            <hr style="border-top: 1px solid #3b3b3b">

                            <a style="text-decoration: none;" href="<?= BASE_URL ?>produtos">

                                <p>Todos</p>

                            </a>

                        </div>

                    </div>

                    <a style="text-decoration: none;" href="<?= BASE_URL ?>contato">

                        <span class="menu-itens">CONTATO</span>

                    </a>

                    <a href="https://www.facebook.com/momessoind" target="_blank" class="menu-itens" style="padding: 0px 3px; vertical-align: super"><img width="35px" src="<?= BASE_URL; ?>arquivos/assets/img/icone-face.png"></a>

                    <a href="https://www.youtube.com/channel/UC5oMMEt26KSpIXh-UGhcJ6Q/feed" target="_blank" class="menu-itens" style="padding: 0px 3px; vertical-align: super"><img width="35px" src="<?= BASE_URL; ?>arquivos/assets/img/icone-youtube.png"></a>

                    <a href="https://www.instagram.com/momessoind/" target="_blank" class="menu-itens" style="padding: 0px 3px; vertical-align: super"><img width="35px" src="<?= BASE_URL; ?>arquivos/assets/img/icone-instagram.png"></a>



                </div>



            </div>

        </div>

    </div>

</div>

<!-- FIM MENU DESKTOP -->