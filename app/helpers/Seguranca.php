<?php

// NameSpace
namespace Helper;


class Seguranca
{
    // Url de expulsão
    private $url = BASE_URL . "login";


    /**
     * Método responsável por verifica se existe uma session ativa
     * se existir retorna os dados do usuário salvo nela. Caso não
     * exista expulsa o usuário para o link pré definido.
     * -------------------------------------------------------------
     * @return mixed
     */
    public function security()
    {
        // Pega a session
        $sessao = $_SESSION;

        // Verifica se o usuário está logado
        if($sessao["logado"] == true)
        {
            // Retorna o usuario
            return $sessao["usuario"];
        }
        else
        {
            // Explusa o usuário
            header("Location: " . $this->url);
        }

    } // End >> fun::security()


    /**
     * Método responsável por receber um objeto do um determinado usuário,
     * remover a sua senha e salvar seus dados um uma sessão.
     * -------------------------------------------------------------------
     * @param $usuario
     * @return bool
     */
    public function login($usuario)
    {
        // Seta como logado
        $_SESSION["logado"] = true;

        // Remove a senha do usuario
        unset($usuario->{"senha"});

        // Salva o objeto do usuário na session
        $_SESSION["usuario"] = $usuario;

        // Retorna true
        return true;

    } // End >> fun::login()

} // End >> Class::Helper\Seguranca