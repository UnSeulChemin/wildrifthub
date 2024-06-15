<section class="section-content">

    <div class="flex-center-center m-t-20">
        <?php foreach($guide as $image): ?>
            <div>
                <p><?= $image->name ?></p>
                <a role="link" class="flex" href="guides/id/<?= $image->id ?>"></a>
            </div>
        <?php endforeach; ?>
    </div>

    <nav role="navigation" aria-label="Pages navigation" class="flex-center-center m-t-30">
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