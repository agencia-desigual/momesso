<?php $this->view('site/includes/header'); ?>

    <!-- BREADCUMP-->
    <div class="breadcump" style="background-image: url('<?= BASE_URL ?>arquivos/assets/img/breadcump.png');">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <p class="titulo-breadcump">DIFERENCIAL</p>
                    </div>
                </div>
            </div>
            <hr style="border-top: 1px solid #e39e2c!important;">
            <p class="caminho-breadcump">
                <a href="<?= BASE_URL; ?>">HOME</a> > DIFERENCIAL
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
                    São cinco décadas de conhecimento e investimentos em pessoas e equipamentos que fazem com que a Momesso seja além de pioneira, a lider no setor de TSI fornecendo o que há de mais eficiente em tratamento de sementes.
                    <br>
                    <br>
                    A liderança conquistada pela qualidade em seus produtos, a tecnologia apresentada, parque fabril com mais de 6500 mt², revelam os ideais de seus fundadores : De uma Empresa séria que tem como objetivo tornar-se parceira de seus clientes com soluções inteligentes e que proporcione resultados superiores na qualidade e excelência no setor Agro.
                </p>
            </div>
            <div class="col-md-6 text-center">
                <img style="width: 100%;" src="<?= BASE_URL; ?>arquivos/assets/img/a-empresa.png">
            </div>

        </div>
    </div>
    <!-- FIM CONTEUDO -->

<?php $this->view('site/includes/footer'); ?>