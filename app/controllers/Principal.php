<?php
/**
 * Created by PhpStorm.
 * User: Igor
 * Date: 26/03/2019
 * Time: 18:29
 */

namespace Controller;

use Sistema\Controller as CI_controller;
use Sistema\Helper\Email;


class Principal extends CI_controller
{
    // Variáveis pirvadas
    private $email;

    // Método construtor
    function __construct()
    {
        // Carrega o contrutor da classe pai
        parent::__construct();

        $this->email = new Email();

    } // End >> fun::__construct()


    /**
     * Método responsável por gerar a página inicial
     * do site.
     * ------------------------------------------------
     * @method GET
     * @url BASE_URL
     */
    public function index()
    {
        // Variaveis
        $dados = null;
        $noticias = null;
        $produtos = null;

        // Objetos
        $ObjNoticia = new \Model\Noticia();
        $ObjProduto = new \Model\Produto();
        $ObjImagem  = new \Model\Imagem();

        // Busca o SEO
        $dados = $this->getSEO();


        // Busca as 3 ultimas noticias
        $noticias = $ObjNoticia->get(null, "id_noticia DESC", 3)
            ->fetchAll(\PDO::FETCH_OBJ);

        // Percorre todos as noticias
        foreach ($noticias as $not)
        {
            // Verifica se tem imagem
            if(!empty($not->imagem))
            {
                $not->imagem = BASE_STORANGE . "noticia/" . $not->imagem;
            }
            else
            {
                $not->imagem = BASE_URL . "arquivos/assets/img/not-found.jpg";
            }
        }



        // Busca os 3 ultimos produtos
        $produtos = $ObjProduto->get(null, "id_produto DESC", 3)
            ->fetchAll(\PDO::FETCH_OBJ);

        // Percorre todos os produtos
        foreach ($produtos as $prod)
        {
            // Busca a capa
            $imagem = $ObjImagem
                ->get(["id_produto" => $prod->id_produto, "capa" => true])
                ->fetch(\PDO::FETCH_OBJ);

            // Verifica a tem imagem
            if(!empty($imagem))
            {
                $prod->imagem = BASE_STORANGE . "produto/{$prod->id_produto}/" . $imagem->imagem;
            }
            else
            {
                $prod->imagem = BASE_URL . "arquivos/assets/img/not-found.jpg";
            }
        }


        // Adiciona ao array
        $dados["noticias"] = $noticias;
        $dados["produtos"] = $produtos;

        // Chama a view da home
        $this->view("site/index", $dados);

    } // End >> fun>::error404()


    /**
     * Método responsável por exiber uma página de error
     * 404. Esse método será chamado automaticamente sempre
     * que um usuário acessar uma rota restrita.
     */
    public function error404()
    {
        // Chama a view do erro 404
        $this->view("site/error/404");

    } // End >> fun>::error404()


    /**
     * Página de contato.
     * ------------------------------------------------
     * @method GET
     * @url BASE_URL/contato
     */
    public function contato()
    {
        $dados = $this->getSEO();

        // Chama a view de contato
        $this->view("site/contato",$dados);
    }


    /**
     * Página institucional sobre a empresa
     * ------------------------------------------------
     * @method GET
     * @url BASE_URL/empresa
     */
    public function empresa()
    {
        $dados = $this->getSEO();

        // Chama a view da empresa
        $this->view("site/empresa",$dados);
    }


    /**
     * Página Diferencial
     * ------------------------------------------------
     * @method GET
     * @url BASE_URL/diferencial
     */
    public function diferencial()
    {
        $dados = $this->getSEO();

        // Chama a view de diferencial
        $this->view("site/diferencial",$dados);
    }


    /**
     * Página sobre a parceira cimbria
     * ------------------------------------------------
     * @method GET
     * @url BASE_URL/cimbria
     */
    public function cimbria()
    {
        $dados = $this->getSEO();

        // Chama a view da cimbria
        $this->view("site/cimbria",$dados);
    }


    /**
     * Página com formulário para envio de curriculo
     * ------------------------------------------------
     * @method GET
     * @url BASE_URL/trabalhe-conosco
     */
    public function trabalheConosco()
    {
        $dados = $this->getSEO();

        // Chama a view de trabalhe conosco
        $this->view("site/trabalhe-conosco",$dados);
    }

  
    public function noticiaDetalhes()
    {
        //Pegar o SEO da noticia, principalmento do SMO do face
        $dados = $this->getSEO();

        // Chama a view de noticias
        $this->view("site/noticia-detalhes",$dados);
    }



    /**
     * Método responsável por validar  e fazer o
     * envio do formulario de contato do site.
     * ------------------------------------------------
     * @method POST
     */
    public function ajaxContato()
    {
        if (isset($_POST))
        {
            //Verificando se é pessoa fisica ou juridica
            if(empty($_POST['cpf'])){ unset($_POST['cpf']); $tipo = "PESSOA JURÍDICA"; }
            if(empty($_POST['cnpj'])){ unset($_POST['cnpj']); $tipo = "PESSOA FÍSICA"; }

            // Variáveis do formulário
            $data = date("d/m/Y H:i:s");
            $hora = date("H:i:s");

            //Setando a mensagem a ser enviada
            $mensagemEmail = "Olá você está recebendo uma mesnsagem do formulário de <b>Contato</b> abaixo estão os detalhes:<br>".
                              "<br>
                              <b>TIPO PESSOA: </b>".$tipo."<br>
                              <b>NOME: </b>".$_POST['nome']."<br>
                              <b>E-MAIL: </b>".$_POST['email']."<br>
                              <b>CPF: </b>".$_POST['cpf']."<br>
                              <b>TELEFONE: </b>".$_POST['telefone']."<br>
                              <b>CIDADE: </b>".$_POST['cidade']."<br>
                              <b>ESTADO: </b>".strtoupper($_POST['estado'])."<br>
                              <b>MENSAGEM: </b>".$_POST['mensagem']."<br>
                              <br><br><p style='font-style: italic'>Página: ".BASE_URL."contato</p><p style='font-style: italic'>Enviada em ".$data."  ás ".$hora."</p>";


            /*CONDIGURAÇÕES DO EMAIL DE ENVIO*/
            $this->email->setConfiguracoes([
                'autenticacao' => true,
                'assunto' => 'MOMESSO® - Contato',
                'charset' => 'UTF-8',
                'host' => 'smtp.gmail.com',
                'port' => 465,
                'seguranca' => 'ssl',
                'email' => 'mail@desigual.com.br',
                'senha' => 'Desigu@al#!147'
            ]);

            /*CONFIGURAÇÕES DO REMETENTE*/
            $this->email->setRemetente([
                'nome' => $_POST['nome'],
                'email' => $_POST['email']
            ]);

            /*CONFIGURAÇÕES DESTINATARIOS*/
            $this->email->setDestinatarios([['edilson@desigual.com.br','Contato - MOMESSO®']]);
            $this->email->setMensagem($mensagemEmail);

            if($this->email->enviaEmail()){
                $dados = [
                    "tipo" => true,
                    "mensagem" => "Mensagem enviada com sucesso, aguarde nosso retorno!"
                ];
            }
            else
            {
                $dados = [
                    "tipo" => false,
                    "mensagem" => "Erro ao enviar, tente mais tarde!",
                ];
            }
        }
        else
        {
            $dados = [
                "tipo" => false,
                "mensagem" => "Dados não enviado"
            ];
        }

        echo json_encode($dados);

    } // End >> fun::ajaxContato()

} // END::Class Principal