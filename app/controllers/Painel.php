<?php

// NameSpace
namespace Controller;

// Importações
use Helper\Seguranca;
use Model\Categoria;
use Model\Noticia;
use Model\Produto;
use Model\Usuario;
use Sistema\Controller;

// Inicia a classe
class Painel extends Controller
{

    // Objetos
    private $ObjSeguranca;
    private $ObjModelUsuario;

    // Método construtor
    public function __construct()
    {
        // Inicia o pai
        parent::__construct();

        // Instancia os objetos
        $this->ObjSeguranca = new Seguranca();
        $this->ObjModelUsuario = new Usuario();

    } // End >> fun::__construct()


    /**
     * Método responsável por criar um página (view)
     * para realização do login do usuário, caso já esteja
     * logado redireciona o mesmo.
     * -----------------------------------------------------
     * @method GET
     * @url login
     */
    public function login()
    {
        // Verifica se o usuário já está logado
        if(empty($_SESSION["logado"]))
        {
            // Chama a view
            $this->view("painel/login");
        }
        else
        {
            // Como já está logado manda para a página inicial
            header("Location: " . BASE_URL . "painel");
        } // Usuario já está logado

    } // End >> fun::login()


    /**
     * Método resoinsável por eliminar a session de um
     * usuário e exibir para o mesmo a view de login.
     * -----------------------------------------------------
     * @method GET
     * @url sair
     */
    public function sair()
    {
        // Remove a session do usuario
        session_destroy();

        // Chama a view de login
        $this->view("painel/login");

    } // End >> fun::sair()


    /**
     * Método responsável por criar a página (view)
     * inicial do painel administrativo, buscando
     * todas as informações necessárias.
     * -----------------------------------------------------
     * @method GET
     * @url painel
     */
    public function dashboard()
    {
        // Seguranca
        $this->ObjSeguranca->security();

        // Variaveis
        $dados = null;

        // Models
        $ObjCategoria = new Categoria();
        $ObjProduto = new Produto();
        $ObjNoticia = new Noticia();
        $ObjUsuario = $this->ObjModelUsuario;
        $ObjImagem = new \Model\Imagem();

        // As ultimas noticias
        $noticias = $ObjNoticia->get(null, "id_noticia DESC", 5)
            ->fetchAll(\PDO::FETCH_OBJ);

        // Os ultimos produtos
        $produtos = $ObjProduto->get(null, "id_produto DESC", 5)
            ->fetchAll(\PDO::FETCH_OBJ);

        // Percorre os produtos
        foreach ($produtos as $prod)
        {
            // Busca a categoria do produto
            $cat = $ObjCategoria->get(["id_categoria" => $prod->id_categoria])
                ->fetch(\PDO::FETCH_OBJ);

            // Add o nome da categoria ao produto
            $prod->categoria = $cat->nome;
        }

        // Array da view
        $dados = [
            "total" => [
                "categorias" => $ObjCategoria->get()->rowCount(),
                "produtos" => $ObjProduto->get()->rowCount(),
                "noticias" => $ObjNoticia->get()->rowCount(),
                "usuarios" => $ObjUsuario->get()->rowCount()
            ],
            "produtos" => $produtos,
            "noticias" => $noticias
        ];

        // Chama  a view
        $this->view("painel/dashboard", $dados);

    } // End >> fun::dashboard()


    /**************************************************
     **                 MÉTODOS AJAX
     **************************************************/


    /**
     * Método responsável por realizar as validações necessárias
     * e realizar o login do usuário caso de verdadeiro.
     * ----------------------------------------------------------
     * @method POST
     * @url login
     */
    public function jx_login()
    {
        // Variaveis
        $dados = null;
        $usuario = null;
        $post = null;

        // Recupera os dados post
        $post = $_POST;

        // Verifica se informou os dados obrigatorios
        if(!empty($post["email"]) && !empty($post["senha"]))
        {
            // Criptografa a senha
            $post["senha"] = md5($post["senha"]);

            // Deixa o email tudo minusculo e remove os espaços
            $post["email"] = strtolower($post["email"]);
            $post["email"] = str_replace(" ", "", $post["email"]);

            // Busca o usuario
            $usuario = $this->ObjModelUsuario->get([
                "email" => $post["email"],
                "senha" => $post["senha"]
            ]);

            // Verifica se houve retorno
            if($usuario->rowCount() > 0)
            {
                // Fetch
                $usuario = $usuario->fetch(\PDO::FETCH_OBJ);

                // Realiza o login na session
                $this->ObjSeguranca->login($usuario);

                // Dados de retorno
                $dados = [
                    "tipo" => true,
                    "code" => 200,
                    "mensagem" => "Sucesso! Aguarde...",
                    "objeto" => [
                        "usuario" => $usuario
                    ]
                ];

            }
            else
            {
                // Mensagem
                $dados = ["mensagem" => "E-mail ou senha informados estão incorretos."];

            } // Errror - Dados de login incorretos

        }
        else
        {
            // Avisa que deu ruim
            $dados = ["mensagem" => "E-mail ou senha não informados."];
        } // Error - Email ou senha n foi informado.

        // Retorno
        $this->api($dados);

    } // End >> fun >> jx_login()

} // End >> Class::Painel