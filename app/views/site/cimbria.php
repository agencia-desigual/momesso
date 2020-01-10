<?php $this->view('site/includes/header'); ?>

    <!-- BREADCUMP-->
    <div class="breadcump" style="background-image: url('<?= BASE_URL ?>arquivos/assets/img/breadcump.png');">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <p class="titulo-breadcump">PARCERIA CIMBRIA</p>
                    </div>
                </div>
            </div>
            <hr style="border-top: 1px solid #e39e2c!important;">
            <p class="caminho-breadcump">
                <a href="<?= BASE_URL; ?>">HOME</a> > PARCERIA CIMBRIA
            </p>
        </div>

    </div>
    <!-- FIM BREADCUMP -->

    <!-- CONTEUDO -->
    <div class="container">
        <div class="row margin-conteudo">

            <div class="col-md-6 empresa">
                <br>
                <p>
                    A CIMBRIA, um dos principais produtores do mundo de máquinas e equipamentos para processamento, manuseio e armazenagem de grãos e sementes, inicia a parceria com a Momesso na comercialização, instalação e manutenção aos seus produtos no Brasil.
                    <br>
                    <br>
                    Com esta parceria a MOMESSO e CIMBRIA passam a forner soluções completas e integradas para todo o ciclo desde o beneficiamento de sementes até o tratamento de sementes.
                </p>
            </div>
            <div class="col-md-6 text-center">
                <img style="width: 80%;" src="<?= BASE_URL; ?>arquivos/assets/img/cimbria-logo.png">
            </div>

        </div>
    </div>
    <!-- FIM CONTEUDO -->

<?php $this->view('site/includes/footer'); ?>