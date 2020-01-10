<!--   Core   -->
<script src="<?= BASE_URL; ?>arquivos/painel/js/plugins/jquery/dist/jquery.min.js"></script>
<script src="<?= BASE_URL; ?>arquivos/painel/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!--   Argon JS   -->
<script src="<?= BASE_URL; ?>arquivos/painel/js/argon-dashboard.min.js?v=1.1.1"></script>

<!-- Plugins -->
<script src="<?= BASE_URL; ?>arquivos/plugins/sweetalert/sweetalert2.all.js" defer=""></script>
<script src="<?= BASE_URL; ?>arquivos/plugins/mascara/mascara.js" defer=""></script>
<script src="<?= BASE_URL; ?>arquivos/plugins/datatables/js/js.js" defer=""></script>
<script src="<?= BASE_URL; ?>arquivos/plugins/dropify/js/dropify.js" defer=""></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js"></script>

<!-- Configurações dos modulos.
 ================================================== -->
<script defer>
    $(document).ready(function () {

        // -- Summernote
        $('#summernote').summernote({
            placeholder: 'Escreva aqui',
            tabsize: 2,
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'hr']],
                ['view', ['fullscreen']]
            ],
            callbacks: {
                onPaste: function (e) {
                    var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');

                    e.preventDefault();

                    // Firefox fix
                    setTimeout(function () {
                        document.execCommand('insertText', false, bufferText);
                    }, 10);
                }
            }

        });
        // END >> Summernote


        // -- Dropify
        $('.dropify').dropify({
            messages: {
                'default': 'Arraste o arquivo ou click aqui',
                'replace': 'Arraste o arquivo ou click aqui',
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

    });
</script>


<!-- Scripts |Method| -->
<?php if(!empty($js)): ?>
    <?php foreach ($js as $j): ?>
        <script type='module' src='<?= BASE_URL; ?>arquivos/app/method/<?= $j ?>.js'></script>
    <?php endforeach; ?>
<?php endif; ?>

</body>
</html>