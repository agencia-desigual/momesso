<?php $this->view("painel/include/header"); ?>

    <div class="main-content mb-4">

        <!-- Header (Lista com numeros) -->
        <div class="header bg-gradient-danger pb-8 pt-2 pt-md-5">
            <div class="container-fluid">
                <div class="header-body">
                    <!-- Card stats -->
                    <div class="row">

                        <!-- Categorias -->
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Categorias</h5>
                                            <span class="h2 font-weight-bold mb-0"><?= number_format($total["categorias"], 0, "", "."); ?></span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-dark text-white rounded-circle shadow">
                                                <i class="ni ni-app"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Produtos -->
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Produtos</h5>
                                            <span class="h2 font-weight-bold mb-0"><?= number_format($total["produtos"], 0, "", "."); ?></span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-dark text-white rounded-circle shadow">
                                                <i class="ni ni-bag-17"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Noticias -->
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Notícias</h5>
                                            <span class="h2 font-weight-bold mb-0"><?= number_format($total["noticias"], 0, "", "."); ?></span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-dark text-white rounded-circle shadow">
                                                <i class="ni ni-single-copy-04"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Usuários -->
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Usuários</h5>
                                            <span class="h2 font-weight-bold mb-0"><?= number_format($total["usuarios"], 0, "", "."); ?></span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-dark text-white rounded-circle shadow">
                                                <i class="fas fa-users"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- End >> Header -->

        <!-- Tabelas -->
        <div class="container-fluid mt--7">
            <div class="row">

                <!-- Noticias -->
                <div class="col-xl-8 mb-5 mb-xl-0">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">Últimas Notícias</h3>
                                </div>
                                <div class="col text-right">
                                    <a href="<?= BASE_URL; ?>painel/noticias" class="btn btn-sm btn-dark">Ver Todas</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Imagem</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Data Cadatros</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if(!empty($noticias)): ?>
                                    <?php foreach ($noticias as $not): ?>
                                        <tr>
                                            <th scope="row"><?= BASE_STORANGE . "noticias/{$not->id_noticia}/" . $not->imagem; ?></th>
                                            <td style="text-transform: capitalize;"><?= $not->nome; ?></td>
                                            <td><?= date("d/m/Y", strtotime($not->data)); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="3">
                                            Não possui notícia cadastrada.
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- End >> Noticias -->

                <!-- Produtos -->
                <div class="col-xl-4">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">Últimos Produtos</h3>
                                </div>
                                <div class="col text-right">
                                    <a href="#!" class="btn btn-sm btn-dark">Ver Todos</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Categoria</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($produtos)): ?>
                                        <?php foreach ($produtos as $prod): ?>
                                            <tr>
                                                <th scope="row"><?= $prod->nome; ?></th>
                                                <td><?= $prod->categoria; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="2">
                                                Não possui produto cadastrado.
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End >> Tabelas -->

    </div>

<?php $this->view("painel/include/footer"); ?>