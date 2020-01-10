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
    <!-- FIM NOTICIAS -->

<?php $this->view('site/includes/footer'); ?>