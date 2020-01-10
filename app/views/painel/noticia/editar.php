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
                                <h3 class="mb-0">Alterar Notícia</h3>
                            </div>
                        </div>
                    </div>

                    <!-- Formulario -->
                    <div class="card-body">
                        <form id="formAltera" data-id="<?= $noticia->id_noticia; ?>">
                            <h6 class="heading-small text-muted mb-4">Preencha as informações</h6>

                            <!-- Nome -->
                            <div class="row">
                                <div1 class="col-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label">Título</label>
                                        <input type="text"
                                               class="form-control form-control-alternative"
                                               id="campoNome"
                                               name="nome"
                                               placeholder="Título da notícia"
                                               value="<?= $noticia->nome; ?>"
                                               required />
                                    </div>
                                </div1>
                            </div>

                            <!-- Status e Slug -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email">Status</label>
                                        <select class="form-control form-control-alternative" name="status" required>
                                            <option value="1" <?= ($noticia->status == true) ? "selected" : ""; ?>>Ativo</option>
                                            <option value="0" <?= ($noticia->status == false) ? "selected" : ""; ?>>Inativo</option>
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
                                               value="<?= $noticia->slug; ?>"
                                               required />
                                    </div>
                                </div>
                            </div>

                            <!-- Palavras Chave -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label">Palavras Chave (Separadas por virgula)</label>
                                        <textarea class="form-control form-control-alternative"
                                                  rows="2"
                                                  name="palavras_chave"
                                                  required><?= $noticia->palavras_chave; ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Resumo -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label">Breve resumo do conteúdo</label>
                                        <textarea class="form-control form-control-alternative"
                                                  rows="5"
                                                  name="resumo"
                                                  required><?= $noticia->resumo; ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Imagem de Capa -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label">Imagem de Capa</label>
                                        <input class="dropify" type="file" name="imagem" />
                                    </div>
                                </div>
                            </div>

                            <!-- Texto -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label">Escreva a notícia</label>
                                        <textarea id="summernote" name="texto"><?= $noticia->texto; ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Botão -->
                            <div class="row">
                                <div class="col-12">
                                    <button class="btn btn-lg btn-dark" id="btnAltera" type="submit">Alterar Notícia</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>


<?php $this->view("painel/include/footer"); ?>
