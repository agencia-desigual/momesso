<?php $this->view('site/includes/header'); ?>

    <!-- BANNER PRINCIPAL -->
    <div class="banner-principal" style="background-image: url('<?= BASE_URL ?>arquivos/assets/img/banner-home.png');">

    <div class="container">
        <div class="row">
            
            <div class="col-md-6">
                <div class="centraliza-itens altura-80">
                    <div>
                        <p class="titulo-banner-principal">
                            Hora de semear boas<br>
                            colheitas para <?php echo date("Y"); ?>.<br>
                            Garantia de produtividade,<br>
                            vigor e germinação<br>
                        </p>
                        <p class="sub-titulo-banner-principal">
                            Aproveite o momento para revisar seus equipamentos e garantir seu tratamento de sementes com o programa Momesso Ready.
                        </p>
                        <div style="text-align: left">
                            <button type="button" class="btn btn-banner">CONHEÇA</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="centraliza-itens altura-80">
                    <div>
                        <img class="remover-img-767" width="300px" src="<?= BASE_URL; ?>arquivos/assets/img/momesso_ready_logo.png">
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    <!-- FIM BANNER -->

    <!-- INSTITUCIONAL -->
    <div class="container">
        <div style="margin-top: 50px; margin-bottom: 50px;" class="row">
            <div class="col-md-6" style="background-image: url('<?= BASE_URL; ?>arquivos/assets/img/img-contant.png'); height: 500px;background-position: center;background-repeat: no-repeat;background-size: contain;">

            </div>
            <div class="col-md-6">
                <p class="titulo-institucional">Há mais de 50 anos <br> contribuindo com a <br> nossa evolução da nossa <br> agricultura.</p>
                <br>
                <p class="institucional-descricao">
                    A Momesso Indústria de Máquina é uma empresa com mais de 50 anos de mercado. Fundada em 18 de junho de 1962, sua atividade principal era a manutenção de máquinas de beneficiamento de algodão e óleo, junto com fabricação de tanques e braços de pulverizadores para agricultura sob encomenda, na região de Birigui, interior de São Paulo. Na década de 70, a Momesso incluiu em seu portfólio máquinas para colheita de crotalária ..
                </p>
                <button type="button" class="btn btn-conheca-institucional">CONHEÇA</button>
            </div>
        </div>
    </div>
    <!-- FIM INSTITUCIONAL -->

    <!-- NOTICIAS -->
    <div style="padding: 50px 0px;" class="noticias-home">
        <div class="container">

            <div style="border-left: 5px solid #f47920;height: 30px;display: inline;margin-right: 15px;"></div>
            <p style="font-size: 20px;font-weight: 900;display: inline;">NOTÍCIAS</p>
            <div style="display: inline; float: right"><button type="button" class="btn btn-todas-noticias">VER TODAS</button></div>
            <br>
            <br>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <div class="card-noticias">
                        <div class="thumb-noticias" style="background-image: url('<?= BASE_URL; ?>arquivos/assets/img/noticias/thumb-noticia-1.png');"></div>
                        <div style="padding: 10px 25px;">
                            <div class="titulo-noticias">
                                <h4>momesso terá participação de destaque no xxxvi ciclo em reuniões conjuntas da csm-pr focando nos beneficios da alta qualidade.</h4>
                            </div>
                            <br>
                            <button type="button" class="btn btn-leia-mais">LEIA MAIS</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-noticias">
                        <div class="thumb-noticias" style="background-image: url('<?= BASE_URL; ?>arquivos/assets/img/noticias/thumb-noticia-1.png');"></div>
                        <div style="padding: 10px 25px;">
                            <div class="titulo-noticias">
                                <h4>momesso terá participação de destaque no xxxvi ciclo em reuniões conjuntas da csm-pr focando nos beneficios da alta qualidade.</h4>
                            </div>
                            <br>
                            <button type="button" class="btn btn-leia-mais">LEIA MAIS</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-noticias">
                        <div class="thumb-noticias" style="background-image: url('<?= BASE_URL; ?>arquivos/assets/img/noticias/thumb-noticia-1.png');"></div>
                        <div style="padding: 10px 25px;">
                            <div class="titulo-noticias">
                                <h4>momesso terá participação de destaque no xxxvi ciclo em reuniões conjuntas da csm-pr focando nos beneficios da alta qualidade.</h4>
                            </div>
                            <br>
                            <button type="button" class="btn btn-leia-mais">LEIA MAIS</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- FIM NOTICIAS -->

    <!-- PRODUTOS AGRO E PLASTICO -->
    <div class="produtos-agro-plastico">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card-categoria-produto" style="background-image: url('<?= BASE_URL ?>arquivos/assets/img/categoria-agro.png')">
                        <div class="card-categoria-titulo">
                            <h4>Agro</h4>
                            <hr style="border-bottom: 1px solid #f79b58;width: 60%;float: left;">
                            <p>Soluções completas para beneficiamento e tratamento de sementes.</p>
                            <button type="button" class="btn btn-card-categoria-produto">VER PRODUTOS</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-categoria-produto" style="background-image: url('<?= BASE_URL ?>arquivos/assets/img/categoria-plastico.png')">
                        <div class="card-categoria-titulo">
                            <h4>Plástico</h4>
                            <hr style="border-bottom: 1px solid #f79b58;width: 60%;float: left;">
                            <p>Alta tecnologia em moinhos e transportadores pneumáticos.</p>
                            <button type="button" class="btn btn-card-categoria-produto">VER PRODUTOS</button>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <!-- PRODUTOS -->
            <div class="row">
                <div class="col-md-4">
                    <div class="card-produto-home">
                        <h4>MESA DENSIMETRICA</h4>
                        <hr style="border-bottom: 2px solid #f47920;width: 100%;">
                        <img src="<?= BASE_URL; ?>arquivos/assets/img/produtos/mesa.png">
                        <br>
                        <br>
                        <div class="text-center">
                            <button type="button" class="btn btn-card-produto-home">CONHEÇA</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-produto-home">
                        <h4>MESA DENSIMETRICA</h4>
                        <hr style="border-bottom: 2px solid #f47920;width: 100%;">
                        <img src="<?= BASE_URL; ?>arquivos/assets/img/produtos/mesa.png">
                        <br>
                        <br>
                        <div class="text-center">
                            <button type="button" class="btn btn-card-produto-home">CONHEÇA</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-produto-home">
                        <h4>MESA DENSIMETRICA</h4>
                        <hr style="border-bottom: 2px solid #f47920;width: 100%;">
                        <img src="<?= BASE_URL; ?>arquivos/assets/img/produtos/mesa.png">
                        <br>
                        <br>
                        <div class="text-center">
                            <button type="button" class="btn btn-card-produto-home">CONHEÇA</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FIM PRODUTOS -->
        </div>
    </div>
    <!-- FIM PRODUTOS -->

<?php $this->view('site/includes/footer'); ?>
