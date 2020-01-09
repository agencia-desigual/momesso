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
$Rotas->on("GET","painel/categorias/alterar/{p}","Categoria::painel_alterar");
$Rotas->on("POST","categoria/insert","Categoria::jx_insert");
$Rotas->on("POST","categoria/update/{p}","Categoria::jx_update");
$Rotas->on("DELETE","categoria/delete/{p}","Categoria::jx_delete");

// Produtos ================
$Rotas->on("GET","painel/produtos","Produto::painel_exibirTodos");
$Rotas->on("GET","painel/produtos/adicionar","Produto::painel_adicionar");
$Rotas->on("GET","painel/produtos/alterar/{p}","Produto::painel_alterar");
$Rotas->on("GET","painel/produtos/{p}","Produto::painel_detalhes");
$Rotas->on("POST","produto/insert","Produto::jx_insert");
$Rotas->on("POST","produto/update/{p}","Produto::jx_update");
$Rotas->on("DELETE","produto/delete/{p}","Produto::jx_delete");

// Imagem ==================
$Rotas->on("POST","imagem/insert/{p}","Imagem::jx_insert");
$Rotas->on("DELETE","imagem/delete/{p}","Imagem::jx_delete");
$Rotas->on("POST","imagem/update/{p}","Imagem::jx_update");