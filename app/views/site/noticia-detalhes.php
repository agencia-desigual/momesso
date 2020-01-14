<?php $this->view('site/includes/header'); ?>

    <!-- BREADCUMP-->
    <div class="breadcump" style="height: 50vh; background-image: url('<?= BASE_URL ?>arquivos/assets/img/breadcump.png');">

        <div class="bg-opacity">
            <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div style="height: 45vh; text-align: center; display: grid" class="centraliza-itens">
                        <div>
                            <p class="titulo-breadcump"><?= $noticia->nome; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </div>
    <!-- FIM BREADCUMP -->

    <!-- NOTICIAS -->
    <div class="container">
        <div class="row margin-conteudo">
            <div class="container">
                <?= $noticia->texto; ?>
            </div>
        </div>
    </div>
    <!-- FIM NOTICIAS -->

<?php $this->view('site/includes/footer'); ?>