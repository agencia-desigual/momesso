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
                                    <h3 class="mb-0">Notícias</h3>
                                </div>
                                <div class="col text-right">
                                    <a href="<?= BASE_URL; ?>painel/noticias/adicionar" class="btn btn-sm btn-dark">Adicionar Notícia</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush datatable">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Imagem</th>
                                        <th scope="col">Título</th>
                                        <th scope="col">Status</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($noticias)): ?>
                                        <?php foreach ($noticias as $not): ?>
                                            <tr id="tb_<?= $not->id_noticia; ?>">
                                                <td>
                                                    <?php if(!empty($not->imagem)): ?>
                                                        <img src="<?= BASE_STORANGE; ?>noticia/<?= $not->imagem ; ?>" style="width: 120px;" />
                                                    <?php else: ?>
                                                        <img src="<?= BASE_URL; ?>arquivos/assets/img/not-found.jpg" style="width: 120px;" />
                                                    <?php endif; ?>
                                                </td>
                                                <td><?= $not->nome; ?></td>
                                                <td>
                                                    <?php if($not->status == true): ?>
                                                        <span class="badge" style="background-color: #139e17; color: #fff;">Ativo</span>
                                                    <?php else: ?>
                                                        <span class="badge" style="background-color: #e01d1d; color: #fff;">Desativado</span>
                                                    <?php endif; ?>
                                                </td>

                                                <!-- Menu de opções -->
                                                <td class="text-right">
                                                    <div class="dropdown">
                                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                            <a class="dropdown-item" href="<?= BASE_URL; ?>painel/noticias/alterar/<?= $not->id_noticia; ?>">Alterar</a>
                                                            <a class="dropdown-item deletar" style="cursor: pointer;" data-id="<?= $not->id_noticia; ?>">Deletar</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="3">Não Possui nenhum produto cadastrado.</td>
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