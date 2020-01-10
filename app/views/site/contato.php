<?php $this->view('site/includes/header'); ?>

    <!-- BREADCUMP-->
    <div class="breadcump" style="background-image: url('<?= BASE_URL ?>arquivos/assets/img/breadcump.png');">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <p class="titulo-breadcump">CONTATO</p>
                    </div>
                </div>
            </div>
            <hr style="border-top: 1px solid #e39e2c!important;">
            <p class="caminho-breadcump">
                <a href="<?= BASE_URL; ?>">HOME</a> > CONTATO
            </p>
        </div>

    </div>
    <!-- FIM BREADCUMP -->

    <!-- CONTEUDO -->
    <div class="container">
        <div class="row margin-conteudo">
            <!-- FORMULARIO -->
            <div class="col-md-6">

                <div class="titulo-contato">
                    <h1>Entre em contato com a nossa equipe.</h1>
                    <p>Envie dicas, criticas ou sugestões</p>
                </div>

                <div class="card-form-contato">

                    <div style="padding: 50px 30px;" class="container">

                        <!-- TIPO -->
                        <div class="row">
                            <div id="tipoFisico" class="col-md-6 text-center tipo-form tipo-form-ativo">PESSOA FÍSICA<hr id="hrFisico" class="hr-tipo-form hr-tipo-form-ativo"></div>
                            <div id="tipoJuridico" class="col-md-6 text-center tipo-form">PESSOA JURÍDICA<hr id="hrJurudico" class="hr-tipo-form"></div>
                        </div>
                        <!-- FIM TIPO -->

                        <!-- FORMULÁRIO -->
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Nome:">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email:">
                            </div>
                            <div id="tipoCPF" class="form-group">
                                <input type="text" class="form-control" placeholder="CPF:">
                            </div>
                            <div id="tipoCNPJ" style="display: none" class="form-group">
                                <input type="text" class="form-control" placeholder="CNPJ:">
                            </div>
                            <div class="form-group">
                                <input type="tel" class="form-control" placeholder="Telefone:">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <input type="text" class="form-control" placeholder="Cidade:">
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" placeholder="UF:">
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="6" placeholder="Mensagem:"></textarea>
                            </div>
                            <button type="submit" class="btn btn-form-contato">ENVIAR</button>
                        </form>
                        <!-- FIM FORMULÁRIO -->

                    </div>

                </div>

            </div>
            <!-- FIM FORMULARIO -->

            <!-- CONTATO -->
            <div class="col-md-6 dados-contato">

                <img src="<?= BASE_URL; ?>arquivos/assets/img/icone-telefone.png"><p>Telefone</p>
                <h4>+55 18 3642-2460</h4>

                <br>
                <hr>
                <br>

                <img src="<?= BASE_URL; ?>arquivos/assets/img/icone-fax.png"><p>Fax</p>
                <h4>+55 18 3641-5353</h4>

                <br>
                <hr>
                <br>

                <img src="<?= BASE_URL; ?>arquivos/assets/img/icone-endereco.png"><p>Endereço</p>
                <h4>Av. João Cernack, 999, Birigui/SP</h4>
                <h4>CEP: 16200-054</h4>

            </div>
            <!-- FIM CONTATO -->
        </div>
    </div>
    <!-- FIM CONTEUDO -->

    <div style="margin-bottom: -10px">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3717.64777376785!2d-50.346247485112265!3d-21.28540568585992!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9496152a33055ec1%3A0x46effaa8aec1bbb3!2sAv.%20Jo%C3%A3o%20Cernach%2C%20999%20-%20Patrimonio%20Santo%20Antonio%2C%20Birigui%20-%20SP%2C%2016200-054!5e0!3m2!1spt-BR!2sbr!4v1578576137702!5m2!1spt-BR!2sbr" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    </div>

<?php $this->view('site/includes/footer'); ?>