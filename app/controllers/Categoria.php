<?php

// NameSpace
namespace Controller;

// Importações
use Helper\Seguranca;
use Model\Produto;
use Sistema\Controller;

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
        $categorias = $this->ObjModelCategoria->get()
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


    /**************************************************
     **                 MÉTODOS AJAX
     **************************************************/


    public function jx_insert()
    {
        // Seguranca
        $this->ObjSeguranca->security();

        //

    } // End >> fun::jx_insert()



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