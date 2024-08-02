<section class="section-content">

    <?= $contactForm; ?>

    <?php foreach($todos as $image): ?>
        <p class="m-0"><?= $image->content ?></p>
    <?php endforeach; ?>

</section>