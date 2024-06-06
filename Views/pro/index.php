<section class="section-content">

    <!-- <p>How to become pro?</p>
    <p>Register an account.</p>
    <p>Paiement.</p>

    <p>Form de paiement?</p>
    <p>Puis form d'inscription?</p> -->

    <?php if (isset($_SESSION["warning"]) && !empty($_SESSION["warning"])): ?>
        <div class="flash flash-warning">
            <p class="m-0"><?= $_SESSION["warning"]; unset($_SESSION["warning"]); ?></p>
        </div>
    <?php endif; ?>

    <?= $proForm; ?>

</section>