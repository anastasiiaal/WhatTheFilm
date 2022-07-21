<?php
    $getGenres = $movieDB->getGenres();
?>
<div class="container">
    <div class="slider">
        <?php for ($i = 0; $i < 19; $i++) { ?>
            <a href="./categories.php?idgenre=<?= $getGenres[$i]['id'] ?>" class="img-div"><img src="./img/categories/<?= $getGenres[$i]['name'] ?>.jpg" alt=""><h2><?= $getGenres[$i]['name'] === "Documentary" ? $getGenres[$i]['name'] = "Docu" : $getGenres[$i]['name'] ?></h2></a>
        <?php } ?>
    </div>
</div>