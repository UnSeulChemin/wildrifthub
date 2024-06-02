<section class="section-content">
   
   <section class="section-card">
       <?php foreach($champions as $image): ?>
           <div class="div-card">
               <figure class="figure-card">
                   <a role="link" class="flex" href="<?= $pathRedirect; ?>champions/champion/<?= $image->name ?>">
                       <img alt="<?= $image->name?>" src="<?= $pathRedirect; ?>public/images/champions/<?= $image->image.".".$image->extension ?>">
                   </a>
               </figure>
           </div>
       <?php endforeach; ?>
   </section>

</section>