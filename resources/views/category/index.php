<?php include "menu.php" ?>

<h1>Категории новостей</h1>
<?php foreach ($categories as $item): ?>
    <a href="/category/<?=$item['slug']?>"><?=$item['title']?></a><br>
<?php endforeach;?>
