<?php $this->view('site/includes/header'); ?>
<style>
    @media only screen and (max-width: 430px) {

        .breadcump{ height: 250px; }

    }
</style>

    <!-- BREADCUMP-->
    <div class="breadcump" style="background-image: url('<?= BASE_URL ?>arquivos/assets/img/breadcump.png');">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <p class="titulo-breadcump">TRABALHE CONOSCO</p>
                    </div>
                </div>
            </div>
            <hr style="border-top: 1px solid #e39e2c!important;">
            <p class="caminho-breadcump">
                <a href="<?= BASE_URL; ?>">HOME</a> > TRABALHE CONOSCO
            </p>
        </div>

    </div>
    <!-- FIM BREADCUMP -->

    <!-- CONTEUDO -->
    <div class="container">
        <div class="row margin-conteudo">
            <div class="col-md-12 empresa">
                <h4 class="text-center">VENHA FAZER PARTE DA NOSSA EQUIPE</h4>
                <br>
                <p class="text-center">
                    A Momesso valoriza e respeita seus colaboradores. Venha fazer parte dessa equipe de <br> profissionais, envie seu currículo e aguarde nosso contato.
                </p>
                <br>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card-form-contato">

                    <div style="padding: 50px 30px;" class="container">

                        <!-- FORMULÁRIO -->
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Nome:">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email:">
                            </div>
                            <div class="form-group">
                                <input type="file" class="dropify">
                            </div>
                            <button type="submit" class="btn btn-form-contato">ENVIAR</button>
                        </form>
                        <!-- FIM FORMULÁRIO -->

                    </div>

                </div>
            </div>
            <div class="col-md-2"></div>

        </div>
    </div>
    <!-- FIM CONTEUDO -->

<?php $this->view('site/includes/footer'); ?>