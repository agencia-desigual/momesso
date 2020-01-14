<?php

// Erro 404
$Rotas->onError("404", "Principal::error404");


/*************************
 * SITE EXTERNO
 *************************/

// Páginas Institucionais
$Rotas->on("GET","","Principal::index");
$Rotas->on("GET","empresa","Principal::empresa");
$Rotas->on("GET","diferencial","Principal::diferencial");
$Rotas->on("GET","trabalhe-conosco","Principal::trabalheConosco");
$Rotas->on("GET","cimbria","Principal::cimbria");
$Rotas->on("GET","contato","Principal::contato");

// Noticias
$Rotas->on("GET","noticias","Noticia::exibirTodas");
$Rotas->on("GET","noticias/{p}/{p}","Noticia::especifica");

// Produtos
$Rotas->on("GET","produtos/categoria/{p}/{p}","Produto::exibirCategoria");
$Rotas->on("GET","produtos/detalhe/{p}/{p}","Produto::detalhes");
$Rotas->on("GET","produtos","Produto::exibirTodos");
$Rotas->on("GET","produtos/{p}/{p}","Produto::detalhes");
$Rotas->on("GET","produtos/{p}","Produto::exibirTodos");

/*************************
 * FUNCOES AJAX
 *************************/
$Rotas->on("POST","ajax-contato","Principal::jx_contato");
$Rotas->on("POST","ajax-download","Produto::jx_insertDownload");
$Rotas->on("POST","ajax-trabalhe-conosco","Principal::jx_trabalheConosco");


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


// Noticia =================
$Rotas->on("GET","painel/noticias","Noticia::painel_exibirTodos");
$Rotas->on("GET","painel/noticias/adicionar","Noticia::painel_adicionar");
$Rotas->on("GET","painel/noticias/alterar/{p}","Noticia::painel_alterar");
$Rotas->on("POST","noticia/insert","Noticia::jx_insert");
$Rotas->on("POST","noticia/update/{p}","Noticia::jx_update");
$Rotas->on("DELETE","noticia/delete/{p}","Noticia::jx_delete");