<?php $this->view('site/includes/header'); ?>

    <!-- BREADCUMP-->
    <div class="breadcump" style="background-image: url('<?= BASE_URL ?>arquivos/assets/img/breadcump.png');">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <p class="titulo-breadcump">NOTÍCIAS</p>
                    </div>
                </div>
            </div>
            <hr style="border-top: 1px solid #e39e2c!important;">
            <p class="caminho-breadcump">
                <a href="<?= BASE_URL; ?>">HOME</a> > NOTÍCIAS
            </p>
        </div>

    </div>
    <!-- FIM BREADCUMP -->

    <!-- NOTICIAS -->
    <div class="container">

        <div class="row margin-conteudo">
            <?php if(!empty($noticias)): ?>
                <?php foreach ($noticias as $not): ?>
                    <div class="col-md-4">
                        <div class="card-noticias">
                            <div class="thumb-noticias"
                                 style="background-image: url('<?= BASE_URL; ?><?= (!empty($not->imagem)) ? "storage/noticia/" . $not->imagem : "arquivos/assets/img/not-found.jpg" ?>');"></div>

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
    <!-- FIM NOTICIAS -->

<?php $this->view('site/includes/footer'); ?>