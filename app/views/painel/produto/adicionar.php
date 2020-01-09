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
                                <h3 class="mb-0">Adicionar Produto</h3>
                            </div>
                        </div>
                    </div>

                    <!-- Formulario -->
                    <div class="card-body">
                        <form id="formInsert">
                            <h6 class="heading-small text-muted mb-4">Preencha as informações</h6>

                            <!-- Nome -->
                            <div class="row">
                                <div1 class="col-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label">Nome</label>
                                        <input type="text" class="form-control form-control-alternative" id="campoNome" name="nome" placeholder="Nome do produto" required />
                                    </div>
                                </div1>
                            </div>

                            <!-- Categoria e Slug -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email">Categoria</label>
                                        <select class="form-control form-control-alternative" name="id_categoria" required>
                                            <?php foreach($categorias as $cat): ?>
                                                <option value="<?= $cat->id_categoria ?>"><?= $cat->nome; ?></option>
                                            <?php endforeach;; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label">Url Amigável</label>
                                        <input type="text" class="form-control form-control-alternative" name="slug" placeholder="Url Amigável" id="slug" required />
                                    </div>
                                </div>
                            </div>

                            <!-- Descricao -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label">Descrição do Produto</label>
                                        <textarea class="form-control form-control-alternative" rows="5" name="descricao" required></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Botão -->
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
