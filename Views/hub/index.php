<section class="section-content">

    <h2>Latest guides</h2>

    <section class="flex-center-wrap-gap-35">
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

    <div class="m-tb-30">
        <a class="link-section" href="guides/all"">All guides</a>
    </div>

    <h2>Latest champions</h2>

    <div class="flex-center-center m-t-20">
        <?php foreach($championsLatest as $image): ?>
            <div>
                <a class="link-card" href="champions/champion/<?= $image->name ?>"><?= ucfirst($image->name) ?></a>
            </div>
        <?php endforeach; ?>
    </div>

</section>