<?php if (isset($title)) { ?><h1><?= $title ?></h1> <?php } ?>
<?php if (isset($link)) { ?><a href="<?= Routeur::redirect("index/view") ?>"><?= $link ?></a><?php } ?>
<?php if (isset($link)) { ?><?= $formulaire; ?><?php } ?>
<?php if (isset($debug)) { ?><?= $debug ?><?php } ?>
