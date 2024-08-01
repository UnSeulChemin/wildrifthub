<section class="section-content">

   <section class="flex-center-wrap-gap-50">
        <?php foreach($guides as $image): ?>
            <div class="div-card">
                <figure class="figure-image">
                    <a role="link" class="flex" href="<?= $pathRedirect; ?>guides/guide/<?= strtolower($image->name) ?>">
                        <img alt="<?= $image->name?>" src="<?= $pathRedirect; ?>public/images/guides/thumbnail/<?= $image->thumbnail.".".$image->extension ?>">
                    </a>
                </figure>
                <div class="flex-column-center-center">
                    <a class="link-card" href="<?= $pathRedirect; ?>guides/guide/<?= strtolower($image->name) ?>"><?= $image->name ?></a>
                </div>
            </div>
        <?php endforeach; ?>
    </section>

    <div class="m-t-30">
        <a class="link-section" href="javascript:history.go(-1)">Back</a>
    </div>

</section>