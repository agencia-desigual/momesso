<?php $this->view('site/includes/header'); ?>

    <!-- BREADCUMP-->
    <div class="breadcump" style="background-image: url('<?= BASE_URL ?>arquivos/assets/img/breadcump.png');">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <p class="titulo-breadcump"><?= $produto->nome; ?></p>
                    </div>
                </div>
            </div>
            <hr style="border-top: 1px solid #e39e2c!important;">
            <p class="caminho-breadcump">
                <a href="<?= BASE_URL; ?>">HOME</a> > <a href="<?= BASE_URL; ?>produtos">Produtos</a> > <?= $produto->nome; ?>
            </p>
        </div>

    </div>
    <!-- FIM BREADCUMP -->

    <!-- NOTICIAS -->
    <div class="">
        <div class="container">

            <div class="row margin-conteudo">

                <!-- CATEGORIAS -->
                <div class="col-md-4">
                    <?php foreach ($categorias as $cat): ?>
                        <!-- CATEGORIA PAI -->
                        <div class="thumb-categoria-produto"
                             style="background-image: url('<?= BASE_STORANGE ?>categoria/<?= $cat->imagem; ?>');">
                            <h4><?= $cat->nome; ?></h4>
                        </div>
                        <!-- FIM CATEGORIA PAI -->

                        <?php foreach ($cat->categorias as $catFilho): ?>
                            <!-- CATEGORIAS FILHAS -->
                            <a href="<?= BASE_URL; ?>produtos/categoria/<?= $catFilho->id_categoria; ?>/<?= $catFilho->slug; ?>" class="text-decoration-none">
                                <div class="categorias-filhas">

                                    <img src="<?= BASE_URL; ?>arquivos/assets/img/produtos/icone-drop.png">
                                    <h5><?= $catFilho->nome; ?></h5>
                                    <hr>
                                </div>
                            </a>
                            <!-- FIM CATEGORIAS FILHAS -->
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </div>
                <!-- FIM CATEGORIAS -->

                <!-- PRODUTOS -->
                <div class="col-md-8">

                    <div class="borda-left">
                        <div style="padding: 0px 30px;" class="container">

                            <div class="row produtos">
                                <div class="col-md-12">
                                    <h3><?= $produto->categoria->nome; ?></h3>
                                    <h2><?= $produto->nome; ?></h2>
                                    <hr style="border-top: 2px solid #ccc;">
                                </div>

                                <div class="slideProduto owl-carousel owl-theme">
                                    <?php foreach ($imagens as $img): ?>
                                        <img class="thumb-produto" src="<?= BASE_STORANGE; ?>produto/<?= $produto->id_produto; ?>/<?= $img->imagem; ?>">
                                    <?php endforeach; ?>
                                </div>

                            </div>
                            <hr style="border-top: 2px solid #ccc;">
                            <div class="text-center">
                                <a href="<?= BASE_URL; ?>contato">
                                    <button type="button" class="btn btn-solicitar-orcamento">SOLICITE UM ORÇAMENTO</button>
                                </a>
                                <p style="font-size: 13px; letter-spacing: 2px">SEM COMPROMISSO</p>
                            </div>
                            <br>
                            <br>
                            <div class="row produtos">
                                <div class="col-md-12">
                                    <h3>Características do produto:</h3>
                                    <hr style="border-top: 2px solid #ccc;">
                                </div>
                                <p class="container">
                                    <?= $produto->descricao; ?>
                                </p>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- FIM PRDUTOS -->

            </div>

        </div>
    </div>
    <!-- FIM NOTICIAS -->

<?php $this->view('site/includes/footer'); ?>