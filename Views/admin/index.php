<section class="section-content">

    <?= $contactForm; ?>

    <?php foreach($admins as $image): ?>
        <p><?= $image->content ?></p>
    <?php endforeach; ?>

</section>