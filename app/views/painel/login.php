<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= SITE_NOME; ?> | Login Painel Administrativo</title>

    <!-- Favicon -->
    <link href="<?= BASE_URL; ?>arquivos/painel/img/brand/favicon.png" rel="icon" type="image/png">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <!-- Icons -->
    <link href="<?= BASE_URL; ?>arquivos/painel/js/plugins/nucleo/css/nucleo.css" rel="stylesheet"/>
    <link href="<?= BASE_URL; ?>arquivos/painel/js/plugins/@fortawesome/fontawesome-free/css/all.min.css"
          rel="stylesheet"/>

    <!-- CSS Files -->
    <link href="<?= BASE_URL; ?>arquivos/painel/css/argon-dashboard.css?v=1.1.1" rel="stylesheet"/>
</head>

<body class="bg-dark">
<div class="main-content">

    <!-- Header -->
    <div class="header bg-gradient-danger py-7 py-lg-8">
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
                 xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-dark" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>

    <!-- Page content -->
    <div class="container mt--8 pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center text-muted mb-4">
                            <img src="<?= BASE_URL; ?>arquivos/assets/img/logo-laranja.png" style="max-width: 100%;" alt="Momesso" />
                        </div>
                        <form id="formLogin">
                            <div class="form-group mb-3">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Senha" name="senha" type="password">
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" id="btnLogin" class="btn my-4" style="background: #ff7a08; color: #fff;">Acessar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!--   Core   -->
<script src="<?= BASE_URL; ?>arquivos/painel/js/plugins/jquery/dist/jquery.min.js"></script>
<script src="<?= BASE_URL; ?>arquivos/painel/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- Plugins -->
<script src="<?= BASE_URL; ?>arquivos/plugins/sweetalert/sweetalert2.all.js"></script>
<script src="<?= BASE_URL; ?>arquivos/plugins/mascara/mascara.js"></script>
<script src="<?= BASE_URL; ?>arquivos/plugins/datatables/js/js.js" defer=""></script>

<!-- Scripts -->
<script type='module' src='<?= BASE_URL; ?>arquivos/app/method/Login.js'></script>

</body>
</html>