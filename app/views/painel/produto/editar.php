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
                                <h3 class="mb-0">Alterar Produto</h3>
                            </div>
                        </div>
                    </div>

                    <!-- Formulario -->
                    <div class="card-body">
                        <form id="formAltera" data-id="<?= $produto->id_produto; ?>">
                            <h6 class="heading-small text-muted mb-4">Preencha as informações</h6>

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label">Nome</label>
                                        <input type="text"
                                               class="form-control form-control-alternative"
                                               id="campoNome"
                                               name="nome"
                                               placeholder="Nome do produto"
                                               value="<?= $produto->nome; ?>"
                                               required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email">Categoria</label>
                                        <select class="form-control form-control-alternative" name="id_categoria" required>
                                            <?php foreach($categorias as $cat): ?>
                                                <option value="<?= $cat->id_categoria; ?>" <?= ($cat->id_categoria == $produto->id_categoria) ? "selected" : ""; ?>><?= $cat->nome; ?></option>
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
                                               value="<?= $produto->slug; ?>"
                                               required />
                                    </div>
                                </div>
                            </div>

                            <!-- Descricao -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label">Descrição do Produto</label>
                                        <textarea class="form-control form-control-alternative" rows="5" name="descricao" required><?= $produto->descricao; ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Arquivo Downlo -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label">Arquivo Download (Opcional)</label>
                                        <input type="file" name="arquivo" class="dropify" />
                                    </div>
                                </div>
                            </div>

                            <!-- Botão -->
                            <div class="row">
                                <div class="col-12">
                                    <button class="btn btn-lg btn-dark" id="btnAltera" type="submit">Salvar Alterações</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>


<?php $this->view("painel/include/footer"); ?>
