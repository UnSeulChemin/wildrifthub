<section class="section-content">

    <?= $contactForm; ?>

    <?php foreach($todos as $image): ?>
        <p><?= $image->content ?></p>
    <?php endforeach; ?>

</section>