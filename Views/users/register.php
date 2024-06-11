<section class="section-content">

    <!-- <p>How to become pro?</p>
    <p>Register an account.</p>
    <p>Paiement.</p>

    <p>Form de paiement?</p>
    <p>Puis form d'inscription?</p> -->

    <?php if (isset($error) && !empty($error)): ?>
        <div class="flash-warning">
            <p class="m-0"><?= $error; unset($error); ?></p>
        </div>
    <?php endif; ?>

    <?= $registerForm; ?>

    <div class="m-t-30">
        <a class="link-back" href="javascript:history.go(-1)">Back</a>
    </div>

</section>