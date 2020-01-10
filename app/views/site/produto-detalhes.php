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
        <div style="padding: 60px 0px;" class="container">

            <div class="row">

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
                        <div style="padding: 0px 30px;" class="container">

                            <div class="row produtos">
                                <div class="col-md-12">
                                    <h3>Centro de Tratamento de Sementes</h3>
                                    <h2>CTS cc250 st</h2>
                                    <hr style="border-top: 2px solid #ccc;">
                                </div>
                                <img class="thumb-produto" src="<?= BASE_URL; ?>arquivos/assets/img/produtos/produto-thumb.png">
                            </div>
                            <hr style="border-top: 2px solid #ccc;">
                            <div class="text-center">
                                <button type="button" class="btn btn-solicitar-orcamento">SOLICITE UM ORÇAMENTO</button>
                                <p style="font-size: 13px; letter-spacing: 2px">SEM COMPROMISSO</p>
                            </div>
                            <br>
                            <br>
                            <div class="row produtos">
                                <div class="col-md-12">
                                    <h3>Centro de Tratamento de Sementes</h3>
                                    <hr style="border-top: 2px solid #ccc;">
                                </div>
                                <p class="container">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget metus eget est finibus lobortis. Ut efficitur, ex vitae volutpat tempor, arcu leo aliquam velit, et pulvinar diam massa vitae elit. Fusce mollis augue elit, vel tincidunt lectus iaculis tincidunt. Quisque elit dui, ornare id orci sit amet, vestibulum porta nibh. Praesent volutpat, purus a hendrerit accumsan, ligula massa lobortis turpis, vel imperdiet est orci a tortor. Mauris tempus lacinia tellus, eu convallis ligula bibendum et. Vestibulum nec leo sodales, consequat risus vel, porttitor justo. Aenean fringilla ante vitae odio volutpat hendrerit.

                                    Aliquam auctor risus at fringilla luctus. Donec scelerisque dui mi, sed congue neque condimentum vitae. Curabitur malesuada leo in felis posuere consequat. Proin tincidunt hendrerit leo, et consectetur diam efficitur in. Curabitur molestie, dolor quis facilisis faucibus, est eros molestie nulla, vitae dignissim risus ipsum ut erat. Sed ligula urna, tempus id arcu at, ullamcorper ornare eros. Aliquam eleifend risus nec diam hendrerit efficitur. Vestibulum rhoncus leo eu est maximus convallis. Donec felis nibh, fringilla vitae justo vitae, finibus venenatis ante. Aenean ac eleifend leo, mattis consequat ipsum.
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