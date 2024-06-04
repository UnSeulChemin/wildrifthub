<section class="section-content">

   <section class="section-card">
        <?php foreach($champions as $image): ?>
            <div class="div-card">
               <figure>
                   <a role="link" class="flex" href="<?= $pathRedirect; ?>champions/champion/<?= $image->name ?>">
                       <img alt="<?= $image->name?>" src="<?= $pathRedirect; ?>public/images/champions/<?= $image->image.".".$image->extension ?>">
                   </a>
               </figure>
               <div class="flex-column-center-center">
                    <a class="link-card" href="<?= $pathRedirect; ?>champions/champion/<?= $image->name ?>"><?= ucfirst($image->name) ?></a>
               </div>
           </div>
        <?php endforeach; ?>
    </section>

</section>