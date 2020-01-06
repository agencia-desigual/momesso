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

        $dados = [
            "seo" => [
                "description" => "A Momesso Indústria de Máquina é uma empresa com mais de 50 anos de mercado. Fundada em 18 de junho de 1962, sua atividade principal era a manutenção de máquinas de beneficiamento de algodão e óleo, junto com fabricação de tanques e braços de pulverizadores para agricultura sob encomenda, na região de Birigui, interior de São Paulo.",
                "keywords" => "maquinas industriais, maquinas momesso, maquinas agricolas, Maquinário agrícola, Máquinas e Implementos Agrícolas"
            ],
            "seoFacebook" => [
                "url" => BASE_URL,
                "title" => "Momesso | Indústria de Máquinas",
                "site_name" => SITE_NOME,
                "description" => "A Momesso Indústria de Máquina é uma empresa com mais de 50 anos de mercado. Fundada em 18 de junho de 1962, sua atividade principal era a manutenção de máquinas de beneficiamento de algodão e óleo, junto com fabricação de tanques e braços de pulverizadores para agricultura sob encomenda, na região de Birigui, interior de São Paulo.",
                "image" => BASE_STORANGE.'assets/img/thumb-face.png',
                "image_type" => "image/png",

            ],
            "teste" => "jdlnfnidsasdas"
        ];

       $this->view("site/index",$dados);
    }


} // END::Class Principal