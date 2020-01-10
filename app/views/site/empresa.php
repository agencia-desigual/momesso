<?php $this->view('site/includes/header'); ?>

    <!-- BREADCUMP-->
    <div class="breadcump" style="background-image: url('<?= BASE_URL ?>arquivos/assets/img/breadcump.png');">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <p class="titulo-breadcump">EMPRESA</p>
                    </div>
                </div>
            </div>
            <hr style="border-top: 1px solid #e39e2c!important;">
            <p class="caminho-breadcump">
                <a href="<?= BASE_URL; ?>">HOME</a> > EMPRESA
            </p>
        </div>

    </div>
    <!-- FIM BREADCUMP -->

    <!-- CONTEUDO -->
    <div class="container">
        <div class="row margin-conteudo">

            <div class="col-md-6 empresa">
                <h4>A MOMESSO</h4>
                <br>
                <p>
                    Fundada em 18 de junho de 1962 a Momesso Indústria de Máquinas é uma empresa com mais de 50 anos de mercado. Sua atividade principal iniciou no setor da Agroindústria com manutenção de máquinas de beneficiamento de algodão e óleo e a fabricação de equipamentos pulverizadores para agricultura.
                    <br>
                    <br>
                    Na década de 70, a Momesso incluiu em seu portfólio a fabricação de equipamentos específicos desenvolvidos para atender a demanda do mercado como colheitadeiras para Lavoura de Amendoim e de Crotalária para a fabricação de papeis finos.
                    <br>
                    <br>
                    Na década de 80, iniciou a industrialização de seu primeiro modelo de Maquina para Tratamento de sementes: a AMAZONEN TRANSMIX no Brasil, uma máquina inovadora que conciliava o sistema manual/batch para aplicação de Defensivos em Sementes.
                    <br>
                    <br>
                    Na década de 90 após a Patente para fabricação e comercialização Mundial, a Momesso trouxe muitos avanços tecnológicos na área da Agroindústria com a fabricação de maquinas especiais para Tratamento On Farm e os Centros de Tratamento de Sementes Industrial (CTS-I) com exclusivo sistema de aplicação e homogeneização de Defensivos.
                    Na mesma época, expandiu seus negócios para a Industria de plástico com a produção de moinhos trituradores e adiabáticos além de misturadores para segmento.
                    <br>
                    <br>
                    Assim, até os dias de hoje, a Momesso inova com maquinas e equipamentos de alta performance tendo como objetivo oferecer ao mercado Industrial o que há de mais eficiente e moderno nos Segmentos em que atua.
                </p>
            </div>
            <div class="col-md-6 text-center">
                <img style="width: 100%; padding: 150px 0px" src="<?= BASE_URL; ?>arquivos/assets/img/a-empresa.png">
            </div>

        </div>
    </div>
    <!-- FIM CONTEUDO -->

<?php $this->view('site/includes/footer'); ?>