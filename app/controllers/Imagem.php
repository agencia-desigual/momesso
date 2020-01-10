<?php

// NameSpace
namespace Controller;

// Importações
use Helper\Seguranca;
use Sistema\Controller;
use Sistema\Helper\File;

// Classe
class Imagem extends Controller
{
    // Objetos
    private $ObjSeguranca;
    private $ObjModelImagem;
    private $ObjModelProduto;

    // Método construtor
    public function __construct()
    {
        // Chama o pai
        parent::__construct();

        // Instancia os objetos
        $this->ObjSeguranca = new Seguranca();
        $this->ObjModelImagem = new \Model\Imagem();
        $this->ObjModelProduto = new \Model\Produto();

        // Segurança
        $this->ObjSeguranca->security();

    } // End >> fun::__construct()


    /**
     * Método responsável por receber as informações
     * realizar o upload da imagem e salvar seu
     * registro no banco de dados.
     * ---------------------------------------------------
     * @param int $id [Id do Produto]
     * ---------------------------------------------------
     * @method POST
     * @url imagem/insert/[ID - Produto]
     */
    public function jx_insert($id)
    {
        // Variaveis
        $dados = null;
        $salva = null;
        $arquivo = null;
        $imagem = null;
        $produto = null;

        // Busca o produto
        $produto = $this->ObjModelProduto
            ->get(["id_produto" => $id])
            ->fetch(\PDO::FETCH_OBJ);

        // Verifica se encontrou o produto
        if(!empty($produto))
        {
            // Instancia o obj do arquivo
            $objUpload = new File();

            // Adiciona as informações para upload
            $objUpload->setFile($_FILES["imagem"]);
            $objUpload->setStorange("./storage/produto/{$id}/");
            $objUpload->setMaxSize(3 * MB);
            $objUpload->setExtensaoValida(["png","jpg","jpeg"]);

            // Verifica se o tamanho está certo
            if($objUpload->validaSize())
            {
                // Verifica se o arquivo possui uma extensão permitida
                if($objUpload->validaExtensao())
                {
                    // Realiza o upload do arquivo
                    $arquivo = $objUpload->upload();

                    // Verifica se deu certo
                    if($arquivo != false)
                    {
                        // Array de inserção
                        $salva = [
                            "imagem" => $arquivo,
                            "id_produto" => $id
                        ];

                        // Verifica se é capa
                        if(!empty($_POST["capa"]) && $_POST["capa"] == "sim")
                        {
                            // Add ao array
                            $salva["capa"] = 1;

                            // Remove todas as outras capas
                            $this->ObjModelImagem->update(["capa" => 0],["id_produto" => $id]);
                        }

                        // Insere no banco
                        $imagem = $this->ObjModelImagem->insert($salva);

                        // Verifica se inseriu
                        if($imagem != false)
                        {
                            // Busca a imagem recem adicionada
                            $imagem = $this->ObjModelImagem
                                ->get(["id_imagem" => $imagem])
                                ->fetch(\PDO::FETCH_OBJ);

                            // Array de retorno
                            $dados = [
                                "tipo" => true,
                                "code" => 200,
                                "mensagem" => "Imagem adicionada com sucesso.",
                                "objeto" => $imagem
                            ];

                        }
                        else
                        {
                            // Msg
                            $dados = ["mensagem" => "Ocorreu um erro interno. Tente novamente mais tarde."];

                        } // Error - Erro ao salvar no banco

                    }
                    else
                    {
                        // Msg
                        $dados = ["mensagem" => "Ocorreu um erro ao realizar o upload da imagem."];

                    } // Error - Erro no uplaod.

                }
                else
                {
                    // Msg
                    $dados = ["mensagem" => "A extensão do arquivo não é permitida."];

                } // Error - Extensão não permitida.

            }
            else
            {
                // Msg
                $dados = ["mensagem" => "Imagem muito grande. O tamanho máximo é 3MB."];

            } // Error - Imagem muito grande.

        }
        else
        {
            // Msg
            $dados = ["mensagem" => "Produto informado não foi encontrado."];

        } // Error - Produto informado não foi encontrado.

        // Retorno
        $this->api($dados);

    } // End >> fun::jx_insert()


    /**
     * Método responsável por deletar uma imagem
     * do banco de dados e seu arquivo fisico.
     * ---------------------------------------------------
     * @param int $id [Id da Imagem]
     * ---------------------------------------------------
     * @method DELETE
     * @url imagem/delete/[ID]
     */
    public function jx_delete($id)
    {
        // Variaveis
        $dados = null;
        $imagem = null;

        // Busca a imagem
        $imagem = $this->ObjModelImagem
            ->get(["id_imagem" => $id])
            ->fetch(\PDO::FETCH_OBJ);

        // Verifica se encontrou
        if(!empty($imagem))
        {
            // Deleta a imagem do banco de dados
            if($this->ObjModelImagem->delete(["id_imagem" => $id]))
            {
                // Deleta o arquivo fisico
                unlink("./storage/produto/{$imagem->id_produto}/{$imagem->imagem}");

                // Array de sucesso
                $dados = [
                    "tipo" => true,
                    "code" => 200,
                    "mensagem" => "Imagem deletada com sucesso.",
                    "produto" => $imagem
                ];

            }
            else
            {
                // Msg
                $dados = ["mensagem" => "Ocorreu um erro ao deletar a imagem."];

            } // Error - Ocorreu um erro ao deletar img
        }
        else
        {
            // Msg
            $dados = ["mensagem" => "Imagem informada não foi encontrada."];

        } // Error - Imagem n encontrada.

        // Retorno
        $this->api($dados);

    } // End >> fun::jx_delete()


    /**
     * Método responsável por alterar uma imagem,
     * transformando a mesmo como capa do produto
     * ---------------------------------------------------
     * @param int $id [Id da Imagem]
     * ---------------------------------------------------
     * @method POST
     * @url imagem/update/[ID]
     */
    public function jx_update($id)
    {
        // Variaveis
        $dados = null;
        $imagem = null;
        $imagemAlterada = null;

        // Busca a imagem
        $imagem = $this->ObjModelImagem
            ->get(["id_imagem" => $id])
            ->fetch(\PDO::FETCH_OBJ);

        // Verifica se inseriu
        if(!empty($imagem))
        {
            // Remove a capa de todas as imagens desse produto
            $this->ObjModelImagem->update(["capa" => 0],["id_produto" => $imagem->id_produto]);

            // Altera a imagem para capa
            if($this->ObjModelImagem->update(["capa" => 1],["id_imagem" => $id]))
            {
                // Imagem alterada
                $imagemAlterada = $imagem;
                $imagemAlterada->capa = true;

                // Array de sucesso
                $dados = [
                    "tipo" => true,
                    "code" => 200,
                    "mensagem" => "Capa alterada com sucesso.",
                    "objeto" => [
                        "antigo" => $imagem,
                        "atual" => $imagemAlterada
                    ]
                ];

            }
            else
            {
                // Msg
                $dados = ["mensagem" => "Ocorreu um erro ao alterar capa."];

            } // Error - Erro ao alterar
        }
        else
        {
            // Msg
            $dados = ["mensagem" => "Imagem informada não foi encontrada."];

        } // Error - Imagem não encontrada

        // Retorno
        $this->api($dados);

    } // End >> fun::jx_update()

} // End >> class::Imagem