<?php include "menu.php" ?>

<h2>Новости</h2>
<?php foreach ($news as $item): ?>
    <a href="/news/<?=$item['slug']?>"><?=$item['title']?></a><br>
<?php endforeach;?>
