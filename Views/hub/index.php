<section class="section-content">

    <h2>Latest guides</h2>

    <section class="flex-center-wrap-gap-50 m-b-30">
        <?php foreach($guidesLatest as $image): ?>
            <div class="div-card">
               <figure class="figure-image">
                    <a role="link" class="flex" href="guides/guide/<?= strtolower($image->name) ?>">
                        <img alt="<?= $image->name?>" src="public/images/guides/thumbnail/<?= $image->thumbnail.".".$image->extension ?>">
                    </a>
               </figure>
               <div class="flex-column-center-center">
                    <a class="link-card" href="guides/guide/<?= strtolower($image->name) ?>"><?= $image->name ?></a>
               </div>
           </div>
        <?php endforeach; ?>
    </section>

    <div class="m-b-40 flex-center-center-gap-50">
        <a class="link-section" href="guides" target="_blank">Guides</a>
        <a class="link-section" href="guides/all" target="_blank">All Guides</a>
    </div>

    <h2>Latest champions</h2>

    <div class="flex-center-center-gap-50">
        <?php foreach($championsLatest as $image): ?>
            <a class="link-section" href="champions/champion/<?= $image->name ?>" target="_blank"><?= ucfirst($image->name) ?></a>
        <?php endforeach; ?>
    </div>

</section>