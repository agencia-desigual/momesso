<?php $this->view("painel/include/header"); ?>

    <div class="main-content mb-4">

        <!-- Gradiente -->
        <div class="header bg-gradient-danger pb-8 pt-5 pt-md-5"></div>

        <!-- Conteudo -->
        <div class="container-fluid mt--8">
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">Produtos</h3>
                                </div>
                                <div class="col text-right">
                                    <a href="<?= BASE_URL; ?>painel/produtos/adicionar" class="btn btn-sm btn-dark">Adicionar Produto</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush datatable">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Capa</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Categoria</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($produtos)): ?>
                                        <?php foreach ($produtos as $prod): ?>
                                            <tr id="tb_<?= $prod->id_produto; ?>">
                                                <td>
                                                    <?php if(!empty($prod->imagem)): ?>
                                                        <img src="<?= BASE_STORANGE; ?>produto/<?= $prod->id_produto ."/". $prod->imagem->imagem ; ?>" style="width: 120px;" />
                                                    <?php else: ?>
                                                        <img src="<?= BASE_URL; ?>arquivos/assets/img/not-found.jpg" style="width: 120px;" />
                                                    <?php endif; ?>
                                                </td>
                                                <td><?= $prod->nome; ?></td>
                                                <td><?= $prod->categoria->nome; ?></td>

                                                <!-- Menu de opções -->
                                                <td class="text-right">
                                                    <div class="dropdown">
                                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                            <a class="dropdown-item" href="<?= BASE_URL; ?>painel/produtos/<?= $prod->id_produto; ?>">Ver Detalhes</a>
                                                            <a class="dropdown-item" href="<?= BASE_URL; ?>painel/produtos/alterar/<?= $prod->id_produto; ?>">Alterar</a>
                                                            <a class="dropdown-item deletar" style="cursor: pointer;" data-id="<?= $prod->id_produto; ?>">Deletar</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="4">Não possui nenhum produto cadastrado.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Espaçamento de baixo -->
                        <div class="py-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $this->view("painel/include/footer"); ?>