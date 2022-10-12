<?php include "menu.php" ?>

<h2><?=$category['title']?></h2>

<?php foreach ($news as $item): ?>
    <a href="/news/<?=$item['slug']?>"><?=$item['title']?></a><br>
<?php endforeach;?>
