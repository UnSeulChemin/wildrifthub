<section class="section-content">

    <?= $contactForm; ?>

    <?php foreach($admins as $image): ?>
        <p><?= $image->todo ?></p>
    <?php endforeach; ?>

</section>