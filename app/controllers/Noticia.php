<?php

// NameSpace
namespace Controller;

// Importação
use Helper\Seguranca;
use Sistema\Controller;

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

} // End >> Class::Noticia