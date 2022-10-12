<?php include "menu.php" ?>

<h2><?=$news['title']?></h2>
<p><?=$news['text']?></p>

<a href="/category/<?=$categories[$news['category_id']]['slug']?>">Все новости категории <?=$categories[$news['category_id']]['title']?></a><br>
