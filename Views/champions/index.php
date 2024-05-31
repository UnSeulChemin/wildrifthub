<section class="section-content">

    <h3>Champions</h3>
   
   <section class="section-card">
       <?php foreach($champions as $image): ?>
           <div class="div-card">
               <figure class="figure-card">
                   <a role="link" class="flex" href="<?= $pathRedirect; ?>champions/name/<?= $image->name ?>">
                       <img class="champions-logo" alt="<?= $image->name?>" src="<?= $pathRedirect; ?>public/images/champions/<?= $image->image.".".$image->extension ?>">
                   </a>
               </figure>
           </div>
       <?php endforeach; ?>
   </section>


Champions (petit tips, ect) grizze avec ecrit pro

</section>