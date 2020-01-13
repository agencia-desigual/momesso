<?php

// NameSpace
namespace Controller;

// Importação
use Helper\Seguranca;
use Sistema\Controller;
use Sistema\Helper\File;

// Classe
class Noticia extends Controller
{
    // Objetos
    private $ObjSeguranca;
    private $ObjModelNoticia;

    // Método construtor
    public function __construct()
    {
        // Chama o pai
        parent::__construct();

        // Instancia os objetos
        $this->ObjSeguranca = new Seguranca();
        $this->ObjModelNoticia = new \Model\Noticia();

    } // End >> fun::__construct()


    /**
     * Método responsável por criar uma página com a
     * listagem de todas as notícias no site externo.
     * ------------------------------------------------
     * @method GET
     * @url noticias
     */
    public function exibirTodas()
    {
        // Variaveis
        $dados = null;
        $noticias = null;

        // Recupera o SEO
        $dados = $this->getSEO();

        // Busca todas as noticias
        $noticias = $this->ObjModelNoticia
            ->get(null, "id_noticia DESC")
            ->fetchAll(\PDO::FETCH_OBJ);

        // Adiciona ao array de exibição
        $dados["noticias"] = $noticias;

        // Chama a view de noticias
        $this->view("site/noticias", $dados);

    } // End >> fun::exibirTodas()


    /**
     * Método responsável por criar uma página
     * para exibir uma noticia especifica.
     * ------------------------------------------------
     * @param $id
     * @param $slug
     * ------------------------------------------------
     * @method GET
     * @url noticias/[ID]/[SLUG]
     */
    public function especifica($id, $slug)
    {
        // Variaveis
        $dados = null;
        $noticia = null;

        // Busca a noticia
        $noticia = $this->ObjModelNoticia
            ->get(["id_noticia" => $id, "slug" => $slug])
            ->fetch(\PDO::FETCH_OBJ);

        // Verifica se encontrou a noticia
        if(!empty($noticia))
        {
            // Seo
            $seo = [
                "title" => $noticia->nome . " | " .SITE_NOME,
                "description" => $noticia->resumo,
                "keywords" => $noticia->palavras_chave
            ];

            // Monta o dados
            $dados = $this->getSEO($seo);

            // Add a noticia
            $dados["noticia"] = $noticia;

            // Chama a view
            $this->view("site/noticia-especifica", $dados);
        }
        else
        {
            // Chama a view
            $this->view("site/erro/404");
        } // Erro 404

    } // End >> fun::especifica()


    /**************************************************
     **                MÉTODO PAINEL
     **************************************************/


    /**
     * Método responsável por montar uma view
     * para exibir todas as noticias cadastradas.
     * ------------------------------------------------
     * @method GET
     * @url painel/noticias
     */
    public function painel_exibirTodos()
    {
        // Segurança
        $this->ObjSeguranca->security();

        // Variaveis
        $dados = null;
        $noticias = null;

        // Busca as noticias
        $noticias = $this->ObjModelNoticia
            ->get()
            ->fetchAll(\PDO::FETCH_OBJ);

        // Array de exibição na view
        $dados = [
            "js" => ["Noticia"],
            "noticias" => $noticias
        ];

        // Chama a view
        $this->view("painel/noticia/todos", $dados);

    } // End >> fun::painel_exibirTodos()


    /**
     * Método responsável por montar uma view
     * com formulário para adição de noticia.
     * ------------------------------------------------
     * @method GET
     * @url painel/noticias/adicionar
     */
    public function painel_adicionar()
    {
        // Segurança
        $this->ObjSeguranca->security();

        // Variaveis
        $dados = null;

        // Array de exibição na view
        $dados =[
            "js" => ["Noticia"]
        ];

        // Chama a view
        $this->view("painel/noticia/adicionar", $dados);

    } // End >> fun::painel_adicionar()


    /**
     * Método responsável por buscar os dados de uma
     * notícia e exibir para ser alterada.
     * ------------------------------------------------
     * @param int $id
     * ------------------------------------------------
     * @method GET
     * @url painel/noticias/alterar/[ID]
     */
    public function painel_alterar($id)
    {
        // Seguranca
        $this->ObjSeguranca->security();

        // Variaveis
        $dados = null;
        $noticia = null;

        // Busca a noticia a ser alterada
        $noticia = $this->ObjModelNoticia
            ->get(["id_noticia" => $id])
            ->fetch(\PDO::FETCH_OBJ);

        // Verifica se a noticia existe
        if(!empty($noticia))
        {
            // Array de exibição na view
            $dados = [
                "js" => ["Noticia"],
                "noticia" => $noticia
            ];

            // Chama a view
            $this->view("painel/noticia/editar", $dados);
        }
        else
        {
            // 404
            $this->view("site/error/404");

        } // Error - 404

    } // End >> fun::painel_alterar()


    /**************************************************
     **                 MÉTODOS AJAX
     **************************************************/


    /**
     * Método responsável por deletar uma determinada
     * noticia do bando de dados.
     * ------------------------------------------------
     * @param $id
     * ------------------------------------------------
     * @method DELETE
     * @url noticia/delete/[ID]
     */
    public function jx_delete($id)
    {
        // Segurança
        $this->ObjSeguranca->security();

        // Variaveis
        $dados = null;
        $noticia = null;

        // Busca a noticia
        $noticia = $this->ObjModelNoticia
            ->get(["id_noticia" => $id])
            ->fetch(\PDO::FETCH_OBJ);

        // Verifica se encontrou a noticia
        if(!empty($noticia))
        {
            // Deleta a noticia
            if($this->ObjModelNoticia->delete(["id_noticia" => $id]) != false)
            {
                // Verifica se possui imagem
                if(!empty($noticia->imagem))
                {
                    // Deleta a imagem
                    unlink("./storage/noticia/" . $noticia->imagem);
                }

                // Array de sucesso
                $dados = [
                    "tipo" => true,
                    "code" => 200,
                    "mensagem" => "Notícia adicionada com sucesso.",
                    "objeto" => $noticia
                ];

            }
            else
            {
                // Msg
                $dados = ["mensagem" => "Ocorreu um erro ao deletar noticia."];

            } // Error - Ocorreu um erro ao deletar noticia.
        }
        else
        {
            // Msg
            $dados = ["mensagem" => "Notícia informada não foi encontrada"];

        } // Error - Notifica n encontrada.

        // Retorno
        $this->api($dados);

    } // End >> fun::jx_delete()


    /**
     * Método responsável por adicionar uma
     * nova noticia no banco de dados.
     * ------------------------------------------------
     * @method POST
     * @url noticia/insert
     */
    public function jx_insert()
    {
        // Segurança
        $this->ObjSeguranca->security();

        // Variaveis
        $dados = null;
        $salva = null;
        $imagem = null;
        $post = null;

        // Recupera os dados post
        $post = $_POST;

        // Verifica se informou os dados obrigatórios
        if(!empty($post["nome"])
            && !empty($post["texto"])
            && !empty($post["resumo"])
            && !empty($post["palavras_chave"])
            && !empty($post["slug"])
            && !empty($post["status"]))
        {
            // Array de inserção
            $salva = [
                "nome" => $post["nome"],
                "data" => date("Y-m-d H:i:s"),
                "texto" => $post["texto"],
                "resumo" => $post["resumo"],
                "slug" => strtolower($post["slug"]),
                "palavras_chave" => $post["palavras_chave"],
                "status" => $post["status"]
            ];

            // Verifica se informou a capa
            if($_FILES["imagem"]["size"] > 0)
            {
                // Instancia o objeto de upload
                $objUpload = new File();

                // Informa os dados necessários
                $objUpload->setFile($_FILES["imagem"]);
                $objUpload->setStorange("./storage/noticia/");
                $objUpload->setMaxSize(3 * MB);
                $objUpload->setExtensaoValida(["png","jpg","jpeg"]);

                // Faz o uplaod
                $imagem = $objUpload->upload();

                // Verifica se fez o uplaod
                if($imagem != false)
                {
                    // Salva a imagem no array
                    $salva["imagem"] = $imagem;
                }
                else
                {
                    // Msg
                    $dados = ["mensagem" => "Ocorre um erro ao salvar a imagem de capa. Verifique o tamanho e extensão do arquivo."];

                } // Error - Erro no upload
            }

            // Salva a noticia no banco
            $noticia = $this->ObjModelNoticia->insert($salva);

            // Verifica que se inseriu
            if($noticia != false)
            {
                // Busca a noticia recem adicionada
                $noticia = $this->ObjModelNoticia
                    ->get(["id_noticia" => $noticia])
                    ->fetch(\PDO::FETCH_OBJ);

                // Array de sucesso
                $dados = [
                    "tipo" => true,
                    "code" => 200,
                    "mensagem" => "Notícia adicionada com sucesso.",
                    "objeto" => $noticia
                ];

            }
            else
            {
                // Msg
                $dados = ["mensagem" => "Ocorreu um erro ao salvar notícia."];

            } // Error - Ocorreu um erro ao salvar noticia

        }
        else
        {
            // Msg
            $dados = ["mensagem" => "Campos obrigatórios não foram preenchidos."];

        } // Error - Campos obrigatórios não foram preenchidos.

        // Retorno
        $this->api($dados);

    } // End >> fun::jx_insert()


    /**
     * Método responsável por receber os dados e alterar
     * uma determinada noticia.
     * --------------------------------------------------
     * @param $id
     * ------------------------------------------------
     * @method POST
     * @url noticia/update/[ID]
     */
    public function jx_update($id)
    {
        // Seguranca
        $this->ObjSeguranca->security();

        // Variaveis
        $dados = null;
        $altera = null;
        $noticia = null;
        $noticiaAlterada = null;
        $where = ["id_noticia" => $id];

        // Recupera os dados post
        $post = $_POST;

        // Busca a noticia a ser alterada
        $noticia = $this->ObjModelNoticia
            ->get($where)
            ->fetch(\PDO::FETCH_OBJ);

        // Verifica se a noticia existe
        if(!empty($noticia))
        {
            // Itens a ser alterados ===============
            // =====================================

            // Ja add o texto
            $altera["texto"] = $post["texto"];

            // Verifica se vai alterar o titulo
            if(!empty($post["nome"]) && $noticia->nome != $post["nome"])
            {
                // Add ao array
                $altera["nome"] = $post["nome"];
            }

            // Verifica se vai alterar o resumo
            if(!empty($post["resumo"]) && $noticia->resumo != $post["resumo"])
            {
                // Add ao array
                $altera["resumo"] = $post["resumo"];
            }

            // Verifica se vai alterar o slug
            if(!empty($post["slug"]) && $noticia->slug != $post["slug"])
            {
                // Add ao array
                $altera["slug"] = $post["slug"];
            }

            // Verifica se vai alterar as plavras chaves
            if(!empty($post["palavras_chave"]) && $noticia->palavras_chave != $post["palavras_chave"])
            {
                // Add ao array
                $altera["palavras_chave"] = $post["palavras_chave"];
            }

            // Verifica se vai alterar o status
            if(!empty($post["status"]) && $noticia->status != $post["status"])
            {
                // Add ao array
                $altera["status"] = $post["status"];
            }

            // =====================================
            // =====================================

            // Verifica se vai alterar a imagem de capa
            if($_FILES["imagem"]["size"] > 0)
            {
                // Instancia o obj de upload
                $objUpload = new File();

                // Informa os itens necessários
                $objUpload->setFile($_FILES["imagem"]);
                $objUpload->setStorange("./storage/noticia/");
                $objUpload->setMaxSize(3 * MB);
                $objUpload->setExtensaoValida(["png","jpg","jpeg"]);

                // Faz o uplaod
                $imagem = $objUpload->upload();

                // Verifica se fez o uplaod
                if($imagem != false)
                {
                    // Salva a imagem no array
                    $altera["imagem"] = $imagem;
                }
                else
                {
                    // Msg
                    $dados = ["mensagem" => "Ocorre um erro ao salvar a imagem de capa. Verifique o tamanho e extensão do arquivo."];

                } // Error - Erro no upload
            }

            // Altera a noticia
            if($this->ObjModelNoticia->update($altera, $where) != false)
            {
                // Verifica se alterou a img
                if(!empty($altera["imagem"]) && !empty($noticia->imagem))
                {
                    // Deleta a imagem antiga
                    unlink("./storage/noticia/" . $noticia->imagem);
                }

                // Busca a noticia Alterada
                $noticiaAlterada = $this->ObjModelNoticia
                    ->get($where)
                    ->fetch(\PDO::FETCH_OBJ);

                // Array de sucesso
                $dados = [
                    "tipo" => true,
                    "code" => 200,
                    "mensagem" => "Notícia alterada com sucesso.",
                    "objeto" => [
                        "antigo" => $noticia,
                        "atual" => $noticiaAlterada
                    ]
                ];

            }
            else
            {
                // Verifica se alterou a img
                if(!empty($altera["imagem"]))
                {
                    // Deleta a imagem salva
                    unlink("./storage/noticia/" . $altera["imagem"]);
                }

                // Msg
                $dados = ["mensagem" => "Ocorreu um erro ao alterar a notícia."];

            } // Error - Ocorreu um erro ao alterar a notícia.
        }
        else
        {
            // Msg
            $dados = ["mensagem" => "Notícia informada não foi encontrada."];

        } // Error - Notícia informada não foi encontrada.

        // Retorno
        $this->api($dados);

    } // End >> fun::jx_update()


} // End >> Class::Noticia