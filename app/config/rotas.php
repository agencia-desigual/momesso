<?php

// Erro 404
$Rotas->onError("404", "Principal::error404");

// -- Seta os grupos
//$Rotas->group("Principal","api","Principal");


//$Rotas->onGroup("Principal","GET","a","index");


/*************************
 * SITE EXTERNO
 *************************/

$Rotas->on("GET","","Principal::index");


/*************************
 * PAINEL ADM
 *************************/

$Rotas->on("GET","login","Painel::login");
$Rotas->on("POST","login","Painel::jx_login");

$Rotas->on("GET","sair","Painel::sair");
$Rotas->on("GET","painel","Painel::dashboard");