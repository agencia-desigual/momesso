<?php
/**
 * =======================================================
 *
 *  Exemplo de Model a ser seguido pelo usuário,
 *  este simples exemplo já possui os métodos principais de
 *  um CRUD.
 *
 *  insert, update, get, delete
 *
 * =======================================================
 *
 * Autor: Edilson Pereira
 * Date: 14/01/2020
 * Time: 09:35
 *
 */

namespace Model;

use Sistema\Database;


class Download extends Database
{
    private $conexao;

    // Método construtor
    public function __construct()
    {
        // Carrega o construtor da class pai
        parent::__construct();

        // Retorna a conexao
        $this->conexao = parent::getConexao();

        // Seta o nome da tablea
        parent::setTable("download");

    } // END >> Fun::__construct()

} // END >> Class::Example