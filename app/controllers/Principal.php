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

    } // End >> fun::__construct()


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
     * Método responsável por gerar a página inicial
     * do site.
     * ------------------------------------------------
     * @method GET
     * @url BASE_URL
     */
    public function index()
    {
        // Chama a view da home
        $this->view("site/index");

    } // End >> fun::index()


} // END::Class Principal