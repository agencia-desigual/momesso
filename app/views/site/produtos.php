<?php $this->view('site/includes/header'); ?>

    <!-- BREADCUMP-->
    <div class="breadcump" style="background-image: url('<?= BASE_URL ?>arquivos/assets/img/breadcump.png');">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <p class="titulo-breadcump">PRODUTOS</p>
                    </div>
                </div>
            </div>
            <hr style="border-top: 1px solid #e39e2c!important;">
            <p class="caminho-breadcump">
                <a href="<?= BASE_URL; ?>">HOME</a> > PRODUTOS
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
                    <div class="thumb-categoria-produto" style="background-image: url('<?= BASE_URL ?>arquivos/assets/img/produtos/thumb-categoria.png');">
                        <h4>AGRO</h4>
                    </div>
                    <!-- FIM CATEGORIA PAI -->

                    <!-- CATEGORIAS FILHAS -->
                    <div class="categorias-filhas">

                        <img src="<?= BASE_URL; ?>arquivos/assets/img/produtos/icone-drop.png">
                        <h5>Categorias Filhas</h5>
                        <hr>
                    </div>

                    <div class="categorias-filhas">

                        <img src="<?= BASE_URL; ?>arquivos/assets/img/produtos/icone-drop.png">
                        <h5>Categorias Filhas</h5>
                        <hr>
                    </div>
                    <!-- FIM CATEGORIAS FILHAS -->


                </div>
                <!-- FIM CATEGORIAS -->

                <!-- PRODUTOS -->
                <div class="col-md-8">

                    <div class="borda-left">
                    <div class="container">

                        <div class="row produtos">
                            <div class="col-md-12">
                                <h3>Centro de Tratamento de Sementes</h3>
                                <hr style="border-top: 2px solid #ccc;">
                            </div>
                            <div class="col-md-4">
                                <div class="card-produto">
                                    <h4>cts cc250 st</h4>
                                    <hr style="border-bottom: 2px solid #f47920;width: 100%;">
                                    <img src="<?= BASE_URL; ?>arquivos/assets/img/produtos/produto.png">
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="card-produto">
                                    <h4>cts cc250 st</h4>
                                    <hr style="border-bottom: 2px solid #f47920;width: 100%;">
                                    <img src="<?= BASE_URL; ?>arquivos/assets/img/produtos/produto.png">
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="card-produto">
                                    <h4>cts cc250 st</h4>
                                    <hr style="border-bottom: 2px solid #f47920;width: 100%;">
                                    <img src="<?= BASE_URL; ?>arquivos/assets/img/produtos/produto.png">
                                </div>

                            </div>
                        </div>
                        <div class="text-center">
                            <button type="button" class="btn btn-todos-produtos">VER TODOS</button>
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