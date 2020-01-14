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
                                <a href="<?= BASE_URL; ?>produtos">
                                    <button type="button" class="btn btn-banner">CONHEÇA</button>
                                </a>
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
                <a href="<?= BASE_URL; ?>empresa">
                    <button type="button" class="btn btn-conheca-institucional">CONHEÇA</button>
                </a>
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
                            <div class="card-produto-home">
                                <h4><?= $prod->nome; ?></h4>

                                <hr style="border-bottom: 2px solid #f47920;width: 100%;">

                                <img src="<?= $prod->imagem; ?>">
                                <br>
                                <br>
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
