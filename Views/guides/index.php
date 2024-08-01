<section class="section-display">

    <section class="flex-center-wrap-gap-50 m-b-30">
        <?php foreach($guides as $image): ?>
            <div class="div-card">
               <figure class="figure-image">
                    <a role="link" class="flex" href="<?= $pathRedirect; ?>guides/guide/<?= $image->name ?>">
                        <img alt="<?= $image->name?>" src="<?= $pathRedirect; ?>public/images/guides/thumbnail/<?= $image->thumbnail.".".$image->extension ?>">
                    </a>
               </figure>
               <div class="flex-column-center-center">
                    <a class="link-card" href="<?= $pathRedirect; ?>guides/guide/<?= $image->name ?>"><?= strtoupper($image->name) ?></a>
               </div>
           </div>
        <?php endforeach; ?>
    </section>

    <nav role="navigation" aria-label="Pages navigation" class="flex-center-center-gap-25">
        <?php
        $base = basename($_GET["p"]);
        if (!is_numeric($base)): $base = 1; endif;

        for ($getId = 1; $getId <= $count; $getId++):
            if ($base != $getId): 
                ?><a role="link" class="link-paginate" href="<?= $pathRedirect; ?>guides/page/<?= $getId; ?>"><?= $getId; ?></a><?php
            else: 
                ?><a role="link" class="link-paginate active"><?= $getId; ?></a><?php
            endif;
        endfor; ?>
    </nav>

</section>