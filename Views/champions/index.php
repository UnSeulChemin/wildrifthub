<section class="section-news m-t-30">
        <h2>Latest champions</h2>
        <div class="flex-left-center-gap-50 m-t-15">
            <?php foreach($championsLatest as $image): ?>
                <div>
                    <a class="link-card" href="champions/champion/<?= $image->name ?>"><?= ucfirst($image->name) ?></a>
                </div>
            <?php endforeach; ?>
        </div>
</section>

<section class="section-content">

   <section class="flex-center-wrap-gap-35">
        <?php foreach($champions as $image): ?>
            <div class="div-card">
               <figure class="figure-image">
                    <a role="link" class="flex" href="champions/champion/<?= $image->name ?>">
                        <img alt="<?= $image->name?>" src="public/images/champions/thumbnail/<?= $image->thumbnail.".".$image->extension ?>">
                    </a>
               </figure>
               <div class="flex-column-center-center">
                    <a class="link-card" href="champions/champion/<?= $image->name ?>"><?= ucfirst($image->name) ?></a>
               </div>
           </div>
        <?php endforeach; ?>
    </section>

</section>