<!--   Core   -->
<script src="<?= BASE_URL; ?>arquivos/painel/js/plugins/jquery/dist/jquery.min.js"></script>
<script src="<?= BASE_URL; ?>arquivos/painel/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!--   Argon JS   -->
<script src="<?= BASE_URL; ?>arquivos/painel/js/argon-dashboard.min.js?v=1.1.1"></script>

<!-- Plugins -->
<script src="<?= BASE_URL; ?>arquivos/plugins/sweetalert/sweetalert2.all.js"></script>
<script src="<?= BASE_URL; ?>arquivos/plugins/mascara/mascara.js"></script>

<!-- Scripts |Method| -->
<?php if(!empty($js)): ?>
    <?php foreach ($js as $j): ?>
        <script type='module' src='<?= BASE_URL; ?>arquivos/app/method/<?= $j ?>.js'></script>
    <?php endforeach; ?>
<?php endif; ?>

</body>
</html>