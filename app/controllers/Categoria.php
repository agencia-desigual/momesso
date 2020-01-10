<?php

// NameSpace
namespace Controller;

// Importações
use Helper\Seguranca;
use Model\Produto;
use Sistema\Controller;
use Sistema\Helper\File;

// Classe
class Categoria extends Controller
{
    // Objetos
    private $ObjSeguranca;
    private $ObjModelCategoria;

    // Método construtor
    public function __construct()
    {
        // Inicia a class pai
        parent::__construct();

        // Instancia os objetos
        $this->ObjSeguranca = new Seguranca();
        $this->ObjModelCategoria = new \Model\Categoria();

    } // End >> fun::__construct()


    /**
     * Método responsável por buscar todos os
     * registros de categorias existentes e
     * montar uma página para exibir as mesmas.
     * -------------------------------------------
     * @method GET
     * @url painel/categorias
     */
    public function painel_exibirTodos()
    {
        // Seguranca
        $this->ObjSeguranca->security();

        // Variaveis
        $dados = null;
        $categorias = null;
        $categoriasMae = null;
        $mae = null;

        // Busca todas as categorias cadastradas
        $categorias = $this->ObjModelCategoria->get(null, "id_categoria DESC")
            ->fetchAll(\PDO::FETCH_OBJ);

        // Busca todas as categorias maes
        $mae = $this->ObjModelCategoria->get(["id_categoria_mae" => "IS NULL"])
            ->fetchAll(\PDO::FETCH_OBJ);

        // Percorre as maes
        foreach ($mae as $m)
        {
            // Add ao array
            $categoriasMae[$m->id_categoria] = $m->nome;
        }

        // Percorre todas
        foreach ($categorias as $cat)
        {
            // Verifica se possui categoria mãe
            if(!empty($cat->id_categoria_mae))
            {
                // Add o nome da mae
                $cat->mae = $categoriasMae[$cat->id_categoria_mae];
            }
            else
            {
                $cat->mae = " - ";
            }
        }

        // Array de exibição na view
        $dados = [
            "js" => ["Categoria"],
            "categorias" => $categorias,
            "categoriasMae" => $categoriasMae
        ];

        // Chama a view
        $this->view("painel/categoria/todos", $dados);

    } // End >> fun::painel_exibirTodos()


    /**
     * Métodod responsável por gerar uma view
     * para a página de cadastro de uma nova
     * categoria.
     * -------------------------------------------
     * @method GET
     * @url painel/categorias/adicionar
     */
    public function painel_adicionar()
    {
        // Segurança
        $this->ObjSeguranca->security();

        // Variaveis
        $dados = null;
        $categoriasMae = null;

        // Busca todas as categorias maes
        $categoriasMae = $this->ObjModelCategoria->get(["id_categoria_mae" => "IS NULL"])
            ->fetchAll(\PDO::FETCH_OBJ);

        // Array de exibição na view
        $dados = [
            "js" => ["Categoria"],
            "categorias" => $categoriasMae
        ];

        // Chama a view
        $this->view("painel/categoria/adicionar", $dados);

    } // End >> fun::painel_adicionar()


    /**
     * Método responsável por gerar uma view
     * para a página de editar categoria
     * -------------------------------------------
     * @param integer $id
     * -------------------------------------------
     * @method GET
     * @url painel/categorias/alterar/[ID]
     */
    public function painel_alterar($id)
    {
        // Seguranca
        $this->ObjSeguranca->security();

        // Variaveis
        $dados = null;
        $categoria = null;
        $categoriasMae = null;

        // Busca a Categoria
        $categoria = $this->ObjModelCategoria->get(["id_categoria" => $id]);

        // Verifica se encontrou
        if($categoria->rowCount() > 0)
        {
            // Fetch
            $categoria = $categoria->fetch(\PDO::FETCH_OBJ);

            // Busca todas as categorias maes
            $mae = $this->ObjModelCategoria->get(["id_categoria_mae" => "IS NULL"])
                ->fetchAll(\PDO::FETCH_OBJ);

            // Percorre as maes
            foreach ($mae as $m)
            {
                // Add ao array
                $categoriasMae[$m->id_categoria] = $m->nome;
            }

            // Array de exibição na view
            $dados = [
                "js" => ["Categoria"],
                "categoria" => $categoria,
                "categoriasMae" => $categoriasMae
            ];

            // Chama a view
            $this->view("painel/categoria/editar", $dados);
        }
        else
        {
            // View
            $this->view("site/error/404");
        } // Erro 404

    } // End >> fun::painel_alterar()


    /**************************************************
     **                 MÉTODOS AJAX
     **************************************************/


    /**
     * Método responsável por receber os dados necessários
     * para inserir uma nova categoria no banco de dados.
     * Caso seja informado uma imagem deve realizar o upload
     * da mesma.
     * -------------------------------------------------
     * @method POST
     * @url categoria/insert
     */
    public function jx_insert()
    {
        // Seguranca
        $this->ObjSeguranca->security();

        // Objeto
        $ObjFile = new File();

        // Variaveis
        $dados = null;
        $salva = null;
        $categoria = null;
        $imagem = null;
        $post = null;

        // Pega os dados POST
        $post = $_POST;

        // Verifica se preencheu os campos obrigatórios
        if(!empty($post["nome"]) && !empty($post["slug"]))
        {
            // Array de salvamento
            $salva = [
                "nome" => $post["nome"],
                "slug" => strtolower($post["slug"])
            ];

            // Verifica se possui mãe
            if($post["id_categoria_mae"] > 0)
            {
                // Add o id da mae a o array de salvamento.
                $salva["id_categoria_mae"] = $post["id_categoria_mae"];
            }

            // Upload Arquivo ==========================
            if($_FILES["imagem"]["size"] > 0)
            {
                // Adiciona os itens
                $ObjFile->setFile($_FILES["imagem"]);
                $ObjFile->setStorange("./storage/categoria/");
                $ObjFile->setMaxSize(3 * MB);
                $ObjFile->setExtensaoValida(["png","jpg","jpeg"]);

                // Verifica se é uma extensão valida
                if($ObjFile->validaExtensao())
                {
                    // Verifica se é um tamanho valido
                    if($ObjFile->validaSize())
                    {
                        // Faz o upload
                        $imagem = $ObjFile->upload();

                        // Verifica se deu certo
                        if($imagem != false)
                        {
                            // Salva a imagem no array
                            $salva["imagem"] = $imagem;
                        }
                        else
                        {
                            // Avisa que deu erro
                            $this->api(["mensagem" => "Ocorreu um erro ao realizar o upload da imagem."]);

                            // Mata o código
                            exit;

                        } // Error - Ocorreu um erro no upload
                    }
                    else
                    {
                        // Avisa que deu erro
                        $this->api(["mensagem" => "A imagem informada é muito grande. Deve ser menor que 3MB"]);

                        // Mata o código
                        exit;

                    } // Error - Imagem muito grande
                }
                else
                {
                    // Avisa que deu erro
                    $this->api(["mensagem" => "A extensão do arquivo não é permitida."]);

                    // Mata o código
                    exit;
                } // Error - Extensão não permitida
            }
            // End > Upload Arquivo ====================

            // Realiza o insert
            $categoria = $this->ObjModelCategoria->insert($salva);

            // Verifica se inseriu
            if($categoria != false)
            {
                // Busca a categoria inserida
                $categoria = $this->ObjModelCategoria->get(["id_categoria" => $categoria])
                    ->fetch(\PDO::FETCH_OBJ);

                // Array de retorno
                $dados = [
                    "tipo" => true,
                    "code" => 200,
                    "mensagem" => "Categoria inserida com sucesso.",
                    "objeto" => $categoria
                ];

            }
            else
            {
                // Msg
                $dados = ["mensagem" => "Ocorreu um erro ao inserir categoria."];
            } // Error - Erro ao inserir categoria
        }
        else
        {
            // Msg
            $dados = ["mensagem" => "Campos obrigatórios não foram informados."];
        } // Error - Campos obrigatórios não informados

        // Retorno
        $this->api($dados);

    } // End >> fun::jx_insert()


    /**
     * Método responsável por alterar uma determinada
     * categoria já existente no banco de dados.
     * --------------------------------------------------
     * @param integer $id
     * --------------------------------------------------
     * @method POST
     * @url categoria/update/[ID]
     */
    public function jx_update($id)
    {
        // Seguranca
        $this->ObjSeguranca->security();

        // Variaveis
        $dados = null;
        $categoria = null;
        $categoriaAlterada = null;
        $post = null;
        $altera = null;

        // Post
        $post = $_POST;

        // Busca a categoria
        $categoria = $this->ObjModelCategoria->get([
            "id_categoria" => $id
        ]);

        // Verifica se encontrou a categoria
        if($categoria->rowCount() > 0)
        {
            // Fetch
            $categoria = $categoria->fetch(\PDO::FETCH_OBJ);

            // Arruma o post
            if($post["id_categoria_mae"] == 0)
            {
                $post["id_categoria_mae"] = null;
            }

            // Verifica se vai alterar o nome
            if($post["nome"] != $categoria->nome)
            {
                // Add o nome
                $altera["nome"] = $post["nome"];
            }

            // Verifica se vai alterar a mae
            if($post["id_categoria_mae"] != $categoria->id_categoria_mae)
            {
                // Add o nome
                $altera["id_categoria_mae"] = $post["id_categoria_mae"];
            }

            // Verifica se vai alterar o slug
            if($post["slug"] != $categoria->slug)
            {
                // Add o nome
                $altera["slug"] = $post["slug"];
            }

            // Verifica se vai fazer o upload da imagem
            if($_FILES["imagem"]["size"] > 0)
            {
                // Instancia o objeto
                $ObjFile = new File();

                // Adiciona os itens
                $ObjFile->setFile($_FILES["imagem"]);
                $ObjFile->setStorange("./storage/categoria/");
                $ObjFile->setMaxSize(3 * MB);
                $ObjFile->setExtensaoValida(["png","jpg","jpeg"]);

                // Verifica se é uma extensão valida
                if($ObjFile->validaExtensao())
                {
                    // Verifica se é um tamanho valido
                    if($ObjFile->validaSize())
                    {
                        // Faz o upload
                        $imagem = $ObjFile->upload();

                        // Verifica se deu certo
                        if($imagem != false)
                        {
                            // Salva a imagem no array
                            $altera["imagem"] = $imagem;
                        }
                        else
                        {
                            // Avisa que deu erro
                            $this->api(["mensagem" => "Ocorreu um erro ao realizar o upload da imagem."]);

                            // Mata o código
                            exit;

                        } // Error - Ocorreu um erro no upload
                    }
                    else
                    {
                        // Avisa que deu erro
                        $this->api(["mensagem" => "A imagem informada é muito grande. Deve ser menor que 3MB"]);

                        // Mata o código
                        exit;

                    } // Error - Imagem muito grande
                }
                else
                {
                    // Avisa que deu erro
                    $this->api(["mensagem" => "A extensão do arquivo não é permitida."]);

                    // Mata o código
                    exit;
                } // Error - Extensão não permitida
            }

            // Verifica se irá alterar algo
            if(!empty($altera))
            {
                // Altera a categoria e verifica se alterou
                if($this->ObjModelCategoria->update($altera, ["id_categoria" => $id]) != false)
                {
                    // Busca a categoria alterada
                    $categoriaAlterada = $this->ObjModelCategoria->get(["id_categoria" => $id])
                        ->fetch(\PDO::FETCH_OBJ);

                    // Verifica se possuia imagem e foi alterada
                    if(!empty($categoria->imagem) && $categoria->imagem != $categoriaAlterada->imagem)
                    {
                        // Deleta a imagem antiga
                        unlink("./storage/categoria/" . $categoria->imagem);
                    }

                    // Array de sucesso
                    $dados = [
                        "tipo" => true,
                        "code" => 200,
                        "mensagem" => "Categoria alterada com sucesso.",
                        "objeto" => [
                            "antigo" => $categoria,
                            "atual" => $categoriaAlterada
                        ]
                    ];
                }
                else
                {
                    // Verifica se fez o upload de imagem
                    if(!empty($altera["imagem"]))
                    {
                        // Deleta a imagem
                        unlink("./storage/categoria/" . $altera["imagem"]);
                    }

                    // Msg
                    $dados = ["mensagem" => "Ocorreu um erro ao alterar categoria."];

                } // Error - Ocorreu um erro ao alterar categoria.
            }
            else
            {
                // Msg
                $dados = ["mensagem" => "Nenhum campo está sendo alterado."];

            } // Error - Nada será alterado
        }
        else
        {
            // Msg
            $dados = ["mensagem" => "Categoria informada não foi encontrada."];

        } // Error - Categoria n encontrada.

        // Retorno
        $this->api($dados);

    } // End >> fun::jx_update()


    /**
     * Método responsável por deletar uma determinada
     * categoria, fazendo todas as validações de FK
     * antes de deletar o objeto.
     * ------------------------------------------------
     * @param int $id
     * ------------------------------------------------
     * @method DELETE
     * @url categoria/delete/[ID]
     */
    public function jx_delete($id)
    {
        // Seguranca
        $this->ObjSeguranca->security();

        // Objeto
        $ObjModelProduto = new Produto();

        // Variaveis
        $dados = null;
        $categoria = null;
        $produtos = null;

        // Busca a categoria
        $categoria = $this->ObjModelCategoria->get([
            "id_categoria" => $id
        ]);

        // Verifica se encontrou
        if($categoria->rowCount() > 0)
        {
            // Fetch
            $categoria = $categoria->fetch(\PDO::FETCH_OBJ);

            // Verifica se possui ligação com outra categoria
            if($this->ObjModelCategoria->get(["id_categoria_mae" => $categoria->id_categoria])->rowCount() == 0)
            {
                // Verifica se possui ligação com produtos
                if($ObjModelProduto->get(["id_categoria" => $categoria->id_categoria])->rowCount() == 0)
                {
                    // Deleta e verifica
                    if($this->ObjModelCategoria->delete(["id_categoria" => $categoria->id_categoria]) != false)
                    {
                        // Verifica se possui imagem
                        if(!empty($categoria->imagem))
                        {
                            // Deleta a imagem
                            unlink("./storange/categoria/" . $categoria->imagem);
                        }

                        // Avisa que deu certo
                        $dados = [
                            "tipo" => true,
                            "code" => 200,
                            "mensagem" => "Categoria deletada com sucesso.",
                            "objeto" => $categoria
                        ];
                    }
                    else
                    {
                        // Mensagem
                        $dados = ["mensagem" => "Ocorreu um erro ao deletar categoria."];
                    } // Error - Ocorreu um erro ao deletar categoria

                }
                else
                {
                    // Mensagem de erro
                    $dados = ["mensagem" => "Impossivel deletar, essa categoria possui vinculações."];
                } // Error - Possui vinculação com um produto

            }
            else
            {
                // Mensagem de erro
                $dados = ["mensagem" => "Impossivel deletar, essa categoria possui vinculações."];
            } // Error - Possui vinculação com outra categoria

        }
        else
        {
            // Mensagem de erro
            $dados = ["mensagem" => "Categoria informada não foi encontrada."];
        } // Error - Categoria n encontrada.

        // Retorno
        $this->api($dados);

    } // End >> fun::jx_delete()


} // End >> Class::Categoria()