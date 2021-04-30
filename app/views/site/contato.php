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

                        <!--  ----------------------------------------------------------------------  -->
                        <!--  NOTA: Adicione o seguinte elemento <META> à sua página <HEAD>.  Se      -->
                        <!--  necessário, modifique o parâmetro charset para especificar o conjunto   -->
                        <!--  de caracteres de sua página HTML.                                       -->
                        <!--  ----------------------------------------------------------------------  -->

                        <META HTTP-EQUIV="Content-type" CONTENT="text/html; charset=UTF-8">

                        <!--  ----------------------------------------------------------------------  -->
                        <!--  NOTA: Adicione o elemento <FORM> a seguir à sua página.                 -->
                        <!--  ----------------------------------------------------------------------  -->

                        <form action="https://webto.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="POST">

                            <input type=hidden name="oid" value="00D15000000NBUe">
                            <input type=hidden name="retURL" value="http://www.momesso.ind.br/">

                            <!--  ----------------------------------------------------------------------  -->
                            <!--  NOTA: Estes campos são elementos de depuração opcionais. Remova o       -->
                            <!--  comentário dessas linhas se quiser testar no modo de depuração.         -->
                            <!--  <input type="hidden" name="debug" value=1>                              -->
                            <!--  <input type="hidden" name="debugEmail"                                  -->
                            <!--  value="momesso-sf@beecloud.com.br">                                     -->
                            <!--  ----------------------------------------------------------------------  -->

                            <input class="form-control" placeholder="Nome"  id="first_name" maxlength="80" name="first_name" size="20" type="text" /><br>

                            <input class="form-control" placeholder="Sobrenome"  id="last_name" maxlength="80" name="last_name" size="20" type="text" /><br>

                            <input class="form-control" placeholder="Email" id="email" maxlength="80" name="email" size="20" type="text" /><br>

                            <input class="form-control" placeholder="CPF" id="00N1500000FRcU2" maxlength="25" name="00N1500000FRcU2" size="20" type="text" /><br>

                            <input class="form-control" placeholder="CNPJ" id="00N1500000FRySK" maxlength="25" name="00N1500000FRySK" size="20" type="text" /><br>

                            <input class="form-control" placeholder="Telefone" id="phone" maxlength="40" name="phone" size="20" type="text" /><br>

                            <input class="form-control" placeholder="Celular" id="mobile" maxlength="40" name="mobile" size="20" type="text" /><br>

                            <input class="form-control" placeholder="Cidade" id="city" maxlength="40" name="city" size="20" type="text" /><br>

                            <input class="form-control" placeholder="UF" id="state" maxlength="20" name="state" size="20" type="text" /><br>

                            <input class="form-control" placeholder="Produto" id="00N3m00000QYiw1" maxlength="255" name="00N3m00000QYiw1" size="20" type="text" value="<?= (!empty($produto)) ? $produto->nome : '' ?>" /><br>

                            <textarea class="form-control" placeholder="Mensagem" id="00N1500000FRcTd" name="00N1500000FRcTd" rows="4" type="text" wrap="soft"></textarea><br>

                            <!-- Origem do lead -->
                            <input id="lead_source" type=hidden name="lead_source" value="Email">

                            <!-- Tipo de lead -->
                            <input  id="00N1500000GBQZH" type=hidden name="00N1500000GBQZH" value="Plásticos">

                            <input type="submit" class="btn btn-form-contato" name="submit">

                        </form>



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
                <h4>Av. João Cernach, 999, Birigui/SP</h4>
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