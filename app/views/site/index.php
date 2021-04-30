<?php $this->view('site/includes/header'); ?>

    <style>
        .banner-principal .selo
        {
            width: auto;
            display: block;
            padding-bottom: 20px;
            max-width: 80%;
        }

        .sub-titulo-banner-principal{font-size: 1.4em;}

        .txt
        {
            padding-left: 50px;
            padding-top: 20px;
        }

        @media (max-width: 600px) {
            .banner-principal{background-position-x: -50px;}
            .banner-principal .aux
            {
                width: 240px;
                margin-left: calc(50% - 120px);
            }

            .txt{padding: 0px !important;}
        }
    </style>


    <!-- BANNER PRINCIPAL -->
    <div class="banner-principal" style="background-image: url('<?= BASE_URL ?>arquivos/assets/img/banner.png');">

        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <div class="centraliza-itens altura-80">
                        <div class="aux">
                            <img class="selo" src="<?= BASE_URL; ?>arquivos/assets/img/selo-farm.png">

                            <p class="titulo-banner-principal">
                                Do <b style="color: #f47920;">ON FARM</b> <br>
                                ao <b style="color: #f47920;">INDUSTRIAL</b>
                            </p>
                            <p class="sub-titulo-banner-principal">
                                Há 60 anos levando <br>
                                inovação e tecnologia <br>
                                para seu plantio.
                            </p>
                            <div style="text-align: left">
                                <a href="<?= BASE_URL; ?>produtos">
                                    <button type="button" class="btn btn-banner">CONHEÇA</button>
                                </a>
                            </div>
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
            <div class="col-md-6" style="background-image: url('<?= BASE_URL; ?>arquivos/assets/img/img-home.png'); height: 500px;background-position: center;background-repeat: no-repeat;background-size: contain;">

            </div>
            <div class="col-md-6">
                <div class="txt">
                    <p class="titulo-institucional">Há mais de 50 anos contribuindo com a evolução da nossa agricultura.</p>
                    <br>
                    <p class="institucional-descricao">
                        A Momesso Indústria de Máquina é uma empresa com mais de 50 anos de mercado. Fundada em 18 de junho de 1962, sua atividade principal era a manutenção de máquinas de beneficiamento de algodão e óleo, junto com fabricação de tanques e braços de pulverizadores para agricultura sob encomenda, na região de Birigui, interior de São Paulo. Na década de 70, a Momesso incluiu em seu portfólio máquinas para colheita de crotalária ..
                    </p>
                    <a href="<?= BASE_URL; ?>empresa">
                        <button type="button" class="btn btn-conheca-institucional">CONHEÇA</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- FIM INSTITUCIONAL -->

    <!-- NOTICIAS -->
    <div style="padding: 50px 0px;" class="noticias-home">
        <div class="container">

            <div style="border-left: 5px solid #f47920;height: 30px;display: inline;margin-right: 15px;"></div>
            <p style="font-size: 20px;font-weight: 900;display: inline;">NOTÍCIAS</p>
            <div style="display: inline; float: right"><a href="<?= BASE_URL; ?>noticias" class="btn btn-todas-noticias">VER TODAS</a></div>

            <br>
            <br>
            <hr>

            <div class="row">
                <?php if(!empty($noticias)): ?>
                    <?php foreach ($noticias as $not): ?>
                        <div class="col-md-4">
                            <div class="card-noticias">
                                <div class="thumb-noticias" style="background-image: url('<?= $not->imagem; ?>');"></div>

                                <div style="padding: 10px 25px;">
                                    <div class="titulo-noticias">
                                        <h4><?= $not->nome; ?></h4>
                                    </div>

                                    <br>

                                    <a class="btn btn-leia-mais" href="<?= BASE_URL; ?>noticias/<?= $not->id_noticia; ?>/<?= $not->slug; ?>">LEIA MAIS</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Nenhuma notícia cadastrada.</p>
                <?php endif; ?>
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
                            <a href="<?= BASE_URL; ?>produtos/agro">
                                <button type="button" class="btn btn-card-categoria-produto">VER PRODUTOS</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-categoria-produto" style="background-image: url('<?= BASE_URL ?>arquivos/assets/img/categoria-plastico.png')">
                        <div class="card-categoria-titulo">
                            <h4>Plástico</h4>
                            <hr style="border-bottom: 1px solid #f79b58;width: 60%;float: left;">
                            <p>Alta tecnologia em moinhos e transportadores pneumáticos.</p>
                            <a href="<?= BASE_URL; ?>produtos/plastico">
                                <button type="button" class="btn btn-card-categoria-produto">VER PRODUTOS</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <!-- PRODUTOS -->
            <div class="row">
                <?php if(!empty($produtos)): ?>
                    <?php foreach ($produtos as $prod): ?>
                        <div class="col-md-4">


                            <div class="card-produto">
                                <div class="img-thumb-produto" style="background-image: url('<?= $prod->imagem ?>')"></div>
                                <hr style="border-bottom: 2px solid #f47920;width: 100%;">
                                <h4><?= substr($prod->nome, 0, 48); ?></h4>
                                <div class="text-center">
                                    <a href="<?= BASE_URL; ?>produtos/detalhe/<?= $prod->id_produto; ?>/<?= $prod->slug; ?>"
                                       class="btn btn-card-produto-home">CONHEÇA</a>
                                </div>
                            </div>


                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Nenhum produto cadastrado.</p>
                <?php endif; ?>
            </div>
            <!-- FIM PRODUTOS -->
        </div>
    </div>
    <!-- FIM PRODUTOS -->

<?php $this->view('site/includes/footer'); ?>
