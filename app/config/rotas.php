<?php

// Erro 404
$Rotas->onError("404", "Principal::error404");


/*************************
 * SITE EXTERNO
 *************************/

$Rotas->on("GET","","Principal::index");


/*************************
 * PAINEL ADM
 *************************/

// Login ===================
$Rotas->on("GET","login","Painel::login");
$Rotas->on("POST","login","Painel::jx_login");

// Sair e Dashboard ========
$Rotas->on("GET","sair","Painel::sair");
$Rotas->on("GET","painel","Painel::dashboard");

// Categorias ==============
$Rotas->on("GET","painel/categorias","Categoria::painel_exibirTodos");
$Rotas->on("GET","painel/categorias/adicionar","Categoria::painel_adicionar");
$Rotas->on("POST","categoria/insert","Categoria::jx_insert");
$Rotas->on("DELETE","categoria/delete/{p}","Categoria::jx_delete");