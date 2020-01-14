<?php

// NameSpace
namespace Controller;

// Importação
use Helper\Seguranca;
use Model\Imagem;
use Sistema\Controller;
use Sistema\Helper\File;

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
     * Método responsável por exibir todos
     * os produtos cadastrados. Ou de uma
     * categoria mãe especifica.
     * ----------------------------------------------
     * @param null $slug
     * ----------------------------------------------
     * @method GET
     * @url produtos
     * @url produtos/[SLUG]
     */
    public function exibirTodos($slug = null)
    {
        // Variaveis
        $dados = null;
        $categorias = null;
        $produtos = null;

        // Where
        $where = ["id_categoria_mae" => "IS NULL"];

        // Busca os dados SEO
        $dados = $this->getSEO();

        // Se é os produtos de uma categoria especifica
        if(!empty($slug))
        {
            // Adiciona a condição
            $where["slug"] = $slug;
        }


        // Busca todas as categorias Mães
        $categorias = $this->ObjModelCategoria
            ->get($where)
            ->fetchAll(\PDO::FETCH_OBJ);

        // Verifica se encontrou a categoria
        if(!empty($categorias))
        {
            // Percorre as categorias encontradas
            foreach ($categorias as $cat)
            {
                // Busca as categorias filho
                $catFilho = $this->ObjModelCategoria
                    ->get(["id_categoria_mae" => $cat->id_categoria])
                    ->fetchAll(\PDO::FETCH_OBJ);

                // Percorre as categorias filho
                foreach ($catFilho as $filho)
                {
                    // Busca os produtos
                    $prod = $this->ObjModelProduto
                        ->get(["id_categoria" => $filho->id_categoria], "id_produto DESC", 3)
                        ->fetchAll(\PDO::FETCH_OBJ);

                    // Percorre os produtos
                    foreach ($prod as $p)
                    {
                        // Busca a imagem de capa do produto
                        $imagem = $this->ObjModelImagem
                            ->get(["id_produto" => $p->id_produto, "capa" => true])
                            ->fetch(\PDO::FETCH_OBJ);

                        // Verifica se teve retorno
                        if(!empty($imagem))
                        {
                            // Adiciona a imagem ao produto
                            $p->capa = BASE_STORANGE . "produto/" . $p->id_produto . "/" . $imagem->imagem;
                        }
                        else
                        {
                            // N possui imagem
                            $p->capa = BASE_URL . "arquivos/assets/img/not-found.jpg";
                        }
                    }


                    // Busca os produtos relacionados
                    $produtos[] = [
                        "categoria" => $filho,
                        "produtos" => $prod,
                    ];
                }

                // Add as categorias filhos
                $cat->categorias = $catFilho;
            }

            // Adiciona o conteuda ao array de exibição
            $dados["categorias"] = $categorias;
            $dados["produtos"] = $produtos;

            // Chama a view de produtos
            $this->view("site/produtos",$dados);
        }
        else
        {
            // Chama a view
            $this->view("site/error/404");

        } // Error - 404

    } // End >> fun::exibirTodos()


    /**
     * Método responsável por criar uma view
     * que exiba os produtos de uma categoria
     * especifica.
     * ----------------------------------------------
     * @param null $id
     * @param null $slug
     * ----------------------------------------------
     * @method GET
     * @url produtos/categoria/[ID]/[SLUG]
     */
    public function exibirCategoria($id = null, $slug = null)
    {
        // Variaveis
        $dados = null;
        $categoria = null;
        $categoriaMae = null;
        $produtos = null;

        // Busca o SEO
        $dados = $this->getSEO();

        // Busca a categoria
        $categoria = $this->ObjModelCategoria
            ->get(["id_categoria" => $id, "slug" => $slug])
            ->fetch(\PDO::FETCH_OBJ);

        // Verifica se encontrou a categoria
        if(!empty($categoria))
        {
            // Verifica se é categoria mãe
            if(!empty($categoria->id_categoria_mae))
            {
                // Busca a categoria mae
                $categoriaMae = $this->ObjModelCategoria
                    ->get(["id_categoria" => $categoria->id_categoria_mae])
                    ->fetch(\PDO::FETCH_OBJ);

                // Busca as categorias da categoria mae
                $categoriaMae->categorias = $this->ObjModelCategoria
                    ->get(["id_categoria_mae" => $categoriaMae->id_categoria])
                    ->fetchAll(\PDO::FETCH_OBJ);

                // Busca os produtos da categoria atual
                $produtos = $this->ObjModelProduto
                    ->get(["id_categoria" => $categoria->id_categoria])
                    ->fetchAll(\PDO::FETCH_OBJ);

                // Percorre todos os produtos
                foreach ($produtos as $prod)
                {
                    // Busca a imagem
                    $imagem = $this->ObjModelImagem
                        ->get(["id_produto" => $prod->id_produto, "capa" => true])
                        ->fetch(\PDO::FETCH_OBJ);

                    // Verifica se possui
                    if(!empty($imagem))
                    {
                        // Add a capa
                        $prod->capa = BASE_STORANGE . "produto/" . $prod->id_produto . "/" . $imagem->imagem;
                    }
                    else
                    {
                        // Não possui caoa
                        $prod->capa = BASE_URL . "arquivos/assets/img/not-found.jpg";
                    }
                }

                // Array de exibição na view
                $dados["categorias"] = $categoriaMae;
                $dados["categoria"] = $categoria;
                $dados["produtos"] = $produtos;

                // Chama a view
                $this->view("site/produtos-categoria", $dados);
            }
            else
            {
                // Chama a exibirTodos
                $this->exibirTodos($slug);
            } // É categoria mãe
        }
        else
        {
            // Chama a view
            $this->view("site/error/404");
        } // Error - 404

    } // End >> fun::exibirCategoria()


    /**
     * Método responsável por criar uma exibição de um
     * produto especifico.
     * ----------------------------------------------
     * @param $id
     * @param $slug
     * ----------------------------------------------
     * @method GET
     * @url produtos/detalhe/[ID]/[SLUG]
     */
    public function detalhes($id, $slug)
    {
        // Variaveis
        $dados = null;
        $categorias = null;
        $imagens = null;
        $produto = null;

        // Busca os dados do SEO
        $dados = $this->getSEO();

        // Busca o produto
        $produto = $this->ObjModelProduto
            ->get(["id_produto" => $id])
            ->fetch(\PDO::FETCH_OBJ);

        // Verifica se encontrou
        if(!empty($produto))
        {
            // Busca as imagens do produto
            $imagens = $this->ObjModelImagem
                ->get(["id_produto" => $id])
                ->fetchAll(\PDO::FETCH_OBJ);

            // Busca a categoria do produto
            $produto->categoria = $this->ObjModelCategoria
                ->get(["id_categoria" => $produto->id_categoria])
                ->fetch(\PDO::FETCH_OBJ);

            // Busca as categoria mae
            $categorias = $this->ObjModelCategoria
                ->get(["id_categoria_mae" => "IS NULL"])
                ->fetchAll(\PDO::FETCH_OBJ);

            // Percorre as categorias mae
            foreach ($categorias as $cat)
            {
                // Busca as categorias filho
                $cat->categorias = $this->ObjModelCategoria
                    ->get(["id_categoria_mae" => $cat->id_categoria])
                    ->fetchAll(\PDO::FETCH_OBJ);
            }

            // Cria o array de exibição
            $dados["produto"] = $produto;
            $dados["imagens"] = $imagens;
            $dados["categorias"] = $categorias;

            // Chama a view de produtos
            $this->view("site/produto-detalhes",$dados);
        }
        else
        {
            // Chama a view
            $this->view("site/error/404");
        } // Error - 404

    } // End >> fun::detalhes()



    /**************************************************
     **                MÉTODO PAINEL
     **************************************************/


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
                // Verifica se tinha arquivo
                if(!empty($produto->download))
                {
                    // Deleta o arquivo
                    unlink("./storage/produto/{$id}/{$produto->download}");
                }

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

                    // Verifica se possui arquivo
                    if($_FILES["arquivo"]["size"] > 0)
                    {
                        // Instancia o objeto
                        $objUpload = new File();

                        // Informa os requisitos
                        $objUpload->setFile($_FILES["arquivo"]);
                        $objUpload->setStorange("./storage/produto/{$produto->id_produto}/");
                        $objUpload->setMaxSize(30 * MB);

                        // Realiza o upload
                        $arquivo = $objUpload->upload();

                        // Verifica se deu certo
                        if($arquivo != false)
                        {
                            // Inclui na tabela
                            $this->ObjModelProduto
                                ->update([
                                    "download" => $arquivo
                                ],[
                                    "id_produto" => $produto->id_produto
                                ]);

                            // Inclui no objeto
                            $produto->download = $arquivo;
                        }
                        else
                        {
                            $this->api([
                                "tipo" => true,
                                "code" => 200,
                                "mensagem" => "Produto foi inserido porem ocorreu um erro ao salvar arquivo.",
                                "objeto" => $produto
                            ]);

                            exit;

                        } // Erro ao salvar arquivo
                    }

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

            // Verifica se vai alterar o arquivo
            if($_FILES["arquivo"]["size"] > 0)
            {
                // Chama o objeto de upload
                $objUpload = new File();

                // Requisitos
                $objUpload->setFile($_FILES["arquivo"]);
                $objUpload->setStorange("./storage/produto/{$id}/");
                $objUpload->setMaxSize(30 * MB);

                // Realiza o upload
                $arquivo = $objUpload->upload();

                // Verifica
                if($arquivo != false)
                {
                    // Informa da mudança
                    $altera["download"] = $arquivo;
                }
                else
                {
                    // Barra o sistema
                    $this->api(["mensagem" => "Ocorreu um erro ao alterar arquivo. Verifique se o arquivo pesa menos de 30MB"]);

                    // mata o código
                    exit;
                }
            }

            // ===================================================
            // ===================================================

            // Verifica se houve alteração
            if($altera != null)
            {
                // Altera e verifica
                if($this->ObjModelProduto->update($altera, ["id_produto" => $id]) != false)
                {
                    // Verifica se alterou o arquivo e o produto ja possuia um
                    if(!empty($produto->download) && !empty($altera["download"]))
                    {
                        // Deleta o arquivo anterior
                        unlink("./storage/produto/{$id}/{$produto->download}");
                    }

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