<?php $this->view("painel/include/header"); ?>

    <div class="main-content mb-4">

        <!-- Gradiente -->
        <div class="header bg-gradient-danger pb-8 pt-5 pt-md-5"></div>

        <!-- Conteudo -->
        <div class="container-fluid mt--8">

            <!-- Informações do Produto -->
            <div class="col-12 order-xl-1">
                <div class="card bg-secondary shadow">

                    <!-- Titulo -->
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <h3 class="mb-0"><?= $produto->nome; ?></h3>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form>
                            <h6 class="heading-small text-muted mb-4">Informações do produto</h6>

                            <!-- Nome -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label">Nome</label>
                                        <p><?= $produto->nome; ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" style="display: block">Arquivo</label>
                                        <?php if(!empty($produto->download)): ?>
                                            <a href="<?= BASE_STORANGE; ?>produto/<?= $produto->id_produto; ?>/<?= $produto->download; ?>" download="">
                                                <button type="button" class="btn btn-outline-primary">Download</button>
                                            </a>
                                        <?php else: ?>
                                            <p>Não Possui</p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Categoria e Slug -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email">Categoria</label>
                                        <p><?= $categoria->nome; ?></p>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label">Url Amigável</label>
                                        <p><?= $produto->slug; ?></p>
                                    </div>
                                </div>
                            </div>

                            <!-- Descricao -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label">Descrição do Produto</label>
                                        <p><?= $produto->descricao; ?></p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Imagens Cadastradas -->
            <div class="col-12 order-xl-1 mt-4">
                <div class="card bg-white shadow">

                    <!-- Titulo -->
                    <div class="card-header border-1">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <h3 class="mb-0">Imagens</h3>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush datatable">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">Imagem</th>
                                    <th scope="col">Capa</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(!empty($imagens)): ?>
                                    <?php foreach ($imagens as $img): ?>
                                        <tr id="tb_<?= $img->id_imagem; ?>">
                                            <td>
                                                <img src="<?= BASE_STORANGE; ?>produto/<?= $produto->id_produto ."/". $img->imagem ; ?>" style="width: 120px;" />
                                            </td>
                                            <td>
                                                <?php if($img->capa): ?>
                                                    <span class="badge" style="color: #fff; background-color: #ff7f10;">Capa</span>
                                                <?php else: ?>
                                                    <span class="badge" style="border: 1px solid #ccc;">Não é Capa</span>
                                                <?php endif; ?>
                                            </td>

                                            <!-- Menu de opções -->
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        <?php if($img->capa == false): ?>
                                                            <a class="dropdown-item addCapa" style="cursor: pointer;" data-id="<?= $img->id_imagem; ?>">Tornar Capa</a>
                                                        <?php endif; ?>
                                                        <a class="dropdown-item deletarImagem" style="cursor: pointer;" data-id="<?= $img->id_imagem; ?>">Deletar</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cadastra Imagem -->
            <div class="col-12 order-xl-1 mt-4">
                <div class="card bg-white shadow">

                    <!-- Titulo -->
                    <div class="card-header border-1">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <h3 class="mb-0">Adicionar Imagem</h3>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form id="formInsertImagem" data-id="<?= $produto->id_produto; ?>">

                            <!-- Imagem -->
                            <div class="row">
                                <div1 class="col-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label">Imagem do produto</label>
                                        <input type="file" name="imagem" class="dropify" />
                                    </div>
                                </div1>
                            </div>

                            <!-- Capa -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" name="capa" value="sim">
                                        <label class="form-check-label">Imagem de capa</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Btn -->
                            <div class="row">
                                <div class="col-12">
                                    <button class="btn btn-lg btn-dark" id="btnSalva" type="submit">Adicionar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>


<?php $this->view("painel/include/footer"); ?>
