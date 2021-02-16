<?php

use yii\helpers\Url;

?>
<div id="container" class="container">
    <ul id="scene" class="scene">
        <?php if ($exception->statusCode == '404') : ?>
            <li class="layer" data-depth="1.00"><img src="../images/404-01.png"></li>
            <li class="layer" data-depth="0.60"><img src="../images/shadows-01.png"></li>
            <li class="layer" data-depth="0.20"><img src="../images/monster-01.png"></li>
            <li class="layer" data-depth="0.40"><img src="../images/text-01.png"></li>
            <li class="layer" data-depth="0.10"><img src="../images/monster-eyes-01.png"></li>
        <?php endif ?>
    </ul>
    <a href="<?= Url::to(['dashboard/index']) ?>" class="btn">Orqaga</a>
</div>
<!-- Scripts -->
<script src="js\parallax.js"></script>
<script>
    // Pretty simple huh?
    var scene = document.getElementById('scene');
    var parallax = new Parallax(scene);
</script>