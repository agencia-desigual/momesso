<?php

// NameSpace
namespace Controller;

// Importação
use Helper\Seguranca;
use Model\Imagem;
use Sistema\Controller;

// Classe
class Produto extends Controller
{
    // Objetos
    private $ObjSeguranca;
    private $ObjModelCategoria;
    private $ObjModelProduto;
    private $ObjModelImagem;

    // Metodo Construtor
    public function __construct()
    {
        // Chama o pai
        parent::__construct();

        // Instancia os objetos
        $this->ObjSeguranca = new Seguranca();
        $this->ObjModelCategoria = new \Model\Categoria();
        $this->ObjModelProduto = new \Model\Produto();
        $this->ObjModelImagem = new Imagem();

    } // End >> fun::__construct()



    /**
     * Método responsável por gerar uma view que
     * lista todos os produtos cadastrados no
     * banco de dados.
     * ----------------------------------------------
     * @method GET
     * @url painel/produtos
     */
    public function painel_exibirTodos()
    {
        // Seguranca
        $this->ObjSeguranca->security();

        // Variaveis
        $dados = null;
        $produtos = null;
        $imagem = null;
        $categoria = null;

        // Busca todos os produtos
        $produtos = $this->ObjModelProduto->get()
            ->fetchAll(\PDO::FETCH_OBJ);

        // Percorre todos os produtos retornados
        foreach ($produtos as $produto)
        {
            // Busca a categoria do produto
            $categoria = $this->ObjModelCategoria->get(["id_categoria" => $produto->id_categoria])
                ->fetch(\PDO::FETCH_OBJ);

            // Busca a imagem capa do produto
            $imagem = $this->ObjModelImagem->get(["id_produto" => $produto->id_produto, "capa" => true])
                ->fetch(\PDO::FETCH_OBJ);

            // Adiciona os objetos ao produto
            $produto->categoria = $categoria;
            $produto->imagem = $imagem;
         }

        // Array de exibição na view
        $dados = [
            "js" => ["Produto"],
            "produtos" => $produtos
        ];

        // Chama a view
        $this->view("painel/produto/todos", $dados);

    } // End >> fun::painel_exibirTudo()


    /**
     * Método responsável por gerar uma view
     * que exibe um formulário para cadastro
     * de um novo produto
     * -----------------------------------------------
     * @method GET
     * @url painel/produtos/adicionar
     */
    public function painel_adicionar()
    {
        // Seguranca
        $this->ObjSeguranca->security();

        // Variaveis
        $dados = null;
        $categorias = null;

        // Busca todas as categorias FILHO
        $categorias = $this->ObjModelCategoria->get(["id_categoria_mae" => "IS NOT NULL"])
            ->fetchAll(\PDO::FETCH_OBJ);

        // Array de exibição na view
        $dados = [
            "js" => ["Produto"],
            "categorias" => $categorias
        ];

        // Chama a view
        $this->view("painel/produto/adicionar", $dados);

    } // End >> fun::painel_adicionar()


    /**
     * Método responsável por gerar uma view com
     * formulário para alterar um determindado produto
     * -----------------------------------------------
     * @param $id
     * -----------------------------------------------
     * @method GET
     * @url painel/produtos/alterar/[ID]
     */
    public function painel_alterar($id)
    {
        // Seguranca
        $this->ObjSeguranca->security();

        // Variaveis
        $dados = null;
        $categorias = null;
        $produto = null;

        // Busca o produto
        $produto = $this->ObjModelProduto->get(["id_produto" => $id]);

        // Verifica se encontrou o produto
        if($produto->rowCount() > 0)
        {
            // Fetch
            $produto = $produto->fetch(\PDO::FETCH_OBJ);

            // Busca as categorias FILHO
            $categorias = $this->ObjModelCategoria
                ->get(["id_categoria_mae" => "IS NOT NULL"])
                ->fetchAll(\PDO::FETCH_OBJ);

            // Array de exibição na view
            $dados = [
                "js" => ["Produto"],
                "produto" => $produto,
                "categorias" => $categorias
            ];

            // Chama a view
            $this->view("painel/produto/editar", $dados);
        }
        else
        {
            // 404
            $this->view("site/error/404");

        } // Error - Produto informado não foi encontrado.

    } // End >> fun::painel_alterar()


    /**
     * Método responsável por gerar uma página para
     * a exibição detalhada de um produto.
     * -----------------------------------------------
     * @param $id
     * -----------------------------------------------
     * @method GET
     * @method painel/produtos/[ID]
     */
    public function painel_detalhes($id)
    {
        // Seguranca
        $this->ObjSeguranca->security();

        // Variaveis
        $dados = null;
        $produto = null;
        $categoria = null;
        $imagens = null;

        // Busca o produto
        $produto = $this->ObjModelProduto
            ->get(["id_produto" => $id])
            ->fetch(\PDO::FETCH_OBJ);

        // Verifica se encontrou
        if(!empty($produto))
        {
            // Busca a categoria
            $categoria = $this->ObjModelCategoria
                ->get(["id_categoria" => $produto->id_categoria])
                ->fetch(\PDO::FETCH_OBJ);

            // Busca as imagens
            $imagens = $this->ObjModelImagem
                ->get(["id_produto" => $id])
                ->fetchAll(\PDO::FETCH_OBJ);

            // Array de exibição na view
            $dados = [
                "js" => ["Produto", "Imagem"],
                "produto" => $produto,
                "categoria" => $categoria,
                "imagens" => $imagens
            ];

            // Chama a view
            $this->view("painel/produto/detalhe", $dados);

        }
        else
        {
            // 404
            $this->view("site/error/404");

        } // Error - 404

    } // End >> fun::painel_detalhes()


    /**************************************************
     **                 MÉTODOS AJAX                 **
     **************************************************/


    /**
     * Método responsável por deletar um determinado produto
     * e todas as suas imagens. Tanto do banco como do
     * servidor de armazenamento.
     * ------------------------------------------------------
     * @param int $id
     * ------------------------------------------------------
     * @method DELETE
     * @url produto/delete/[ID]
     */
    public function jx_delete($id)
    {
        // Segurança
        $this->ObjSeguranca->security();

        // Variaveis
        $dados = null;
        $produto = null;
        $imagens = null;

        // Busca o produto
        $produto = $this->ObjModelProduto->get(["id_produto" => $id]);

        // Verifica se encontrou o produto
        if($produto->rowCount() > 0)
        {
            // Fetch
            $produto = $produto->fetch(\PDO::FETCH_OBJ);

            // Busca as imagens do produto
            $imagens = $this->ObjModelImagem->get(["id_produto" => $id])
                ->fetchAll(\PDO::FETCH_OBJ);

            // Percorre todas as imagens
            foreach ($imagens as $img)
            {
                // Deleta a img do banco
                $this->ObjModelImagem->delete(["id_imagem" => $img->id_imagem]);

                // Deleta a imagem do storage
                unlink("./storage/produto/{$id}/{$img->imagem}");
            }

            // Deleta o produto
            if($this->ObjModelProduto->delete(["id_produto" => $id]) != false)
            {
                // Deleta a pasta do produto
                rmdir("./storage/produto/{$id}/");

                // Array de sucesso
                $dados = [
                    "tipo" => true,
                    "code" => 200,
                    "mensagem" => "Produto deletado com sucesso.",
                    "objeto" => $produto
                ];
            }
            else
            {
                // Msg
                $dados = ["mensagem" => "Ocorreu um erro ao deletar o produto."];
            } // Error - Ocorreu um erro ao deletar o produto.

        }
        else
        {
            // Msg
            $dados = ["mensagem" => "Produto informado não foi encontrado."];
        } // Error - Produto n encontrado

        // Retorno
        $this->api($dados);

    } // End >> fun::jx_delete()


    /**
     * Método responsável por receber todos os dados
     * necessários para realizar uma inclusão de
     * um novo produto.
     * -------------------------------------------------------
     * @method POST
     * @url produto/insert
     */
    public function jx_insert()
    {
        // Seguranca
        $this->ObjSeguranca->security();

        // Variaveis
        $dados = null;
        $salva = null;
        $produto = null;
        $categoria = null;

        // Recupera os dados post
        $post = $_POST;

        // Verifica se informou os itens obrigatórios
        if(!empty($post["nome"]) &&
           !empty($post["id_categoria"]) &&
           !empty($post["slug"]) &&
           !empty($post["descricao"]))
        {
            // Array de inserção
            $salva = [
                "nome" => $post["nome"],
                "slug" => strtolower($post["slug"]),
                "descricao" => $post["descricao"]
            ];

            // Busca a categoria
            $categoria = $this->ObjModelCategoria->get(["id_categoria" => $post["id_categoria"]]);

            // Verifica se encontrou
            if($categoria->rowCount() > 0)
            {
                // Fetch
                $categoria = $categoria->fetch(\PDO::FETCH_OBJ);

                // Add a categoria no array
                $salva["id_categoria"] = $categoria->id_categoria;

                // Insere o produto
                $produto = $this->ObjModelProduto->insert($salva);

                // Verifica se inseriu
                if($produto != false)
                {
                    // Busca o produto
                    $produto = $this->ObjModelProduto->get(["id_produto" => $produto])
                        ->fetch(\PDO::FETCH_OBJ);

                    // Cria o diretorio
                    mkdir("./storage/produto/{$produto->id_produto}/", 0777, true);

                    // Adiciona a categoria
                    $produto->categoria = $categoria;

                    // Array de sucesso
                    $dados = [
                        "tipo" => true,
                        "code" => 200,
                        "mensagem" => "Produto adicionado com sucesso.",
                        "objeto" => $produto
                    ];

                }
                else
                {
                    // Msg
                    $dados = ["mensagem" => "Ocorreu um erro ao inserir produto."];

                } // Error - Erro ao inserir produto

            }
            else
            {
                // Msg
                $dados = ["mensagem" => "Categoria informada não foi encontrada."];

            } // Error - Categoria n existe

        }
        else
        {
            // Msg
            $dados = ["mensagem" => "Campos obrigatórios não informados."];
        } // Error - Não informou os dados obrigatorios

        // Retorno
        $this->api($dados);

    } // End >> fun::jx_insert()


    /**
     * Método responsável por receber os dados e
     * modificar um determinado produto existente.
     * -------------------------------------------------------
     * @param $id
     * -------------------------------------------------------
     * @method POST
     * @url produto/update/[ID]
     */
    public function jx_update($id)
    {
        // Segurança
        $this->ObjSeguranca->security();

        // Variaveis
        $dados = null;
        $produto = null;
        $produtoAlterado = null;
        $altera = null;

        // Recupera os dados POST
        $post = $_POST;

        // Busca o produto
        $produto = $this->ObjModelProduto->get(["id_produto" => $id]);

        // Verifica se encontrou o produto
        if($produto->rowCount() > 0)
        {
            // Fetch
            $produto = $produto->fetch(\PDO::FETCH_OBJ);

            // Dados a serem modificados =========================
            //====================================================

            // Verifica se alterou o nome
            if($produto->nome != $post["nome"])
            {
                // Add no array de alteração
                $altera["nome"] = $post["nome"];
            }

            // Verifica se alterou a categoria
            if($produto->id_categoria != $post["id_categoria"])
            {
                // Add ao array
                $altera["id_categoria"] = $post["id_categoria"];
            }

            // Verifica se modificou o slug
            if($produto->slug != $post["slug"])
            {
                // Add ao array
                $altera["slug"] = $post["slug"];
            }

            // Verifica se modificou a descricao
            if($produto->descricao != $post["descricao"])
            {
                // Add no array
                $altera["descricao"] = $post["descricao"];
            }

            // ===================================================
            // ===================================================

            // Verifica se houve alteração
            if($altera != null)
            {
                // Altera e verifica
                if($this->ObjModelProduto->update($altera, ["id_produto" => $id]) != false)
                {
                    // Busca o produto alterado
                    $produtoAlterado = $this->ObjModelProduto
                        ->get(["id_produto" => $id])
                        ->fetch(\PDO::FETCH_OBJ);

                    // Retorno de sucesso
                    $dados = [
                        "tipo" => true,
                        "code" => 200,
                        "mensagem" => "Produto alterado com sucesso.",
                        "objeto" => [
                            "antigo" => $produto,
                            "atual" => $produtoAlterado
                        ]
                    ];

                }
                else
                {
                    // MSG
                    $dados = ["mensagem" => "Ocorreu um erro ao alterar produto."];

                } // Error - Ocorreu um erro ao alterar produto.

            }
            else
            {
                // Msg
                $dados = ["mensagem" => "Nada está sendo modificado."];

            } // Error - Nada está sendo modificado.

        }
        else
        {
            // Msg
            $dados = ["mensagem" => "Produto informado não foi encontrado."];

        } // Error - Produto não encontrado

        // Retorno
        $this->api($dados);

    } // End >> fun::jx_update()

} // End >> Class::Produto