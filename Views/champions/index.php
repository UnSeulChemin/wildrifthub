<section class="section-news m-t-30">
        <h4>Latest heros add</h4>
        <?php foreach($championsLatest as $image): ?>
            <p><?= $image->name ?></p>
        <?php endforeach; ?>
</section>

<section class="section-content">

   <section class="section-card">
        <?php foreach($champions as $image): ?>
            <div class="div-card">
               <figure class="figure-image">
                    <a role="link" class="flex" href="<?= $pathRedirect; ?>champions/champion/<?= $image->name ?>">
                        <img alt="<?= $image->name?>" src="<?= $pathRedirect; ?>public/images/champions/thumbnail/<?= $image->thumbnail.".".$image->extension ?>">
                    </a>
               </figure>
               <div class="flex-column-center-center">
                    <a class="link-card" href="<?= $pathRedirect; ?>champions/champion/<?= $image->name ?>"><?= ucfirst($image->name) ?></a>
               </div>
           </div>
        <?php endforeach; ?>
    </section>

</section>