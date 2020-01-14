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

    <!-- CONTEUDO -->
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

                            <!-- DOWNLOAD / ORÇAMENTO -->
                            <div class="row">
                                <?php if(!empty($produto->download)): ?>
                                <div class="col-md-6 text-center">
                                    <?php if(isset($_SESSION['DOWNLOAD'])): ?>
                                    <a href="<?= BASE_STORANGE ?>produto/<?= $produto->id_produto ?>/<?= $produto->download ?>" download>
                                        <button type="button" class="btn btn-download-produto">DOWNLOAD</button>
                                    </a>
                                    <?php else: ?>
                                        <button type="button" class="btn btn-download-produto" data-toggle="modal" data-target="#validarDownload">DOWNLOAD</button>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6 text-center">
                                    <a href="<?= BASE_URL; ?>contato">
                                        <button type="button" class="btn btn-solicitar-orcamento">SOLICITE UM ORÇAMENTO</button>
                                    </a>
                                    <p style="font-size: 13px; letter-spacing: 2px">SEM COMPROMISSO</p>
                                </div>
                                <?php else: ?>
                                <div class="col-md-12 text-center">
                                    <a href="<?= BASE_URL; ?>contato">
                                        <button type="button" class="btn btn-solicitar-orcamento">SOLICITE UM ORÇAMENTO</button>
                                    </a>
                                    <p style="font-size: 13px; letter-spacing: 2px">SEM COMPROMISSO</p>
                                </div>
                                <?php endif; ?>
                            </div>
                            <!-- FIM DOWNLOAD / ORÇAMENTO -->

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
    <!-- FIM CONTEUDO -->

    <!-- Modal -->
    <div class="modal fade" id="validarDownload" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Liberar Download</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form id="usuarioDownload">

                        <div class="form-group">
                            <label>NOME</label>
                            <input name="nome" type="text" class="form-control">
                            <input name="id_produto" type="hidden" value="<?= $produto->id_produto ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>EMPRESA / FAZENDA</label>
                            <input name="empresa" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>EMAIL</label>
                            <input name="email" type="email" class="form-control">
                        </div>
                        <button id="btnEnviar" type="submit" class="btn btn-download-form">ENVIAR</button>

                    </form>

                </div>

            </div>
        </div>
    </div>

<?php $this->view('site/includes/footer'); ?>