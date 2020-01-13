<?php $this->view('site/includes/header'); ?>

    <!-- BREADCUMP-->
    <div class="breadcump" style="background-image: url('<?= BASE_URL ?>arquivos/assets/img/breadcump.png');">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <p class="titulo-breadcump"><?= $categorias->nome; ?></p>
                    </div>
                </div>
            </div>
            <hr style="border-top: 1px solid #e39e2c!important;">
            <p class="caminho-breadcump">
                <a href="<?= BASE_URL; ?>">HOME</a> > <a href="<?= BASE_URL; ?>produtos">PRODUTOS</a> > <?= $categorias->nome; ?>
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
                    <!-- CATEGORIA PAI -->
                    <div class="thumb-categoria-produto"
                         style="background-image: url('<?= BASE_STORANGE ?>categoria/<?= $categorias->imagem; ?>');">
                        <h4><?= $categorias->nome; ?></h4>
                    </div>
                    <!-- FIM CATEGORIA PAI -->

                    <?php foreach ($categorias->categorias as $catFilho): ?>
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
                </div>
                <!-- FIM CATEGORIAS -->

                <!-- PRODUTOS -->
                <div class="col-md-8">

                    <div class="borda-left">
                    <div class="container">
                        <div class="row produtos">

                            <?php foreach ($produtos as $produto): ?>
                                <div class="col-md-4">
                                    <a class="text-decoration-none"
                                       href="<?= BASE_URL; ?>produtos/<?= $produto->id_produto; ?>/<?= $produto->slug; ?>">
                                        <div class="card-produto">
                                            <h4><?= $produto->nome; ?></h4>
                                            <hr style="border-bottom: 2px solid #f47920;width: 100%;">
                                            <img src="<?= $produto->capa; ?>">
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>

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