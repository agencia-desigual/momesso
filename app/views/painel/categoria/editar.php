<?php $this->view("painel/include/header"); ?>

    <div class="main-content mb-4">

        <!-- Gradiente -->
        <div class="header bg-gradient-danger pb-8 pt-5 pt-md-5"></div>

        <!-- Conteudo -->
        <div class="container-fluid mt--8">
            <div class="col-12 order-xl-1">
                <div class="card bg-secondary shadow">

                    <!-- Titulo -->
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <h3 class="mb-0">Alterar Categoria</h3>
                            </div>
                        </div>
                    </div>

                    <!-- Formulario -->
                    <div class="card-body">
                        <form id="formAltera" data-id="<?= $categoria->id_categoria; ?>">
                            <h6 class="heading-small text-muted mb-4">Preencha as informações</h6>

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label">Nome</label>
                                        <input type="text"
                                               class="form-control form-control-alternative"
                                               id="campoNome"
                                               name="nome"
                                               placeholder="Nome da Categoria"
                                               value="<?= $categoria->nome; ?>"
                                               required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email">Categoria Mãe</label>
                                        <select class="form-control form-control-alternative" name="id_categoria_mae" required>
                                            <option value="0" <?= ($categoria->id_categoria_mae == null) ? "selected" : ""; ?>>Não Possui</option>
                                            <?php foreach($categoriasMae as $item => $value): ?>
                                                <?php if($categoria->id_categoria != $item): ?>
                                                    <option value="<?= $item; ?>" <?= ($categoria->id_categoria_mae == $item) ? "selected" : ""; ?>><?= $value; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach;; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label">Url Amigável</label>
                                        <input type="text"
                                               class="form-control form-control-alternative"
                                               name="slug"
                                               placeholder="Url Amigável"
                                               id="slug"
                                               value="<?= $categoria->slug; ?>"
                                               required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label">Imagem (Não obrigatório)</label>
                                        <input type="file" name="imagem" class="dropify" />
                                    </div>
                                </div>
                            </div>

                            <!-- Botão -->
                            <div class="row">
                                <div class="col-12">
                                    <button class="btn btn-lg btn-dark" id="btnAltera" type="submit">Adicionar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>


<?php $this->view("painel/include/footer"); ?>
