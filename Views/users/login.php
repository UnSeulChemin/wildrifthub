<section class="section-content">

    <?php if (isset($_SESSION["warning"]) && !empty($_SESSION["warning"])): ?>
        <div class="flash-warning">
            <p class="m-0"><?= $_SESSION["warning"]; unset($_SESSION["warning"]); ?></p>
        </div>
    <?php endif; ?>

    <?= $loginForm; ?>

</section>