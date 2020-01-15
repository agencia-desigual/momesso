<footer>
    <div class="container">
        <div style="padding: 50px 0px;" class="row">
            <div class="col-md-4 logo-rodape">
                <img class="" src="<?= BASE_URL; ?>arquivos/assets/img/momesso_logo_rodape.png">
            </div>
            <div class="col-md-8 text-right logo-rodape">
                <a href="<?= BASE_URL; ?>" class="footer-itens">HOME</a>
                <a href="<?= BASE_URL; ?>" class="footer-itens">EMPRESA</a>
                <a href="<?= BASE_URL; ?>" class="footer-itens">PRODUTOS</a>
                <a href="<?= BASE_URL; ?>contato" class="footer-itens">CONTATO</a>
                <a href="#" class="menu-itens rede-social-rodape" style="padding: 0px 3px; vertical-align: super"><img width="35px" src="<?= BASE_URL; ?>arquivos/assets/img/icone-face-rodape.png"></a>
                <a href="#" class="menu-itens rede-social-rodape-yt" style="padding: 0px 3px; vertical-align: super"><img width="35px" src="<?= BASE_URL; ?>arquivos/assets/img/icone-youtube-rodape.png"></a>
            </div>
        </div>
        <hr style="border-top: 1px solid #5b5b5b;">
        <div style="padding-bottom: 30px" class="row">
            <div class="col-md-12 endereco-rodape">
                <p style="color: #5b5b5b; margin-bottom: -5px">Av. João Cernack, 999 - CEP.:16200-054 - Birigui/SP   Tel.: + 55 18 3642-2460</p>
                <p style="color: #5b5b5b">Momesso® - <?php echo date('Y'); ?> - Todos os direitos reservados</p>
            </div>
        </div>
    </div>
</footer>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="<?= BASE_URL.'arquivos/assets/js/jquery-3.4.1.min.js' ?>"></script>
<script src="<?= BASE_URL.'arquivos/assets/js/popper.min.js' ?>"></script>
<script src="<?= BASE_URL.'arquivos/assets/js/bootstrap.min.js' ?>"></script>

<!-- Plugins -->
<script src="<?= BASE_URL; ?>arquivos/plugins/sweetalert/sweetalert2.all.js" defer=""></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script src="<?= BASE_URL; ?>arquivos/plugins/dropify/js/dropify.js" defer=""></script>
<script src="<?= BASE_URL; ?>arquivos/plugins/owl.carousel/dist/owl.carousel.min.js"></script>

<script src="<?= BASE_URL.'arquivos/assets/js/funcoes.js' ?>"></script>

<!-- Configurações dos modulos.
 ================================================== -->
<script defer>
    $(document).ready(function () {

        // -- Dropify
        $('.dropify').dropify({
            messages: {
                'default': 'Arraste seu currículo ou click aqui',
                'replace': 'Arraste seu currículo ou click aqui',
                'remove':  'Remover',
                'error':   'Ops, ocorreu um erro.'
            }
        });

        $(function() {

            // Remove button click
            $(document).on(
                'click',
                '[data-role="dynamic-fields"] > .form-inline [data-role="remove"]',
                function(e) {
                    e.preventDefault();
                    $(this).closest('.form-inline').remove();
                }
            );


            // Add button click
            $(document).on(
                'click',
                '[data-role="dynamic-fields"] > .form-inline [data-role="add"]',
                function(e) {
                    e.preventDefault();
                    var container = $(this).closest('[data-role="dynamic-fields"]');
                    new_field_group = container.children().filter('.form-inline:first-child').clone();
                    new_field_group.find('input').each(function(){
                        $(this).val('');
                    });
                    container.append(new_field_group);
                }
            );

        });
        // END >> Dropify


        // Banner Produto
        $('.slideProduto').owlCarousel({
            loop:true,
            margin: 0,
            nav:false,
            items:1,
            autoplay: true,
        });
    });
</script>

</body>

</html>