<section class="section-content">

    <?php if (isset($error) && !empty($error)): ?>
        <div class="flash-warning">
            <p class="m-0"><?= $error; unset($error); ?></p>
        </div>
    <?php endif; ?>

    <?= $loginForm; ?>

</section>