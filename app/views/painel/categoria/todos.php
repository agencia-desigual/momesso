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
                                    <h3 class="mb-0">Categorias</h3>
                                </div>
                                <div class="col text-right">
                                    <a href="<?= BASE_URL; ?>painel/categorias/adicionar" class="btn btn-sm btn-dark">Adicionar Categoria</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush datatable">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Categoria Mãe</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($categorias)): ?>
                                        <?php foreach ($categorias as $cat): ?>
                                            <tr id="tb_<?= $cat->id_categoria; ?>">
                                                <td><?= $cat->nome; ?></td>
                                                <td><?= $cat->mae; ?></td>

                                                <!-- Menu de opções -->
                                                <td class="text-right">
                                                    <div class="dropdown">
                                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                            <a class="dropdown-item" href="<?= BASE_URL; ?>painel/categorias/alterar/<?= $cat->id_categoria; ?>">Alterar</a>
                                                            <a class="dropdown-item deletar" style="cursor: pointer;" data-id="<?= $cat->id_categoria; ?>">Deletar</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="3">Não Possui nenhuma categoria cadastrada.</td>
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