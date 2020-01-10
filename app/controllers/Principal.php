<?php
/**
 * Created by PhpStorm.
 * User: Igor
 * Date: 26/03/2019
 * Time: 18:29
 */

namespace Controller;

use Sistema\Controller as CI_controller;


class Principal extends CI_controller
{

    // Método construtor
    function __construct()
    {
        // Carrega o contrutor da classe pai
        parent::__construct();
    }

    public function index()
    {
        $dados = $this->getSEO();

        // Chama a view da home
        $this->view("site/index",$dados);
    }

    public function contato()
    {
        $dados = $this->getSEO();

        // Chama a view de contato
        $this->view("site/contato",$dados);
    }

    public function empresa()
    {
        $dados = $this->getSEO();

        // Chama a view da empresa
        $this->view("site/empresa",$dados);
    }

    public function noticias()
    {
        $dados = $this->getSEO();

        // Chama a view de noticias
        $this->view("site/noticias",$dados);
    }

    public function produtos()
    {
        $dados = $this->getSEO();

        // Chama a view de produtos
        $this->view("site/produtos",$dados);
    }

    public function produtoDetalhes()
    {
        $dados = $this->getSEO();

        // Chama a view de produtos
        $this->view("site/produto-detalhes",$dados);
    }

    /**
     * Método responsável por exiber uma página de error
     * 404. Esse método será chamado automaticamente sempre
     * que um usuário acessar uma rota restrita.
     */
    public function error404()
    {
        // Chama a view do erro 404
        $this->view("site/erro-404");
      
    } // End >> fun>::error404()


} // END::Class Principal